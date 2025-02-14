<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/../dbconnection.php");
require_once(__DIR__ . "/../results.php");
require_once(__DIR__ ."/../variables.php");

$candidat1 = 'MUBIBYA CLEMY';
$candidat2 = 'KAMUANYA CORNELLY';

$voix = [];
$poste= 'DELEGUE';
$options= 'ECONOMIE';
$vote= voteD($mysqlClient, $poste, $options);

foreach($delegue_economie as $candidat) {
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
         function updateVoteDE2($mysqlClient, $vote, $nom, $poste, $options) {
             $updateStmt= $mysqlClient-> prepare("UPDATE vote_2 SET voix= :voix WHERE nom= :nom AND poste= :poste AND options= :options");
             $updateStmt-> execute(["voix" => $vote, "nom" => $nom, "poste" => $poste, "options" => $options])  or die(print_r($mysqlClient->errorInfo()));
         }
        
         foreach ($delegue_economie as $candidat) {
             if (strtoupper($candidat['nom']) === $candidat1) {
                updateVoteDE2($mysqlClient, $voix[$candidat1], $candidat1, $poste, $options);
             } elseif (strtoupper($candidat['nom']) === $candidat2) {
                updateVoteDE2($mysqlClient, $voix[$candidat2], $candidat2, $poste, $options);
             } else {
                updateVoteDE2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste, $options);
             }
         }
     } else {

         function insertVoteDE2($mysqlClient, $vote, $nom, $poste, $options) {
             $insertStmt= $mysqlClient-> prepare("INSERT INTO vote_2(nom, voix, poste, options) VALUES(:nom, :voix, :poste, :options)");
             $insertStmt-> execute(["nom" => $nom, "voix" => $vote, "poste" => $poste, "options" => $options])  or die(print_r($mysqlClient->errorInfo()));
         }

         foreach ($delegue_economie as $candidat) {
             if (strtoupper($candidat['nom']) === $candidat1) {
                insertVoteDE2($mysqlClient, $voix[$candidat1], $candidat1, $poste, $options);
             } elseif (strtoupper($candidat['nom']) === $candidat2) {
                insertVoteDE2($mysqlClient, $voix[$candidat2], $candidat2, $poste, $options);
             } else {
                insertVoteDE2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste, $options);
             }
         }
     }
    
 }

 $delegue_economies= $mysqlClient-> prepare("SELECT * FROM vote_2 WHERE poste= 'delegue' AND options= 'economie' ORDER BY voix DESC");
 $delegue_economies-> execute();
 $delegue_economies= $delegue_economies-> fetchAll();