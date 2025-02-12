<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/../treat_candidat.php");
require_once(__DIR__ ."/../results.php");

$candidat1 = '';
$candidat2 = '';

processVotesForPost($mysqlClient, $presidence, 'PRESIDENT', $candidat1, $candidat2);

$presidences = retrieveVote2('PRESIDENT');
