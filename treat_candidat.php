<?php

// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

// require_once(__DIR__ . "/dbconnection.php");
// require_once(__DIR__ . "/results.php");
// require_once(__DIR__ . "/variables.php");

// // Fonction générique pour traiter les votes pour chaque poste
// function processVotesForPresidence($mysqlClient, $poste, $poste2, $candidat1, $candidat2) {
//     $voix = [];
//     $vote= vote($mysqlClient, $poste2);

//     // Recherche des voix des candidats spécifiés
//     foreach ($poste as $candidat) {
//         if ($candidat['nom'] === $candidat1) {
//             $voix[$candidat1] = $candidat['voix'];
//         } elseif ($candidat['nom'] === $candidat2) {
//             $voix[$candidat2] = $candidat['voix'];
//         }
//     }

//     if (count($voix) == 2) {
//         $voix1 = $voix[$candidat1];
//         $voix2 = $voix[$candidat2];

//         // Tri des voix pour que le candidat avec le plus de voix vienne en premier
//         if ($voix1 < $voix2) {
//             $temp = $voix[$candidat1];
//             $voix[$candidat1] = $voix[$candidat2];
//             $voix[$candidat2] = $temp;
//         }

//         // Cas où les voix sont égales, on ajuste pour que l'un gagne
//         if ($voix1 == $voix2 && ($voix1 && $voix2 !== 0)) {
//             $voix[$candidat1]++;
//             $voix[$candidat2]--;
//         }

//         // Met à jour ou insère les voix en fonction de l'existence des données
//         if ($vote == 3) {
//             // Fonction pour mettre à jour la table vote_2
//             function updateVoteP2($mysqlClient, $vote, $nom, $poste) {
//                 $updateStmt = $mysqlClient->prepare("UPDATE vote_2 SET voix = :voix WHERE nom = :nom AND poste = :poste");
//                 if (!$updateStmt->execute(["voix" => $vote, "nom" => $nom, "poste" => $poste])) {
//                     echo "Erreur lors de la mise à jour des votes : " . implode(" ", $updateStmt->errorInfo());
//                 }
//             }

//             foreach ($poste as $candidat) {
//                 if ($candidat['nom'] === $candidat1) {
//                     updateVoteP2($mysqlClient, $voix[$candidat1], $candidat1, $poste2);
//                 } elseif ($candidat['nom'] === $candidat2) {
//                     updateVoteP2($mysqlClient, $voix[$candidat2], $candidat2, $poste2);
//                 } else {
//                     updateVoteP2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste2);
//                 }
//             }
//         } else {
//             // Fonction pour insérer un nouveau vote dans la table vote_2
//             function insertVoteP2($mysqlClient, $vote, $nom, $poste) {
//                 $insertStmt = $mysqlClient->prepare("INSERT INTO vote_2(nom, voix, poste) VALUES(:nom, :voix, :poste)");
//                 $insertStmt->execute(["nom" => $nom, "voix" => $vote, "poste" => $poste]) or die(print_r($mysqlClient->errorInfo()));
//             }

//             foreach ($poste as $candidat) {
//                 if ($candidat['nom'] === $candidat1) {
//                     insertVoteP2($mysqlClient, $voix[$candidat1], $candidat1, $poste2);
//                 } elseif ($candidat['nom'] === $candidat2) {
//                     insertVoteP2($mysqlClient, $voix[$candidat2], $candidat2, $poste2);
//                 } else {
//                     insertVoteP2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste2);
//                 }
//             }
//         }
//     }
// }

// // Récupérer les résultats mis à jour
// function retrieveVote2($mysqlClient, $poste) {
//     $vote = $mysqlClient->prepare("SELECT * FROM vote_2 WHERE poste = :poste ORDER BY voix DESC");
//     $vote->execute(["poste" => $poste]);
//     $vote = $vote->fetchAll();
//     return $vote;
// }

