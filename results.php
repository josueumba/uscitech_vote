<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/fonctions.php");

//Récupération des votes des candidats président et vice président
$presidence= getPresidenceVote($mysqlClient, 'president');
$vice_presidence= getPresidenceVote($mysqlClient, 'vice president');

//Récupération des votes des delegues
$delegue_economie= getDeleguesVoteE($mysqlClient, 'DELEGUE', 'economie');
$delegue_ingenierie= getDeleguesVoteI($mysqlClient, 'DELEGUE', 'ingenierie', 'GENIE ELECTRIQUE');
//$delegue_education= getDeleguesVoteE($mysqlClient, 'DELEGUE', 'science education');
$delegue_informatique= getDeleguesVoteSI($mysqlClient, 'DELEGUE', 'sciences informatiques', 'GENIE LOGICIEL', 'RESEAU TELECOMMUNICATION');

//Récupération des votes des delegues adjoints
$delegue_adjoint_economie= getDeleguesVoteE($mysqlClient, 'DELEGUE ADJOINT', 'economie');
$delegue_adjoint_ingenierie= getDeleguesVoteI($mysqlClient, 'DELEGUE ADJOINT', 'ingenierie', 'GENIE ELECTRIQUE');
//$delegue_adjoint_education= getDeleguesVoteE($mysqlClient, 'DELEGUE ADJOINT', 'science education');
$delegue_adjoint_informatique= getDeleguesVoteSI($mysqlClient, 'DELEGUE ADJOINT', 'sciences informatiques', 'GENIE LOGICIEL', 'RESEAU TELECOMMUNICATION');

//Récupération des votes des cp et cpa bac1
$cp_bac1_economie= getCpsVote($mysqlClient, 'cp', 'bac1', 'economie');
$cp_bac1_ingenierie= getCpsVote($mysqlClient, 'cp', 'bac1', 'ingenierie');
$cp_bac1_education= getCpsVote($mysqlClient, 'cp', 'bac1', 'science education');
$cp_bac1_informatique= getCpsVote($mysqlClient, 'cp', 'bac1', 'sciences informatiques');

$cpa_bac1_economie= getCpsVote($mysqlClient, 'cpa', 'bac1', 'economie');
$cpa_bac1_ingenierie= getCpsVote($mysqlClient, 'cpa', 'bac1', 'ingenierie');
$cpa_bac1_education= getCpsVote($mysqlClient, 'cpa', 'bac1', 'science education');
$cpa_bac1_informatique= getCpsVote($mysqlClient, 'cpa', 'bac1', 'sciences informatiques');


//Récupération des votes des cp et cpa bac2
$cp_bac2_economie= getCpsVote($mysqlClient, 'cp', 'bac2', 'economie');
$cp_bac2_informatique= getCpsVote($mysqlClient, 'cp', 'bac2', 'sciences informatiques');

$cpa_bac2_economie= getCpsVote($mysqlClient, 'cpa', 'bac2', 'economie');
$cpa_bac2_informatique= getCpsVote($mysqlClient, 'cpa', 'bac2', 'sciences informatiques');


//Récupération des votes des cp et cpa bac3
$cp_bac3_genielogiciel= getCpsVote($mysqlClient, 'cp', 'bac3', 'genie logiciel');
$cp_bac3_reseau= getCpsVote($mysqlClient, 'cp', 'bac3', 'reseau telecommunication');
$cp_bac3_genieelectrique= getCpsVote($mysqlClient, 'cp', 'bac3', 'genie electrique');

$cpa_bac3_genielogiciel= getCpsVote($mysqlClient, 'cpa', 'bac3', 'genie logiciel');
$cpa_bac3_reseau= getCpsVote($mysqlClient, 'cpa', 'bac3', 'reseau telecommunication');
$cpa_bac3_genieelectrique= getCpsVote($mysqlClient, 'cpa', 'bac3', 'genie electrique');

