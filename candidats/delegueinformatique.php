<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/../treat_delegue.php");
require_once(__DIR__ ."/../results.php");

$candidat1 = '';
$candidat2 = '';

processVotesForDelegue($mysqlClient, $delegue_informatique, 'DELEGUE', $candidat1, $candidat2, 'SCIENCES INFORMATIQUES');

$delegue_informatiques = retrieveVoteD2($mysqlClient, 'DELEGUE', 'SCIENCES INFORMATIQUES');
