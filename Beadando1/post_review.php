<?php

require 'MVC\Models\VelemenyekModel.php';
require 'template.php';
loadTemplate();

if ( isset($_POST['review']) && isset($_SESSION['uname']) )
{

    $velemenyekModel = new VelemenyekModel;
    $success = $velemenyekModel->postReview( $_SESSION['uname'], $_POST['review'] ); 
    echo $success ? 'Köszönjük a véleményét!' : 'A véleményt nem sikerült elküldeni!';

}



?>

