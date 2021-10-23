<?php

class VelemenyekView
{
    function __construct( $belepve )
    {
        if (!$belepve)
        {
            echo "Jelentkezzen be a vélemények megtekintéséhez!";
        }
    }

    function showReviews( $reviews )
    {
        echo '<table class="table table-striped">';
        echo '<tr>';

        echo '<th scope="col">Felhasználó</th>';
        echo '<th scope="col">Vélemény</th>';
        echo '<th scope="col">Időpont</th>';

        echo '</tr>';


        foreach ($reviews as $row)
            {
                echo '<tr scope="row">';

                echo '<td>';
                echo  $row['uname'];
                echo '</td>';

                echo '<td>';
                echo  $row['text'];
                echo '</td>';

                echo '<td>';
                echo  $row['date'];
                echo '</td>';
                
                echo '</tr>';
            }
        echo '</table>';
    }
}


?>