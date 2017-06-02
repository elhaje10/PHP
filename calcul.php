<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Liste des paramètres</title>
        <link rel="stylesheet" href="style.css" charset="utf-8">
    </head>
    <body>
        <section>
            <h1>Opération</h1>
            <p>Doit afficher A op B = res .</p>
            
            <?php
            $a = isset($_GET['A'])? $_GET['A'] : 0;
            $b = isset($_GET['B'])? $_GET['B'] : 0;
            if (!isset($_GET['op'])) {
                echo "<p>Operateur op manquant.</p>";
            }
            else {
                $op = rawurldecode(urlencode($_GET['op'])) ;
                echo "<p>$a $op $b = ";
                switch ($op) {
                    case '-':
                        echo $a - $b;
                        break;
                    case '+':
                        echo $a + $b;
                        break;
                    case '*':
                        echo $a * $b;
                        break;
                    case '/':
                        if ($b==0) {
                            echo "Division par 0 interdite!";
                        }
                        else {
                            echo $a / $b;
                        }
                        break;
                    case '%':
                        echo $a % $b;
                        break;
                    default:
                        echo "rien";
                        break;
                }
                echo "</p>";
            }
            ?>
        </section>

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
                echo "<br> Date : ";
                echo date("j m Y");
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
