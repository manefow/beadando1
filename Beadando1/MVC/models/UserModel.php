<?php

class UserModel
{

    // A konstruktor létrehozza az adatbázis kapcsolatot
    function __construct () 
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=utazas', 'root', '');
        $this->dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    }

    function check_user_credentials($email, $password)
    {

        // Lekérjük, van-e ilyen e-mail és jelszó páros
        $sqlSelect = "select id, fname, lname, uname from users where email = :email and password = :password";
        $response = $this->dbh->prepare($sqlSelect);
        $response->execute( array( ':email' => $email, ':password' => $password ) );
        $result = $response->fetch();

    
        if($result) {
            $_SESSION['id']    = $result['id'];
            $_SESSION['fname'] = $result['fname'];
            $_SESSION['lname'] = $result['lname'];
            $_SESSION['uname'] = $result['uname'];
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function register_user( $email, $password, $fname, $lname, $uname)
    {
        // Lekérjük, van-e ilyen e-mail
        $sqlSelect = "select id from users where email = :email";
        $response = $this->dbh->prepare($sqlSelect);
        $response->execute( array( ':email' => $email ) );
        $result = $response->fetch();

        if (!$result)
        {
           
            $sqlInsert = "insert into users ( id, email, password, fname, lname, uname) values(0, :email, :password, :fname, :lname, :uname)";;
            $response = $this->dbh->prepare($sqlInsert);
            $response->execute( array(':email' => $email, ':password' => $password, ':fname' => $fname, ':lname' => $lname, ':uname' => $uname) ); 

            return ($count = $response->rowCount()) ? true : false;
        }
    }
}

?>