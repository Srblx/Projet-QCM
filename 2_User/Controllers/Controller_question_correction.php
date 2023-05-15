<?php

use QuestionModel;

class Controller_question_correction extends Controller
{
    public function action_default()
    {
        // Récupérer les réponses de l'utilisateur depuis la session ou une autre source de données
        $userAnswers = $_SESSION['user_answers']; // Exemple avec une session

        // Charger les questions et les réponses correctes depuis la base de données ou une autre source de données
        $questionModel = new QuestionModel();
        $questions = $questionModel->get_all_questions(); // Exemple avec une classe de modèle

        // Vérifier les réponses de l'utilisateur et générer les données de correction
        $correctionData = $this->generate_correction_data($questions, $userAnswers);

        // Charger la vue de correction et transmettre les données
        $this->render('question/index', $correctionData);
    }

    private function generate_correction_data($questions, $userAnswers)
    {
        $correctionData = array();

        // Parcourir les questions et comparer les réponses de l'utilisateur avec les réponses correctes
        foreach ($questions as $index => $question) {
            $userAnswer = $userAnswers[$index];
            $isCorrect = $question->correctAnswer($userAnswer);

            // Ajouter les données de correction pour chaque question
            $correctionData[] = array(
                'question' => $question->text,
                'userAnswer' => $userAnswer,
                'correctAnswer' => $question->answer,
                'isCorrect' => $isCorrect
            );
        }

        return $correctionData;
    }
}
