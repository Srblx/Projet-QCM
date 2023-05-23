<?php if ($_GET['id'] == 1) {
    $Titre = 'HTML';
}
if ($_GET['id'] == 2) {
    $Titre = 'CSS';
}
if ($_GET['id'] == 3) {
    $Titre = 'JavaScript';
}
if ($_GET['id'] == 4) {
    $Titre = 'PHP';
} ?>
<main class="case_main_demarrage">
    <section class="case_section_demarrage">
        <!-- la condition correspond à ce qu'on trouve dans l'url, et selon l'url, on affiche le contenu qui correspond au thème, ainsi qu'au niveau choisi -->
        <?php ?>
        <h3 class="titre_section_demarrage">
            <?= $Titre ?>
        </h3>
        <p>Niveau
            <?= $_GET['niveau'] ?>
        </p>
        <img src="./Content/img/<?= $_GET['id'] ?>.png" alt="" class="img_section_demarrage" id="img_section_demarrage">
        <p class="para_section_demarrage">Ce QCM comporte 20 questions, pour chaque question vous avez 45s pour
            répondre.</p>
        <button type="submit" class="submit_section_demarrage">Démarrer le Quizz</button>
    </section>
</main>