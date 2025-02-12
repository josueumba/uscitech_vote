<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/../treat_delegue.php");
require_once(__DIR__ ."/../results.php");

$candidat1 = 'KINZO JAPHET';
$candidat2 = 'MAFUTA QUEEN';

processVotesForDelegue($mysqlClient, $delegue_economie, 'DELEGUE', $candidat1, $candidat2, 'ECONOMIE');

$delegue_economies = retrieveVoteD2($mysqlClient, 'DELEGUE', 'ECONOMIE');
