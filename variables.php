<?php
//Récupération des étudiants à partir de la base de données
$studentsStatement= $mysqlClient-> prepare('SELECT * FROM etudiant');
$studentsStatement->execute();
$students= $studentsStatement->fetchAll();



