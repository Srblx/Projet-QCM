<?php
$_SESSION['liste_id'] = $questions;
$cpt = 0;

header(('Location: ?controller=question_correction&action=une_question'));
?>