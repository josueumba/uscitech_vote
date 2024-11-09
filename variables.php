<?php
//Récupération des étudiants à partir de la base de données
$studentsStatement= $mysqlClient-> prepare('SELECT * FROM etudiants');
$studentsStatement->execute();
$students= $studentsStatement->fetchAll();

