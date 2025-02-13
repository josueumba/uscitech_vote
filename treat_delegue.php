<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/dbconnection.php");
require_once(__DIR__ . "/results.php");
require_once(__DIR__ . "/variables.php");

// Fonction générique pour traiter les votes pour chaque poste
function processVotesForDelegue($mysqlClient, $poste, $poste2, $candidat1, $candidat2, $options) {
    $voix = [];
    $vote= voteD($mysqlClient, $poste2, $options);

    // Recherche des voix des candidats spécifiés
    foreach ($poste as $candidat) {
        if ($candidat['nom'] === $candidat1) {
            $voix[$candidat1] = $candidat['voix'];
        } elseif ($candidat['nom'] === $candidat2) {
            $voix[$candidat2] = $candidat['voix'];
        }
    }

    if (count($voix) == 2) {
        $voix1 = $voix[$candidat1];
        $voix2 = $voix[$candidat2];

        // Tri des voix pour que le candidat avec le plus de voix vienne en premier
        if ($voix1 < $voix2) {
            $temp = $voix[$candidat1];
            $voix[$candidat1] = $voix[$candidat2];
            $voix[$candidat2] = $temp;
        }

        // Cas où les voix sont égales, on ajuste pour que l'un gagne
        if ($voix1 == $voix2 && ($voix1 && $voix2 !== 0)) {
            $voix[$candidat1]++;
            $voix[$candidat2]--;
        }

        // Met à jour ou insère les voix en fonction de l'existence des données
        if ($vote == 3) {
            // Fonction pour mettre à jour la table vote_2
            function updateVoteD2($mysqlClient, $vote, $nom, $poste, $options) {
                $updateStmt = $mysqlClient->prepare("UPDATE vote_2 SET voix = :voix WHERE nom = :nom AND :poste = :poste AND options= :options");
                $updateStmt->execute(["voix" => $vote, "nom" => $nom, "poste" => $poste, "options" => $options]) or die(print_r($mysqlClient->errorInfo()));
            }

            foreach ($poste as $candidat) {
                if ($candidat['nom'] === $candidat1) {
                    updateVoteD2($mysqlClient, $voix[$candidat1], $candidat1, $poste2, $options);
                } elseif ($candidat['nom'] === $candidat2) {
                    updateVoteD2($mysqlClient, $voix[$candidat2], $candidat2, $poste2, $options);
                } else {
                    updateVoteD2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste2, $options);
                }
            }
        } else {
            // Fonction pour insérer un nouveau vote dans la table vote_2
            function insertVoteD2($mysqlClient, $vote, $nom, $poste, $options) {
                $insertStmt = $mysqlClient->prepare("INSERT INTO vote_2(nom, voix, poste, options) VALUES(:nom, :voix, :poste, :options)");
                $insertStmt->execute(["nom" => $nom, "voix" => $vote, "poste" => $poste, "options" => $options]) or die(print_r($mysqlClient->errorInfo()));
            }

            foreach ($poste as $candidat) {
                if ($candidat['nom'] === $candidat1) {
                    insertVoteD2($mysqlClient, $voix[$candidat1], $candidat1, $poste2, $options);
                } elseif ($candidat['nom'] === $candidat2) {
                    insertVoteD2($mysqlClient, $voix[$candidat2], $candidat2, $poste2, $options);
                } else {
                    insertVoteD2($mysqlClient, $candidat['voix'], $candidat['nom'], $poste2, $options);
                }
            }
        }
    }
}

// Récupérer les résultats mis à jour
function retrieveVoteD2($mysqlClient, $poste, $options) {
    $vote = $mysqlClient->prepare("SELECT * FROM vote_2 WHERE poste = :poste AND options = :options ORDER BY voix DESC");
    $vote->execute(["poste" => $poste, "options" => $options]);
    $vote = $vote->fetchAll();
    return $vote;
}

