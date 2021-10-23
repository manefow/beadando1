<html>
<body>

<?php
require '..\Models\UserModel.php';
require '..\..\template.php';
loadTemplate();


class RegisztracioController
{
  function __construct ( $email, $password, $fname, $lname, $uname )
  {
      $model          = new UserModel;
      $reg_success    = $model->register_user( $email, $password, $fname, $lname, $uname );
      echo $reg_success ? "Sikeres regisztráció!" : "Az e-mail cím már foglalt!";
  }
}

// Szerver oldali ellenőrzés, hogy minden mező ki van töltve
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['uname']) && isset($_POST['fname']) && isset($_POST['lname'])) {

    $regisztracioController = new RegisztracioController ( $_POST['email'], $_POST['password'], $_POST['fname'], $_POST['lname'], $_POST['uname'] );

}


?>

</body>
</html>