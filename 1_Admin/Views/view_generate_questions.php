<?php
$_SESSION['liste_id'] = $questions;
$_SESSION['cpt'] = $cpt = 0;
$ListeReponseDB=[];
$_SESSION['ListeReponseDB'] = $ListeReponseDB;
$ListeReponseUser=[];
$_SESSION['ListeReponseUser'] = $ListeReponseUser;

/* var_dump($_SESSION['liste_id']); */

header(('Location: ?controller=question_correction&action=une_question'));
?>