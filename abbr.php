<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Liste des paramètres</title>
        <link rel="stylesheet" href="style.css" charset="utf-8">
    </head>
    <body>
        <section>
            <h1>Abbréviations</h1>

            <?php
                $tab = array(
                    'PHP' => "Hypertext PreProcessor",
                    'HTML' => "HyperText Markeup Language",
                    'XML' => "eXtended Markeup Language",
                    'CSS' => "Cascading Style Sheets"
                );

                function abbr($var) {
                    global $tab;
                    echo "<abbr title=\"", $tab[$var], "\">", $var, "</abbr>";
                }

                function abbrAll() {
                    global $tab;
                    echo "<table><caption>Abbréviations</caption>";
                    foreach ($tab as $key => $value) {
                        echo "<tr><td>", $key, "</td><td>", $value, "</td></tr>";
                    }
                    echo "</table>";
                }
            ?>

            <p>Le langage <?= abbr('PHP') ?> produit généralement
            du <?= abbr('HTML') ?> mais peu produire aussi
            du <?= abbr('XML') ?> ou même du <?= abbr('CSS') ?>.
            </p>
            <p>Voici toutes les abbréviations connues : </p>
            <?= abbrAll() ?>

        </section>

        <!-- <section>
            <h1>Résultat Attendu</h1>

            <p>Le langage <abbr title="Hypertext PreProcessor">PHP</abbr> produit généralement
              du <abbr title="HyperText Markeup Language">HTML</abbr> mais peut produire aussi
              du <abbr title="eXtended Markeup Language">XML</abbr> ou même du <abbr title="Cascading Style Sheets">CSS</abbr>.
              </p>
              <p>Voici toutes les abbréviations connues : </p>
              <table><tr><td>HTML</td><td>HyperText Markeup Language</td></tr>
              </table>
        </section> -->

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
        </section> -->
    </body>
</html>
