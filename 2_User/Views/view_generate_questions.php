<?php
$_SESSION['liste_id'] = $questions;
$_SESSION['cpt'] = $cpt = 0;
/* var_dump($_SESSION['liste_id']); */

header(('Location: ?controller=question_correction&action=une_question'));
?>