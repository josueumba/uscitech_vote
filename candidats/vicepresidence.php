<?php
 if (session_status() == PHP_SESSION_NONE) {
     session_start();
 }

 require_once(__DIR__ . "/../dbconnection.php");
require_once(__DIR__ . "/../results.php");
 require_once(__DIR__ ."/../variables.php");

 $candidat1 = 'MAFUTA QUEEN';
 $candidat2 = 'KINZO JAPHET';

 $voix = [];
 $poste= 'VICE PRESIDENT';
 $vote= vote($mysqlClient, $poste);

 foreach($vice_presidence as $candidat) {
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
         function updateVoteVp2($mysqlClient, $vote, $nom, $poste) {
             $updateStmt= $mysqlClient-> prepare("UPDATE vote_2 SET voix= :voix WHERE nom= :nom AND poste= :poste");
             $updateStmt-> execute(["voix" => $vote, "nom" => $nom, "poste" => $poste])  or die(print_r($mysqlClient->errorInfo()));
         }
        
         foreach ($vice_presidence as $candidat) {
             if (strtoupper($candidat['nom']) === $candidat1) {
                 updateVoteVp2($mysqlClient, $voix[$candidat1], $candidat1, $poste);
             } elseif (strtoupper($candidat['nom']) === $candidat2) {
                updateVoteVp2($mysqlClient, $voix[$candidat2], $candidat2, $poste);
             } else {
                updateVoteVp2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste);
             }
         }
     } else {

         function insertVoteVp2($mysqlClient, $vote, $nom, $poste) {
             $insertStmt= $mysqlClient-> prepare("INSERT INTO vote_2(nom, voix, poste) VALUES(:nom, :voix, :poste)");
             $insertStmt-> execute(["nom" => $nom, "voix" => $vote, "poste" => $poste])  or die(print_r($mysqlClient->errorInfo()));
         }

         foreach ($vice_presidence as $candidat) {
             if (strtoupper($candidat['nom']) === $candidat1) {
                insertVoteVp2($mysqlClient, $voix[$candidat1], $candidat1, $poste);
             } elseif (strtoupper($candidat['nom']) === $candidat2) {
                insertVoteVp2($mysqlClient, $voix[$candidat2], $candidat2, $poste);
             } else {
                insertVoteVp2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste);
             }
         }
     }
    
 }

 $vice_presidences= $mysqlClient-> prepare("SELECT * FROM vote_2 WHERE poste= 'vice president' ORDER BY voix DESC");
 $vice_presidences-> execute();
 $vice_presidences= $vice_presidences-> fetchAll();