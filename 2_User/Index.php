<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>Index</title>
    <link rel="stylesheet" href="./Content/css/style.css">

    <link rel="stylesheet" href="./Content/css/style_choice.css">
    <link rel="stylesheet" href="./Content/css/style_nav.css">

    

    
<!-- Link font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
<!-- link boostrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
    integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
    crossorigin="anonymous"></script>
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
    // require_once 'Utils/footer.php';
    echo "<b id='controller'>" . "Controller : " . $_GET['controller'] . "<br>" . "<b>";
    echo "<b id='action'>" . "action : " . $_GET['action'] . "<br>" . "<b>";
    ?>
</body>

</html>