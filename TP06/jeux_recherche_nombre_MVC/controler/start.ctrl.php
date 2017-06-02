<?php
// Controleur du début du jeu
// Etat : on connait le nom de la personne
// Objectif : on va lui demander si elle veut jouer
// Si c'est oui, on lui présente la regle du jeu,
// si non on termine.

//////////////////////////////////////////////////////////////////////////////
// PARTIE RECUPERATION DES DONNEES
//////////////////////////////////////////////////////////////////////////////

// Récupération des informations de la query string
if (isset($_GET['nom'])) {
  $nom = $_GET['nom'];
} else {
  // C'est une erreur : on doit toujours avoir un nom
  $error = 'start.ctrl.php : le nom a été perdu dans la query string';
}

if (isset($_GET['reponse'])) {
  if ($_GET['reponse'] == 'Oui') {
    $jouer = true;
  } else {
    $jouer = false;
  }
} else {
  // C'est une erreur : on doit toujours avoir une réponse
  $erreur = 'start.ctrl.php : pas de réponse dans la query string';
}

//////////////////////////////////////////////////////////////////////////////
// PARTIE USAGE DU MODELE
//////////////////////////////////////////////////////////////////////////////

// Calculs : rien à faire


//////////////////////////////////////////////////////////////////////////////
// PARTIE SELECTION DE LA VUE
//////////////////////////////////////////////////////////////////////////////

// Choix de la vue en fonction de l'état des variables

// S'il y a une erreur
if (isset($error)) {
  // On passe les informations à la vue
  $data['error'] = $error;
  // On charge la vue
  include("../view/error.view.php");
} else {
  // Le joueur veux jouer ?
  if ($jouer) {
    // On passe les informations à la vue
    $data['nom'] = $nom;
    // On charge la vue
    include("../view/regleDuJeu.view.php");
  } else {
    // On passe les informations à la vue
    $data['nom'] = $nom;
    include("../view/pasDeJeu.view.php");
  }
}



?>
