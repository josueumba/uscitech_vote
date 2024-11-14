<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/results.php");

$candidat1 = 'KILIMA SALEM';
$candidat2 = 'JEHOVAH TEMOIN';

$voix = [];
$candidatData = [];

foreach ($presidence as $candidat) {
    // Vérifiez si le nom correspond à l'un des candidats
    if ($candidat['nom'] === $candidat1) {
        $voix[$candidat1] = $candidat['voix'];
        $candidatData[$candidat1] = $candidat;
    } elseif ($candidat['nom'] === $candidat2) {
        $voix[$candidat2] = $candidat['voix'];
        $candidatData[$candidat2] = $candidat;
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

    $resultats = [];
    foreach ($presidence as $candidat) {
        if ($candidat['nom'] === $candidat1) {
            $resultats[] = [
                'nom' => $candidat['nom'],
                'voix' => $voix[$candidat1]
            ];
        } elseif ($candidat['nom'] === $candidat2) {
            $resultats[] = [
                'nom' => $candidat['nom'],
                'voix' => $voix[$candidat2]
            ];
        } else {
            $resultats[] = [
                'nom' => $candidat['nom'],
                'voix' => $candidat['voix']
            ];
        }
    }
}