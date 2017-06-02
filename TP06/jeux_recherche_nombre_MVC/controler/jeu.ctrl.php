<?php
// Controleur du jeu
// Etat : on connait le nom de la personne
// Si un objet de la classe Jeu est présent dans la session, il
// représente l'état actuel du jeu, sinon cela signifie que le
// jeu vient juste de débuter.

// Ce controleur a besoin du modèle
require_once('../model/Jeu.class.php');

//////////////////////////////////////////////////////////////////////////////
// PARTIE RECUPERATION DES DONNEES
//////////////////////////////////////////////////////////////////////////////

// Récupération des informations de la query string

// Le nom de l'utilisateur
if (isset($_GET['nom'])) {
  $nom = $_GET['nom'];
} else {
  // C'est une erreur : on doit toujours avoir un nom
  $error = 'jeu.ctrl.php : le nom a été perdu dans la query string';
}

// La réponse, si on est en cours de jeu
if (isset($_GET['reponse'])) {
  $reponse = $_GET['reponse'];
} else {
  // C'est le premier tour du jeu : on n'a pas encore de réponse
  // de l'utilisateur
  $reponse = '';
}

// Ouvre la session
session_start();

// Récupère l'objet du Jeu dans la session
if (isset($_SESSION['jeu'])) {
  $jeu = $_SESSION['jeu'];
} else {
  // C'est le début du jeu, on n'a pas encore d'objet dans la session
  // on crée l'objet
  $jeu = new Jeu();
}

//////////////////////////////////////////////////////////////////////////////
// PARTIE USAGE DU MODELE
//////////////////////////////////////////////////////////////////////////////

// Booléen pour indiquer la fin du jeu
$finDuJeu = false;

// Booléen pour indiqué que le joueur a triché
$triche = false;

// Examen de la réponse de l'utilisateur
if ($reponse == 'Trouvé') {
  // L'utilisateur nous dit que la valeur est trouvée
  // Rappel la valeur devinée
  $guess = $jeu->lastGuess();
  // C'est la fin du jeu
  $finDuJeu = true;
  // On termine aussi la session, cela permet de redémarrer le jeu
  // avec un nouvel objet
  session_destroy();
} else {
  // S'il n'y a plus d'autre choix c'est que l'utilisateur a triché
  if ($jeu->noChoice()) {
    // C'est une triche
    $triche = true;
    // On termine la session
    session_destroy();
  } else {
    // Autres cas ou l'on poursuit le jeu

    if ($reponse == 'Trop grand') {
      // L'utilisateur nous dit que la valeur est trop grande
      // Informe le modèle du choix de l'utilisateur
      $jeu->guessTooHigh();
      // Demande au modèle de refaire une estimation
      $guess = $jeu->guess();
    } elseif ($reponse == 'Trop petit') {
      // L'utilisateur nous dit que la valeur est trop petite
      // Informe le modèle du choix de l'utilisateur
      $jeu->guessTooLow();
      // Demande au modèle de refaire une estimation
      $guess = $jeu->guess();
    } else {
      // C'est le premier pas du jeu, la première estimation
      $guess = $jeu->guess();
    }
    // Sauvegarde l'objet dans la session
    $_SESSION['jeu'] = $jeu;
    // Ferme la session
    session_write_close ();
  }
}

//////////////////////////////////////////////////////////////////////////////
// PARTIE SELECTION DE LA VUE
//////////////////////////////////////////////////////////////////////////////

// S'il y a une erreur
if (isset($erreur)) {
  // On passe les informations à la vue
  $data['erreur'] = $erreur;
  // On charge la vue
  include("../view/error.view.php");
} else {
  if ($finDuJeu) {
    // On charge la vue
    // On passe les informations à la vue
    $data['nom'] = $nom;
    $data['solution'] = $guess;
    $data['nombreDeCoup'] = $jeu->nombreDeCoup();
    // On charge la vue
    include("../view/finDuJeu.view.php");
  } elseif ($triche) {
    // On charge la vue
    // On passe les informations à la vue
    $data['nom'] = $nom;
    // On charge la vue
    include("../view/triche.view.php");
  } else {
    // Suite du jeux
    // On passe les informations à la vue
    $data['guess'] = $guess;
    $data['nom'] = $nom;
    // On charge la vue
    include("../view/jeu.view.php");
  }
}



?>
