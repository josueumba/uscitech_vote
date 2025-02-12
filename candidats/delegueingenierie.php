<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/../treat_candidat.php");
require_once(__DIR__ ."/../results.php");

$candidat1 = '';
$candidat2 = '';

processVotesForPost($mysqlClient, $delegue_ingenierie, 'DELEGUE', $candidat1, $candidat2);

$delegue_ingenieries = retrieveVote2('DELEGUE');
