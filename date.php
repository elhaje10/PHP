<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Liste des paramètres</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <section>
            <h1>Fuseaux horaires</h1>

            <p>
                Résultat attendu : <br>
                Europe/Paris : 19:23:57 30/01/2017 <br>
                Asia/Singapore : 02:23:57 31/01/2017
            </p>

            <?php

                $location[0]='Europe/Paris';
                $location[1]='Asia/Singapore';

                echo "<p>";
                foreach ($location as $key => $value) {
                    date_default_timezone_set($value);
                    echo $value, " : \t", date("H:i:s j/m/Y"), "<br>";
                }
                echo "</p>";

            ?>
        </section>



        <!--
        <section>
            <h1>Liste des paramètres</h1>
            <table>
                <caption>Paramètres</caption>
                <tr>
                    <th>
                        Nom de Variable
                    </th>
                    <th>
                        Valeur
                    </th>
                </tr>

                <?php

                if (isset($_GET)) {
                    foreach ($_GET as $key => $value) {
                        echo "<tr> <td>", htmlentities($key), "</td> <td>", htmlentities($value), "</td> </tr>";
                    }
                }
                ?>
            </table>
        </section>
 -->
        <section>
            <h1>DEBUG</h1>
            <?php

                date_default_timezone_set ('Europe/Paris') ;

                echo "<p>Heure : ";
                echo date("H : i : s");
                echo "<br> Date : ";
                echo date("j M Y");
                echo "</p>";



                echo "<ul>";
                if(!empty($_POST)) {
                    foreach($_POST as $key => $value) {
                      echo "<li> <strong>$key</strong> : ", htmlentities($value), "</li>";}
                    }
                else {
                    foreach($_GET as $key => $value) {
                      echo "<li> <strong>$key</strong> : ", htmlentities($value), "</li>";
                    }
                }
                echo "</ul>";
            ?>
        </section>
    </body>
</html>
