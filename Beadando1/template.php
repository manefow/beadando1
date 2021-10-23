<?php

function loadTemplate()
{
    session_start();

    echo '<head>';

    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">';
    echo '<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">';


    echo '</head>';

    echo '<body>';
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/Beadando1/index.php">Főoldal</a>
                
                <div class="navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="/Beadando1/MVC/controllers/SzallodakController.php">Szállodák</a>
                        <a class="nav-link" href="/Beadando1/SOAP/Kliens/SoapClient.php">Tavaszi utak</a>
                        <a class="nav-link" href="/Beadando1/MVC/controllers/velemenyekController.php">Vélemények</a>
                        <a class="nav-link" href="/Beadando1/SOAP/Kliens/arfolyamokClient.php">Árfolyamok</a>
                        <a class="nav-link disabled">Utazzon velünk!</a>';

                        
                        if ( isset($_SESSION["fname"]) )
                        {
                            echo '<form action="http://localhost/Beadando1/kilepett.php" method="post"> <input type="submit" name="logout" value="Kilépés"/> </form>';
                        } 
                        else 
                        {
                            echo '<form action="/Beadando1/belepo_form.php" method="post"> <input type="submit" name="belepes" value="Belépés"/> </form>';
                            echo '<form action="/Beadando1/regisztracio_form.php" method="post"> <input type="submit" name="regisztracio" value="Regisztráció"/> </form>';
                        }

                        if ( isset($_SESSION["fname"]) )
                        {
                            if($_SESSION["fname"]) 
                            {
                                echo "Üdvözlünk"." ".$_SESSION["lname"]." ".$_SESSION["fname"]." (".$_SESSION["uname"]."), be vagy jelentkezve!";
                            }
                        }


                    echo '</div>
                </div>
            </div>
        </nav>';
}




?>