<?php

require '..\Models\VelemenyekModel.php';
require '..\Views\velemenyekView.php';
require '..\..\template.php';
loadTemplate();


class velemenyekController
{
    function __construct ( $belepve )
    {
        $velemenyekView = new VelemenyekView($belepve);

        if ($belepve)
        {
            // Mutassuk meg a felületet új vélemény írására

            echo 
            '
            <form action="..\..\post_review.php" method="post">
            <label>Írjon véleményt egy utazásról!</label>
            <br>
            <textarea name="review" rows="4" cols="50"></textarea>
            <br><br>
            <input type="submit" value="Küldés">
            </form>
            <br>

            ';



            // Listázzuk ki a már megírt véleményeket
            $velemenyekModel = new VelemenyekModel;
            $reviews = $velemenyekModel->getReviews();
            
            $velemenyekView = new VelemenyekView( $belepve );
            $velemenyekView->showReviews( $reviews );

            


        }
    }

    
}
$velemenyekView = new VelemenyekController( isset($_SESSION["id"]) );

?>