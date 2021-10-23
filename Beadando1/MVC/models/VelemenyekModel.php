<?php

class VelemenyekModel
{

    function __construct()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=utazas', 'root', '');
        $this->dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    }


    function getReviews()
    {
        $sqlSelect = "select uname, text, date from reviews order by date desc";
        $response = $this->dbh->prepare($sqlSelect);
        $response->execute();
        $result = $response->fetchAll();

        return $result;
    }


    function postReview( $username, $text )
    {

        $sqlInsert = "insert into reviews ( uname, text, id) values(:uname, :text, 0)";;
        $response = $this->dbh->prepare($sqlInsert);
        $response->execute( array(':uname' => $username, ':text' => $text ) ); 

        return ($count = $response->rowCount()) ? true : false;

    }
}


?>