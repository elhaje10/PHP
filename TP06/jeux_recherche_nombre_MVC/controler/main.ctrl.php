<?php
// Controleur principal : celui qui est utilisé au démarrage
// Etat : on connait ou non le nom de la personne
// Objectif : si le nom est connu on passe au début du jeu (start)
// sinon on demande à la personne de se présenter.

//////////////////////////////////////////////////////////////////////////////
// PARTIE RECUPERATION DES DONNEES
//////////////////////////////////////////////////////////////////////////////

// Récupération des informations de la query string
if (isset($_GET['nom'])) {
  $nom = $_GET['nom'];
} else {
  $nom = '';
}

//////////////////////////////////////////////////////////////////////////////
// PARTIE USAGE DU MODELE
//////////////////////////////////////////////////////////////////////////////

// Rien à faire

//////////////////////////////////////////////////////////////////////////////
// PARTIE SELECTION DE LA VUE
//////////////////////////////////////////////////////////////////////////////

// Si l'on connait la personne on lui propose un jeu
// sinon, on lui demande de se présenter
if ($nom != '') {
  // On va lui proposer de jouer
  // On passe les informations à la vue
  $data['nom'] = $nom;
  // On charge la vue
  include("../view/start.view.php");
} else {
  // On ne sait pas qui est la personne
  // on lui propose de se présenter
  // On charge la vue du formulaire
  // Il n'y a pas de données à cette vue qui est purement en HTLM
  include("../view/getName.view.html");
}
?>
