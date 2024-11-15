<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/dbconnection.php");
require_once(__DIR__ ."/results.php");
require_once(__DIR__ ."/variables.php");

$candidat1 = 'KILIMA SALEM';
$candidat2 = 'JEHOVAH TEMOIN';

$voix = [];

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

    if ($voix1 == $voix2) {
        $voix[$candidat1]++;
        $voix[$candidat2]--;
    }

    if($vote == 3) {
        //fonctionn pour mettre à jour la table vote2 au cas où elle contient déjà les données
        function updateVote2($mysqlClient, $vote, $nom) {
            $updateStmt= $mysqlClient-> prepare("UPDATE vote_2 SET voix= :voix WHERE nom= :nom");
            $updateStmt-> execute(["voix" => $vote, "nom" => $nom])  or die(print_r($mysqlClient->errorInfo()));
        }
        
        foreach ($presidence as $candidat) {
            if ($candidat['nom'] === $candidat1) {
                updateVote2($mysqlClient, $voix[$candidat1], $candidat1);
            } elseif ($candidat['nom'] === $candidat2) {
                updateVote2($mysqlClient, $voix[$candidat2], $candidat2);
            } else {
                updateVote2($mysqlClient, $candidat['voix'], $candidat['nom']);
            }
        }
    } else {

        function insertVote2($mysqlClient, $vote, $nom) {
            $insertStmt= $mysqlClient-> prepare("INSERT INTO vote_2(nom, voix) VALUES(:nom, :voix)");
            $insertStmt-> execute(["nom" => $nom, "voix" => $vote])  or die(print_r($mysqlClient->errorInfo()));
        }

        foreach ($presidence as $candidat) {
            if ($candidat['nom'] === $candidat1) {
                insertVote2($mysqlClient, $voix[$candidat1], $candidat1);
            } elseif ($candidat['nom'] === $candidat2) {
                insertVote2($mysqlClient, $voix[$candidat2], $candidat2);
            } else {
                insertVote2($mysqlClient, $candidat['voix'], $candidat['nom']);
            }
        }
    }
    
}

$presidences= $mysqlClient-> prepare("SELECT * FROM vote_2 ORDER BY voix DESC");
$presidences-> execute();
$presidences= $presidences-> fetchAll();