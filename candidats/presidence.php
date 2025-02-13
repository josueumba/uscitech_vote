<?php
 if (session_status() == PHP_SESSION_NONE) {
     session_start();
 }

 require_once(__DIR__ . "/../dbconnection.php");
require_once(__DIR__ . "/../results.php");
 require_once(__DIR__ ."/../variables.php");

 $candidat1 = 'KILIMA SALEM';
 $candidat2 = 'KADIMA ABBA';

 $voix = [];
 $poste= 'PRESIDENT';
 $vote= vote($mysqlClient, $poste);

 foreach($presidence as $candidat) {
     if ($candidat['nom'] === $candidat1) {
         $voix[$candidat1] = $candidat['voix'];
     } elseif ($candidat['nom'] === $candidat2) {
         $voix[$candidat2] = $candidat['voix'];
     }
 }

 if (count($voix) == 2) {
     $voix1 = $voix[$candidat1];
     $voix2 = $voix[$candidat2];

     if ($voix1 < $voix2) {
         $temp = $voix[$candidat1];
         $voix[$candidat1] = $voix[$candidat2];
         $voix[$candidat2] = $temp;
     }

     if ($voix1 == $voix2 && ($voix1 && $voix2 !== 0)) {
         $voix[$candidat1]++;
         $voix[$candidat2]--;
     }

     if($vote == 3) {
         //fonctionn pour mettre à jour la table vote2 au cas où elle contient déjà les données
         function updateVote2($mysqlClient, $vote, $nom, $poste) {
             $updateStmt= $mysqlClient-> prepare("UPDATE vote_2 SET voix= :voix WHERE nom= :nom AND poste= :poste");
             $updateStmt-> execute(["voix" => $vote, "nom" => $nom, "poste" => $poste])  or die(print_r($mysqlClient->errorInfo()));
         }
        
         foreach ($presidence as $candidat) {
             if ($candidat['nom'] === $candidat1) {
                 updateVote2($mysqlClient, $voix[$candidat1], $candidat1, $poste);
             } elseif ($candidat['nom'] === $candidat2) {
                 updateVote2($mysqlClient, $voix[$candidat2], $candidat2, $poste);
             } else {
                 updateVote2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste);
             }
         }
     } else {

         function insertVote2($mysqlClient, $vote, $nom, $poste) {
             $insertStmt= $mysqlClient-> prepare("INSERT INTO vote_2(nom, voix, poste) VALUES(:nom, :voix, :poste)");
             $insertStmt-> execute(["nom" => $nom, "voix" => $vote, "poste" => $poste])  or die(print_r($mysqlClient->errorInfo()));
         }

         foreach ($presidence as $candidat) {
             if ($candidat['nom'] === $candidat1) {
                 insertVote2($mysqlClient, $voix[$candidat1], $candidat1, $poste);
             } elseif ($candidat['nom'] === $candidat2) {
                 insertVote2($mysqlClient, $voix[$candidat2], $candidat2, $poste);
             } else {
                 insertVote2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste);
             }
         }
     }
    
 }

 $presidences= $mysqlClient-> prepare("SELECT * FROM vote_2 WHERE poste= 'president' ORDER BY voix DESC");
 $presidences-> execute();
 $presidences= $presidences-> fetchAll();