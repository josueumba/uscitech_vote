<?php
//Récupération des étudiants à partir de la base de données
$studentsStatement= $mysqlClient-> prepare('SELECT * FROM etudiant');
$studentsStatement->execute();
$students= $studentsStatement->fetchAll();


$vote= $mysqlClient-> prepare("SELECT COUNT(*) FROM vote_2");
$vote-> execute();
$vote= $vote-> fetchColumn();




