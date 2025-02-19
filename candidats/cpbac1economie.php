<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/../dbconnection.php");
require_once(__DIR__ . "/../results.php");
require_once(__DIR__ ."/../variables.php");

$candidat1 = 'BABADI KENDRA';
$candidat2 = 'KALOMBO DAVID';

$voix = [];
$poste= 'CP';
$promotion= 'BAC1';
$options= 'ECONOMIE';
$vote= voteCp($mysqlClient, $poste, $promotion, $options);

foreach($cp_bac1_economie as $candidat) {
    if (strtoupper($candidat['nom']) === $candidat1) {
        $voix[$candidat1] = $candidat['voix'];
    } elseif (strtoupper($candidat['nom']) === $candidat2) {
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

     if ($voix1 == $voix2 && $voix1 !== 0) {
         $voix[$candidat1]++;
         $voix[$candidat2]--;
     }

     if($vote == 3) {
         //fonctionn pour mettre à jour la table vote2 au cas où elle contient déjà les données
         function updateVoteCpb1E2($mysqlClient, $vote, $nom, $poste, $promotion, $options) {
             $updateStmt= $mysqlClient-> prepare("UPDATE vote_2 SET voix= :voix WHERE nom= :nom AND poste= :poste AND promotion= :promotion AND options= :options");
             $updateStmt-> execute(["voix" => $vote, "nom" => $nom, "poste" => $poste, "promotion" => $promotion, "options" => $options])  or die(print_r($mysqlClient->errorInfo()));
         }
        
         foreach ($cp_bac1_economie as $candidat) {
             if (strtoupper($candidat['nom']) === $candidat1) {
                updateVoteCpb1E2($mysqlClient, $voix[$candidat1], $candidat1, $poste, $promotion, $options);
             } elseif (strtoupper($candidat['nom']) === $candidat2) {
                updateVoteCpb1E2($mysqlClient, $voix[$candidat2], $candidat2, $poste, $promotion, $options);
             } else {
                updateVoteCpb1E2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste, $promotion, $options);
             }
         }
     } else {

         function insertVoteCpb1E2($mysqlClient, $vote, $nom, $poste, $promotion, $options) {
             $insertStmt= $mysqlClient-> prepare("INSERT INTO vote_2(nom, voix, poste, promotion, options) VALUES(:nom, :voix, :poste, :promotion, :options)");
             $insertStmt-> execute(["nom" => $nom, "voix" => $vote, "poste" => $poste, "promotion" => $promotion, "options" => $options])  or die(print_r($mysqlClient->errorInfo()));
         }

         foreach ($cp_bac1_economie as $candidat) {
             if (strtoupper($candidat['nom']) === $candidat1) {
                insertVoteCpb1E2($mysqlClient, $voix[$candidat1], $candidat1, $poste, $promotion, $options);
             } elseif (strtoupper($candidat['nom']) === $candidat2) {
                insertVoteCpb1E2($mysqlClient, $voix[$candidat2], $candidat2, $poste, $promotion, $options);
             } else {
                insertVoteCpb1E2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste, $promotion, $options);
             }
         }
     }
    
 }

 $cp_bac1_economies= $mysqlClient-> prepare("SELECT * FROM vote_2 WHERE poste= 'cp' AND promotion= 'bac1' AND options= 'economie' ORDER BY voix DESC");
 $cp_bac1_economies-> execute();
 $cp_bac1_economies= $cp_bac1_economies-> fetchAll();