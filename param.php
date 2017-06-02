<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Liste des paramètres</title>
        <link rel="stylesheet" href="style.css" charset="utf-8">
    </head>
    <body>
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

        <section>
            <h1>DEBUG</h1>
            <?php

                date_default_timezone_set ('Europe/Paris') ;

                echo "<p>Heure : ";
                echo date("H : i : s");
                echo "</br> Date : ";
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
