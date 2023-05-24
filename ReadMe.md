Ce projet est actuellement en cours de developpement !

Trame de couleur :
.color1 {color: #342d5c;}
.color2 {color: #613167;}
.color3 {color: #9b3a73;}
.color4 {color: #e44f79;}
.color5 {color: #ff7c74;}
Nom du site ByteMaster

<!-- Alexis : Page d'accueil / Nav / Connexion / Inscription
Alex, Ahmed : FAQ, Choix thèmes, Choix difficulté, Start Quizz, Contact
Mathieu : Question, Leaderboard, Correction -->

Alexis : profil utilisateur (ses resultats) / Crud
Alex : Form choix du niveau, generer classement
Ahmed : Generation du logo en fonction du choix utilisateur
Mathieu : Form choix du theme
Choix du thème => form --Mathieu
Choix du niveau => form --Alex
generer classement --Alex
Generation du logo en fonction du choix utilisateur --Ahmed
generation et affichage question --
genere correction des question --

<?php
/* $qst = 0;
$id = $questions[$qst]->question_id;
/* $_SESSION['id'] = $questions; */
/* $_SESSION['id'] = $id;
echo $_SESSION['id'];
echo "<pre>";
var_dump($questions);
echo "</pre>"; */
?>
<main id="question_qcm_main">
    <div class="compteur_question_qcm">
        <p>Question
            <?= $_GET['question'] ?>/20
        </p>
    </div>
    <div class="container_question">
        <h1 id="byte">Quizz ByteMaster</h1>
        <div id="quiz">
            <?php
            // Afficher la valeur de la question
            echo "<h3 class='titre_section_demarrage'>" . $questions[0]->question . "</h3>";
            ?>

            <form method="post"
                action="?controller=question_correction&action=question&id=<?= $_GET['id'] ?>&niveau=<?= $_GET['niveau'] ?>&question=<?= $_SESSION['question'] ?>">
                <div class="reponses-qcm">
                    <?php $cpt = 1 ?>
                    <?php foreach ($questions as $question): ?>
                        <label for="qst<?= $cpt ?>"><?= substr(htmlspecialchars($question->reponse), 3) ?>
                            <input type="checkbox" name="qst<?= $cpt ?>" id="qst<?= $cpt ?>">
                        </label>
                        <?php $cpt++ ?>
                    <?php endforeach; ?>
                </div>
                <div class="qcm-question-valider">
                    <button type="submit">Valider</button>
                </div>
            </form>
        </div>
    </div>

</main>
