<main>
    <div class="container_question">
        <h1 id="byte">Quiz ByteMaster</h1>
        <div id="quiz">
            <main>
                <?php
                // Connexion à la base de données
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "qcm";

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Récupération du nombre de questions déjà répondues
                    $stmtCount = $conn->prepare("SELECT COUNT(*) AS answered FROM repondre");
                    $stmtCount->execute();
                    $answeredCount = $stmtCount->fetch(PDO::FETCH_ASSOC)['answered'];

                    // Récupération de la question actuelle
                    $stmt = $conn->prepare("SELECT q.id AS question_id, q.description AS question, r.id AS reponse_id, r.description AS reponse
                            FROM (
                                SELECT id, description
                                FROM question
                                ORDER BY RAND()
                                LIMIT 20
                            ) q
                            JOIN reponse r ON q.id = r.question_id
                            LIMIT 1");
                    $stmt->execute();
                    $question = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($question) {
                        echo "<h3 class='titre_section_demarrage'>" . $question['question'] . "</h3>";
                        echo "<ul>";

                        // Récupération des 4 choix de la question actuelle
                        $choices = [];
                        while ($question && $question['question_id'] === $question['question_id']) {
                            $choices[] = $question['reponse'];
                            $question = $stmt->fetch(PDO::FETCH_ASSOC);
                        }

                        // Mélange des choix
                        shuffle($choices);

                        // Affichage des choix
                        echo "<form action='' method='POST' id='quizForm'>";
                        foreach ($choices as $choice) {
                            echo "<li>";
                            echo "<input type='radio' name='reponse_id' value='" . $choice . "'> ";
                            echo $choice;
                            echo "</li>";
                        }

                        echo "</ul>";
                        echo "<p>Question " . ($answeredCount + 1) . " sur 20</p>";
                        echo "<button type='submit' name='submit'>Suivant</button>";
                        echo "</form>";
                    } else {
                        echo "Aucune question trouvée.";
                    }
                } catch (PDOException $e) {
                    echo "Erreur de connexion à la base de données : " . $e->getMessage();
                }
                $conn = null;
                ?>
        </div>
    </div>
</main>