<?php
$theme = $_GET['theme'];
switch ($theme) {
    case 1:
        $Titre = 'HTML';
        break;
    case 2:
        $Titre = 'CSS';
        break;
    case 3:
        $Titre = 'JavaScript';
        break;
    case 4:
        $Titre = 'PHP';
        break;
    default:
        $Titre = 'Aucun thème trouvé';
        break;
}

$_SESSION['theme'] = $_GET['theme'];
$_SESSION['niveau'] = $_GET['niveau'];
?>

<main class="case_main_demarrage">
    <section class="case_section_demarrage">
        <!-- la condition correspond à ce qu'on trouve dans l'url, et selon l'url, on affiche le contenu qui correspond au thème, ainsi qu'au niveau choisi -->
        <?php if ($_GET['theme'] <= 4 && $_GET['theme'] != 0) { ?>
            <h3 class="titre_section_demarrage">
                <?= $Titre ?>
            </h3>
            <p>Niveau
                <?= $_GET['niveau'] ?>
            </p>
            <img src="./Content/img/<?= $_GET['theme'] ?>.png" alt="" class="img_section_demarrage"
                id="img_section_demarrage">
            <p class="para_section_demarrage">Ce QCM comporte 20 questions, pour chaque question vous avez 45
                secondes pour
                répondre.</p>
            <a
                href="?controller=question_correction&action=question&theme=<?= $_GET['theme'] ?>&niveau=<?= $_GET['niveau'] ?>">
                <button class="submit_section_demarrage">Démarrer le Quizz</button></a>
        <?php } else { ?>
            <h3 id="error-id-theme">
                <?= $Titre ?>
            </h3>
        <?php } ?>
    </section>
</main>