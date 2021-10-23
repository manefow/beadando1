<?php
require 'template.php';
loadTemplate();
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>

    <form action="MVC/controllers/RegisztracioController.php" method="post">
        Családnév:  <input type="text" name="lname"><br>
        Utónév:     <input type="text" name="fname"><br>
        Login név:  <input type="text" name="uname"><br>
        E-mail:     <input type="text" name="email"><br>
        jelszó:     <input type="text" name="password"><br>
                    <input type="submit">
    </form>

   

</body>
</html>