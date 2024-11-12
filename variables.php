<?php
session_start();

//Récupération des étudiants à partir de la base de données
$studentsStatement= $mysqlClient-> prepare('SELECT * FROM etudiants');
$studentsStatement->execute();
$students= $studentsStatement->fetchAll();

//Vérification si la personne a déjà voté
$full_name= $_SESSION["logged_student"]["prenom"] . " " . $_SESSION["logged_student"]["nom"];
$hasVotedQuery= "SELECT COUNT(*) FROM vote v JOIN etudiant e ON e.id= v.etudiant WHERE CONCAT(e.prenom, ' ', e.nom)= :etudiant";
$stmtVoted= $mysqlClient->prepare($hasVotedQuery);
$stmtVoted->execute([
    "etudiant" => $full_name
]) or die(print_r($mysqlClient->errorInfo())); 
$hasVoted = $stmtVoted-> fetch();

