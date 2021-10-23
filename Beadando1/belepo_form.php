
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

    <form action="MVC/controllers/BelepesController.php" method="post">
        E-mail:     <input type="text" name="email"><br>
        Jelszó:     <input type="text" name="password"><br>
        <input type="submit">
    </form>



</body>
</html>