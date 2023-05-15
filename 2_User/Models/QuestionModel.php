<?php

class QuestionModel extends Model
{
    public function get_all_questions()
    {
        $db = $this->get_database();
        $query = "SELECT * FROM question";
        $statement = $db->prepare($query);
        $statement->execute();
        $questions = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $questions;
    }
}



