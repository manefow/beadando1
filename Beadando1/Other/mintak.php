<html>
<body>

<?php

// PDO objektum létrehozása
$dbh = new PDO( 'mysql:host=localhost; dbname=utazas', 'root', '' );
// Karakterkészlet beállítása
$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
// Sql query megírása stringként
$sqlSelect = "select * from helyseg";
// Query preparálása és végrehajtása
$response = $dbh->prepare($sqlSelect);
$response->execute();
//Adatok kinyerése az eredményből (Ha egy sort akarunk, akkor fetch, egyébként fetchAll)
$result = $response->fetchAll(PDO::FETCH_ASSOC);

// Az eredmény egy tábla, amelyben végigloopolhatunk a rekordokon, amikben a mezőnevekkel indexelhetünk
foreach( $result as $record ) {
    echo $record["nev"];
    echo "<br>";
}


?>

</body>
</html>