<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
  <h1> Regle du jeu </h1>
  <p> Voici les regles du jeu : </p>
  <p> Vous devez décider d'un nombre entre 1 et 999</p>
  <p> Je vais essayer de le deviner.
    Etes vous pret <?= $data['nom']?> ?</p>
  </p>
  <form action="jeu.ctrl.php">
    <input type="submit" value="Oui !">
    <input type="hidden" name="nom" value="<?= $data['nom']?>"/>
  </form>
</body>
</html>
