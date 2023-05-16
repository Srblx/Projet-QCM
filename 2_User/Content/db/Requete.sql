SELECT theme_id, id FROM question WHERE theme_id = 2;

--requette pour voir les question sans reponse 
SELECT description 
FROM question 
where id NOT IN 
( SELECT question_id 
from reponse 
INNER join question 
on question.id = reponse.question_id
);

-- Supprimer les réponses
DELETE FROM `reponse` WHERE question_id BETWEEN id_debut AND id_fin;

-- Supprimer les questions
DELETE FROM `question` WHERE id BETWEEN id_debut AND id_fin;

<!-- ! Afficher toute les question avec leur reponse et leur correction -->

SELECT q.\*, r.id as reponse_id, r.description as reponse_description, r.Correct
FROM question q
LEFT JOIN reponse r ON q.id = r.question_id;

SELECT 
    q.id AS question_id, -- Sélectionne l'ID de la question et renomme la colonne en 'question_id'
    q.description AS question, -- Sélectionne la description de la question et renomme la colonne en 'question'
    r.id AS reponse_id, -- Sélectionne l'ID de la réponse et renomme la colonne en 'reponse_id'
    r.description AS reponse -- Sélectionne la description de la réponse et renomme la colonne en 'reponse'
FROM 
    question q
JOIN 
    reponse r ON q.id = r.question_id -- Effectue une jointure entre les tables 'question' et 'reponse' en utilisant l'ID de la question
WHERE 
    q.id BETWEEN 193 AND 500; -- Filtre les résultats uniquement pour les IDs de questions compris entre 193 et 500
	
	
-- pour supprimer les qu'est d'une id a une autre 
DELETE FROM reponse
WHERE question_id IN (
    SELECT id
    FROM question
    WHERE id BETWEEN 193 AND 500
);

-- pour supprimer les questions d'un id a une autres
DELETE FROM question WHERE id BETWEEN 479 AND 598;

-- Sélectionne les IDs des questions ayant un theme_id égal à 2
SELECT *
FROM reponse
WHERE question_id IN (
    SELECT id
    FROM question
    WHERE theme_id = 2
);

-- generer les 20 question aleatoires 
SELECT q.id AS question_id, q.description AS question, r.id AS reponse_id, r.description AS reponse
FROM (
    SELECT id, description
    FROM question
    ORDER BY RAND() -- Génère un ordre aléatoire des questions
    LIMIT 20 -- Sélectionne 20 questions aléatoires
) q
JOIN reponse r ON q.id = r.question_id;
	
	-- voir au dessus ! Ajouter le theme choisi 
	SELECT q.id AS question_id, q.description AS question, r.id AS reponse_id, r.description AS reponse
FROM (
    SELECT id, description
    FROM question
    WHERE theme_id = <theme_id>
    ORDER BY RAND()
    LIMIT 20
) q
JOIN reponse r ON q.id = r.question_id;