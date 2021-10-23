<html>
<body>

<?php
require '..\Models\UserModel.php';
require '..\..\template.php';
loadTemplate();

class BelepesController
{
    function __construct ($email, $password) 
    {
        $model          = new UserModel;
        $login_success  = $model->check_user_credentials($email, $password);
        echo $login_success ? "Bejelentkezett!" : "Ilyen adatokkal nincs regisztrált felhasználó!";
    }

}

// Szerver oldali ellenőrzés, hogy minden mező ki van töltve
if( isset($_POST['email']) && isset($_POST['password']) ) 
{
    $belepesController = new BelepesController($_POST['email'], $_POST['password']);
}


?>

</body>
</html>