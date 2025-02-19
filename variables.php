<?php

//Récupération des étudiants à partir de la base de données
$studentsStatement= $mysqlClient-> prepare('SELECT * FROM etudiant');
$studentsStatement->execute();
$students= $studentsStatement->fetchAll();

function vote($mysqlClient, $poste) {
    $vote= $mysqlClient-> prepare("SELECT COUNT(*) FROM vote_2 WHERE poste= :poste");
    $vote-> execute(['poste' => $poste]);
    $vote= $vote-> fetchColumn();
    return $vote;
}

function voteD($mysqlClient, $poste, $options) {
    $vote= $mysqlClient-> prepare("SELECT COUNT(*) FROM vote_2 WHERE poste= :poste AND options= :options");
    $vote-> execute(['poste' => $poste, 'options' => $options]);
    $vote= $vote-> fetchColumn();
    return $vote;
}

function voteCp($mysqlClient, $poste, $promotion, $options) {
    $vote= $mysqlClient-> prepare("SELECT COUNT(*) FROM vote_2 WHERE poste= :poste AND promotion= :promotion AND options= :options");
    $vote-> execute(['poste' => $poste, 'options' => $options, "promotion" => $promotion]);
    $vote= $vote-> fetchColumn();
    return $vote;
}




