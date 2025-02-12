<?php
//Récupération des étudiants à partir de la base de données
$studentsStatement= $mysqlClient-> prepare('SELECT * FROM etudiant');
$studentsStatement->execute();
$students= $studentsStatement->fetchAll();

function vote($poste) {
    $vote= $mysqlClient-> prepare("SELECT COUNT(*) FROM vote_2 WHERE poste= :poste");
    $vote-> execute(['poste' => $poste]);
    $vote= $vote-> fetchColumn();
    return $vote;
}




