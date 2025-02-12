<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/../treat_cps.php");
require_once(__DIR__ ."/../results.php");
require_once(__DIR__ ."/../variables.php");

$candidat1 = 'BABADI KENDRA';
$candidat2 = 'KALOMBO DAVID';

processVotesForCp($mysqlClient, $cp_bac1_economie, 'DELEGUE', $candidat1, $candidat2, 'ECONOMIE', 'BAC1');

$cp_bac1_economies = retrieveVoteCP2($mysqlClient, 'DELEGUE', 'ECONOMIE', 'BAC1');
