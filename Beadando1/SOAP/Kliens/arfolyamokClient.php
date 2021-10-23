<?php

require '../../template.php';
loadTemplate();

echo '<h4>Az utazáshoz vigyen magával devizát is! Kattintson a legfrissebb Euró és USD árfolyamokért!</h4>';

?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="submit" value="Keresés" name="keres">
</form>


<?php

if ( isset($_POST["keres"]) )
{
    try 
    {
        $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
        
        $tömb = (array)simplexml_load_string($client->GetCurrentExchangeRates()->GetCurrentExchangeRatesResult);

        echo 'EUR árfolyam: ';
        echo $tömb['Day']->Rate[8];
        echo '<br>';

        echo 'USD árfolyam: ';
        echo $tömb['Day']->Rate[32];
        echo '<br>';


        
    } 
    catch (SoapFault $e) {
        var_dump($e);
    }

}


?>


<br>
<h4>Kérdezze le az USD árfolyamváltozását egy adott hónapra! (A lekérdezés eltarthat néhány másodpercig)</h4>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="text" pattern="[2][0-2][0-9][0-9]" name="year" placeholder="Év" required></input>
    <input type="text" pattern="[0-1][0-9]" name="month" placeholder="Hónap" required></input>

    <input type="submit" value="Lekérdezés">
</form>

<?php

if ( isset( $_POST["year"]) && isset($_POST["month"]) )
{

    echo 'USD árfolyam az alábbi hónapra: '.$_POST["year"].'-'.$_POST["month"];

    $startday = "01";
    $endday = "30";

    if ($_POST["month"] == "02" )
    {
        $endday = "28";
    }

    try {
        $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
        $param = array('startDate' => date($_POST["year"].'-'.$_POST["month"].'-'.$startday), 'endDate' => date($_POST["year"].'-'.$_POST["month"].'-'.$endday), 'currencyNames' => 'HUF,EUR');
        $result = $client->__soapCall('GetExchangeRates', array('parameters' => $param));
        $xml = new \SimpleXMLElement($result->GetExchangeRatesResult);
        
        $prices = array();


        for ($x = 0; $x < count($xml->Day); $x++)
        {
            array_push( $prices, $xml->Day[$x]->Rate[0] );
        }

        $reversed = array_reverse( $prices );


    } catch (SoapFault $e) {
        var_dump($e);
    }

}
?>


<canvas id="myChart" width="600" height="400"></canvas>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="jscript/graph.js"></script>

<script>
var chart = <?php echo json_encode($reversed);?>;
console.log(chart.length);

var chartData = [];

for (i = 0; i < chart.length; i++)
{
    chartData[i] = parseFloat(chart[i][0].replace(',', '.'));
}
console.log(chartData);

var list = [];
for (var i = 5; i <= chartData.length + 4; i++) {
    list.push(i);
}
console.log(list);

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: list,
        datasets: [{
            label: 'USD árfolyam',
            data: chartData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>



