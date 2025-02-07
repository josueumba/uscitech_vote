<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/dbconnection.php");

//fonction pour aller vers une autre page
function redirectToUrl(string $url): never {
    header("Location: {$url}");
    exit();
}


//Retrieve the president's candidates
function getCandidates($mysqlClient, $titre) {
    $query= "SELECT c.id, e.nom, e.prenom, p.titre as poste 
            FROM candidat c JOIN poste p ON p.id= c.poste 
            JOIN etudiant e ON e.id= c.etudiant WHERE p.titre= :titre AND CONCAT(e.nom,' ',e.prenom)!='BLANC VOTE'";
    $stmt= $mysqlClient->prepare($query);
    $stmt->execute(['titre' => $titre]);
    $results= $stmt->fetchAll();
    return $results;
}

//Retrieve the cp's candidates
function getCandidatesCps($mysqlClient, $titre, $promotion, $options) {
    $query= "SELECT c.id, e.nom, e.prenom, p.titre as poste 
            FROM candidat c JOIN poste p ON p.id= c.poste 
            JOIN etudiant e ON e.id= c.etudiant WHERE p.titre= :titre 
            AND e.promotion= :promotion AND e.options= :options 
            AND CONCAT(e.nom,' ',e.prenom)!='BLANC VOTE'";
    $stmt= $mysqlClient->prepare($query);
    $stmt->execute([
        'titre' => $titre,
        'promotion' => $promotion,
        'options' => $options
    ]);
    $results= $stmt->fetchAll();
    return $results;
}

//Retrieve the delegue's candidates
function getCandidatesDelegues($mysqlClient, $titre, $options) {
    $query= "SELECT c.id, e.nom, e.prenom, p.titre as poste 
            FROM candidat c JOIN poste p ON p.id= c.poste 
            JOIN etudiant e ON e.id= c.etudiant WHERE p.titre= :titre 
            AND e.options= :options 
            AND CONCAT(e.nom,' ',e.prenom)!='BLANC VOTE'";
    $stmt= $mysqlClient->prepare($query);
    $stmt->execute(['options' => $options, 'titre' => $titre]);
    $results= $stmt->fetchAll();
    return $results;
}

//fonction pour récupérer les voix des candidats président et vice président
function getPresidenceVote($mysqlClient, $titre) {
    $query= "SELECT c.id AS id, CONCAT(e.nom, ' ', e.prenom) AS nom, COUNT(v.candidat) AS voix
            FROM etudiant e
            LEFT JOIN candidat c ON e.id = c.etudiant
            LEFT JOIN vote v ON c.id = v.candidat
            LEFT JOIN poste p ON p.id = c.poste
            WHERE p.titre = :titre
            GROUP BY e.nom, e.prenom, c.id
            ORDER BY voix DESC";
    $stmt= $mysqlClient-> prepare($query);
    $stmt->execute(['titre' => $titre]) or die(print_r($mysqlClient->errorInfo()));
    $result= $stmt->fetchAll();
    return $result;
}

//fonction pour récupérer les voix des candidats delegue
function getDeleguesVote($mysqlClient, $titre, $options) {
    $query= "SELECT CONCAT(e.nom, ' ', e.prenom) AS nom, COUNT(v.candidat) AS voix
            FROM etudiant e
            LEFT JOIN candidat c ON e.id = c.etudiant
            LEFT JOIN vote v ON c.id = v.candidat
            LEFT JOIN poste p ON p.id = c.poste
            WHERE p.titre = :titre AND e.options= :options
            GROUP BY e.nom, e.prenom
            ORDER BY voix DESC";
    $stmt= $mysqlClient-> prepare($query);
    $stmt->execute(['options' => $options, 'titre' => $titre]) or die(print_r($mysqlClient->errorInfo()));
    $result= $stmt->fetchAll();
    return $result;
}

//fonction pour récupérer les voix des candidats cp et cpa
function getCpsVote($mysqlClient, $titre, $promotion, $options) {
    $query= "SELECT CONCAT(e.nom, ' ', e.prenom) AS nom, COUNT(v.candidat) AS voix
            FROM etudiant e
            LEFT JOIN candidat c ON e.id = c.etudiant
            LEFT JOIN vote v ON c.id = v.candidat
            LEFT JOIN poste p ON p.id = c.poste
            WHERE p.titre = :titre AND e.promotion= :promotion AND e.options= :options
            GROUP BY e.nom, e.prenom
            ORDER BY voix DESC";
    $stmt= $mysqlClient-> prepare($query);
    $stmt->execute(['titre' => $titre, 'promotion' => $promotion, 'options' => $options]) or die(print_r($mysqlClient->errorInfo()));
    $result= $stmt->fetchAll();
    return $result;
}
