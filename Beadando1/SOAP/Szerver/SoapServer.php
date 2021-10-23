<?php
	class Szolgaltatas {

		public function szoveg()  {
			return "Hello";
		}
		

        public function searchoffers( $orszag, $besorolas, $idotartam)
        {
            $this->dbh = new PDO('mysql:host=localhost;dbname=utazas', 'root', '');
            $this->dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

            $sqlSelect = "select szalloda.nev, indulas, ar from szalloda INNER JOIN tavasz ON tavasz.szalloda_az LIKE CONCAT('%', szalloda.az, '%') INNER JOIN helyseg ON helyseg.az = szalloda.helyseg_az 
            where orszag = :orszag and besorolas = :besorolas and idotartam = :idotartam";
            $response = $this->dbh->prepare($sqlSelect);
            $response->execute( array( ':orszag' => $orszag, ':besorolas' => $besorolas, ':idotartam' => $idotartam ) );
            $result = $response->fetchAll();

            return $result;
        }


	}
	$options = array(
	"uri" => "http://localhost/Beadando1/SOAP/Szerver/SoapServer.php");
	$server = new SoapServer(null, $options);
	$server->setClass('Szolgaltatas');
	$server->handle();
?>