<?php

class VelemenyekView
{
    function __construct( $resorts )
    {
        echo '<h4>Tekintse meg szállodáinkat!</h4><br>';

        echo '<table class="table table-striped">';
        echo '<tr>';

        echo '<th scope="col">Név</th>';
        echo '<th scope="col">Besorolás</th>';
        echo '<th scope="col">Távolság a reptértől</th>';

        echo '</tr>';


        foreach ($resorts as $row)
            {
                echo '<tr scope="row">';

                echo '<td>';
                echo  $row['nev'];
                echo '</td>';

                echo '<td>';
                echo  $row['besorolas'];
                echo '</td>';

                echo '<td>';
                echo  $row['repter_tav'];
                echo '</td>';
                
                echo '</tr>';
            }
        echo '</table>';
    }
        
}


?>