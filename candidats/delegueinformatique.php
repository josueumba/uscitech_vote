<?php
 if (session_status() == PHP_SESSION_NONE) {
     session_start();
 }

 require_once(__DIR__ . "/../dbconnection.php");
require_once(__DIR__ . "/../results.php");
 require_once(__DIR__ ."/../variables.php");

 $candidat1 = 'MBONGI JOEL';
 $candidat2 = 'MATETU CHRISTIAN';

 $voix = [];
 $poste= 'DELEGUE';
 $options= 'SCIENCES INFORMATIQUES';
 $vote= voteD($mysqlClient, $poste, $options);

 foreach($delegue_informatique as $candidat) {
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

    //  if ($voix1 == $voix2) {
    //      $voix[$candidat1]++;
    //      $voix[$candidat2]--;
    //  }

     if($vote == 3) {
         //fonctionn pour mettre à jour la table vote2 au cas où elle contient déjà les données
         function updateVoteDI2($mysqlClient, $vote, $nom, $poste, $options) {
             $updateStmt= $mysqlClient-> prepare("UPDATE vote_2 SET voix= :voix WHERE nom= :nom AND poste= :poste AND options= :options");
             $updateStmt-> execute(["voix" => $vote, "nom" => $nom, "poste" => $poste, "options" => $options])  or die(print_r($mysqlClient->errorInfo()));
         }
        
         foreach ($delegue_informatique as $candidat) {
             if (strtoupper($candidat['nom']) === $candidat1) {
                updateVoteDI2($mysqlClient, $voix[$candidat1], $candidat1, $poste, $options);
             } elseif (strtoupper($candidat['nom']) === $candidat2) {
                updateVoteDI2($mysqlClient, $voix[$candidat2], $candidat2, $poste, $options);
             } else {
                updateVoteDI2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste, $options);
             }
         }
     } else {

         function insertVoteDI2($mysqlClient, $vote, $nom, $poste, $options) {
             $insertStmt= $mysqlClient-> prepare("INSERT INTO vote_2(nom, voix, poste, options) VALUES(:nom, :voix, :poste, :options)");
             $insertStmt-> execute(["nom" => $nom, "voix" => $vote, "poste" => $poste, "options" => $options])  or die(print_r($mysqlClient->errorInfo()));
         }

         foreach ($delegue_informatique as $candidat) {
             if (strtoupper($candidat['nom']) === $candidat1) {
                insertVoteDI2($mysqlClient, $voix[$candidat1], $candidat1, $poste, $options);
             } elseif (strtoupper($candidat['nom']) === $candidat2) {
                insertVoteDI2($mysqlClient, $voix[$candidat2], $candidat2, $poste, $options);
             } else {
                insertVoteDI2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste, $options);
             }
         }
     }
    
 }

 $delegue_informatiques= $mysqlClient-> prepare("SELECT * FROM vote_2 WHERE poste= 'delegue' AND options= 'sciences informatiques' ORDER BY voix DESC");
 $delegue_informatiques-> execute();
 $delegue_informatiques= $delegue_informatiques-> fetchAll();