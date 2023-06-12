<?php
ob_start(); // Activer la mise en tampon de sortie

$_SESSION['liste_id'] = $questions;
$_SESSION['cpt'] = $cpt = 0;
$ListeReponseDB = [];
$_SESSION['ListeReponseDB'] = $ListeReponseDB;
$ListeReponseUser = [];
$_SESSION['ListeReponseUser'] = $ListeReponseUser;

// header('Location: ?controller=question_correction&action=une_question');
echo '<script>window.location.href = "?controller=question_correction&action=une_question";</script>';

ob_end_flush(); // Envoyer les en-têtes HTTP et le contenu mis en tampon
?>