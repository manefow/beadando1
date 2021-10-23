<?php

require '../../template.php';
loadTemplate();

$options = array(
    "location" => "http://localhost/Beadando1/SOAP/Szerver/SoapServer.php",
    "uri" => "http://localhost/Beadando1/SOAP/Szerver/SoapServer.php",
    'keep_alive' => false,
);	


echo '<h4>Keressen a célország, a szálloda kategória és az út hossza alapján!</h4>';

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label>Ország:</label>
    <select name="orszag">
        <option value="Egyiptom">Egyiptom</option>
        <option value="Tunézia">Tunézia</option>
    </select>

    <label>Kategória:</label>
    <select name="besorolas">
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>

    <label>Időtartam (éj):</label>
    <select name="idotartam">
        <option value="8">8</option>
        <option value="15">15</option>
    </select>


    <input type="submit" value="Keresés">

</form>

<?php

if ( isset($_POST["orszag"]) && isset($_POST["besorolas"]) && isset($_POST["idotartam"]) )
{
    $kliens = new SoapClient(null, $options);
    $talalat = $kliens->searchOffers( $_POST["orszag"], $_POST["besorolas"], $_POST["idotartam"] );


    echo '<table class="table table-striped">';

    echo '<tr>';

    echo '<th scope="col">Szálloda</th>';
    echo '<th scope="col">Indulási dátum</th>';
    echo '<th scope="col">Ár</th>';

    echo '</tr>';

    foreach ( $talalat as $row )
    {   
        echo '<tr scope="row">';

        echo '<td>';
        echo $row[0];
        echo '</td>';

        echo '<td>';
        echo $row[1];
        echo '</td>';

        echo '<td>';
        echo $row[2];
        echo '</td>';

        echo '</tr>';
    }


    echo '<table>';
}


?>