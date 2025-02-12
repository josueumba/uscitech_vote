<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/../treat_delegue.php");
require_once(__DIR__ ."/../results.php");

$candidat1 = '';
$candidat2 = '';

processVotesForDelegue($mysqlClient, $delegue_ingenierie, 'DELEGUE', $candidat1, $candidat2, 'INGENIERIE');

$delegue_ingenieries = retrieveVoteD2($mysqlClient, 'DELEGUE', 'INGENIERIE');
