<?php if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>Index</title>

    <!-- link js -->
    <!-- <script src="./Content/js/app.js" defer></script> -->
    <script src="./Content/js/about.js" defer></script>

    <!-- link css -->
    <link rel="stylesheet" href="./Content/css/style.css">
    <link rel="stylesheet" href="./Content/css/style_choice.css">
    <link rel="stylesheet" href="Content/css/style_about.css">
    <link rel="stylesheet" href="./Content/css/style_nav.css">
    <link rel="stylesheet" href="./Content/css/style_leaderboard.css">
    <link rel="stylesheet" href="./Content/css/style_question.css">
    <link rel="stylesheet" href="./Content/css/style_contact.css">
    <link rel="stylesheet" href="./Content/css/style_profile.css">
    <link rel="stylesheet" href="./Content/css/style_demarrage_quizz.css">

    <!-- Link font awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- link boostrap -->

    <!-- Link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Link Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Link Bootstrap 5 JavaScript (with Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"
        defer></script>

</head>

<body>
    <!--//! Voir le fichier exel Samy/CourSurMVC/Exel -->
    <?php
    //* Inclure les fichiers nécessaires
    require_once 'Controllers/Controller.php';
    require_once 'Models/Model.php';
    require_once 'Utils/header.php';

    //* Tableau des contrôleurs disponibles
    $controllers = ["home", "choice", "contact", "leaderboard", "profile", "question_correction"];

    //* Nom du contrôleur par défaut
    $controller_default = "home";

    //* Vérifier si un contrôleur est spécifié dans l'URL
    if (isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
        //* Utiliser le nom spécifié si il est valide
        $nom_controller = $_GET['controller'];
    } else {
        //* Utiliser le nom par défaut si aucun nom n'est spécifié ou si le nom spécifié n'est pas valide
        $nom_controller = $controller_default;
    }

    //* Construire le nom de la classe correspondante au contrôleur
    $nom_classe = "Controller_" . $nom_controller;

    //* Construire le nom du fichier contenant la classe correspondante au contrôleur
    $nom_fichier = "Controllers/" . $nom_classe . ".php";

    //* Vérifier si le fichier existe
    if (file_exists($nom_fichier)) {
        //* Inclure le fichier
        require_once($nom_fichier);
        //* Instancier la classe correspondante au contrôleur
        $controller = new $nom_classe();
    } else {
        //* Afficher une erreur 404 si le fichier n'existe pas
        exit("Error 404 : not found");
    }

    //* Inclure le fichier de pied de page
    require_once 'Utils/footer.php';
    echo "<b id='controller'>" . "Controller : " . $_GET['controller'] . "<br>" . "<b>";
    echo "<b id='action'>" . "action : " . $_GET['action'] . "<br>" . "<b>";
    ?>
</body>

</html>