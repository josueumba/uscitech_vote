<?php
session_start();

require_once(__DIR__ ."/dbconnection.php");
require_once(__DIR__ ."/fonctions.php");
require_once(__DIR__ ."/variables.php");

$id_etudiant= $_SESSION["logged_student"]["id"];
$promo_etudiant= $_SESSION["logged_student"]["promotion"];
$options_etudiant= $_SESSION["logged_student"]["options"];

$choix_president= strip_tags($_POST["choix_president"]);
$choix_vicepresident= strip_tags($_POST["choix_vicepresident"]);
$choix_cp= strip_tags($_POST["choix_cp"]);
$choix_cpa= strip_tags($_POST["choix_cpa"]);

//Vérification si la personne a déjà voté
$full_name= $_SESSION["logged_student"]["prenom"] . " " . $_SESSION["logged_student"]["nom"];
$hasVotedQuery= "SELECT COUNT(*) FROM vote v JOIN etudiant e ON e.id= v.etudiant WHERE CONCAT(e.prenom, ' ', e.nom)= :etudiant";
$stmtVoted= $mysqlClient->prepare($hasVotedQuery);
$stmtVoted->execute([
    ":etudiant" => $full_name
]) or die(print_r($mysqlClient->errorInfo())); 
$hasVoted = $stmtVoted-> fetch();
$hasVoted= (int)$hasVoted[0];

if(isset($choix_president) && isset($choix_vicepresident) && isset($choix_cp) && isset($choix_cpa)) {

    //Si l'étudiant a déjà voté
    if($hasVoted >= 4) {
        $_SESSION["voted_error_message"]= "Vous avez déjà voté";
        redirectToUrl("votesuccess.php");
        return;
    }

    // Fonction pour récupérer l'identifiant du president et vice president
    function getCandidatePresidenceId($mysqlClient, $titre, $choix) {
        $query = "SELECT c.id FROM candidat c 
                  JOIN etudiant e ON c.etudiant = e.id 
                  JOIN poste p ON p.id = c.poste
                  WHERE p.titre = :titre AND CONCAT(e.nom, ' ', e.prenom) = :choix";
        $stmt = $mysqlClient->prepare($query);
        $stmt->execute(['titre' => $titre, 'choix' => $choix]);
        $result= $stmt->fetch();
        return (int)$result[0];
    }

    // Fonction pour récupérer l'identifiant du cp et cpa
    function getCandidateCpsId($mysqlClient, $titre, $choix, $promotion, $options) {
        $query = "SELECT c.id FROM candidat c 
                JOIN etudiant e ON c.etudiant = e.id 
                JOIN poste p ON p.id = c.poste 
                WHERE p.titre = :titre AND CONCAT(e.nom, ' ', e.prenom) = :choix 
                AND e.promotion= :promotion AND e.options= :options";
        $stmt = $mysqlClient->prepare($query);
        $stmt->execute(['titre' => $titre, 'choix' => $choix, 'promotion' => $promotion, 'options' => $options]);
        $result= $stmt->fetch();
        return (int)$result[0];
    }

    // Récupération de l'identifiant du président
    $id_president = getCandidatePresidenceId($mysqlClient, 'president', $choix_president);
    if ($id_president === false) {
        $_SESSION["erreur_envoi"] = "Le président choisi n'existe pas.";
        redirectToUrl("vote.php");
        return;
    }

    // Récupération de l'identifiant du vice président
    $id_vicepresident = getCandidatePresidenceId($mysqlClient, 'vice president', $choix_vicepresident);
    if ($id_vicepresident === false) {
        $_SESSION["erreur_envoi"] = "Le vice-président choisi n'existe pas.";
        redirectToUrl("vote.php");
        return;
    }

    // Récupération de l'identifiant du cp
    $id_cp = getCandidateCpsId($mysqlClient, 'cp', $choix_cp, $promo_etudiant, $options_etudiant);
    if ($id_cp === false) {
        $_SESSION["erreur_envoi"] = "Le CP choisi n'existe pas.";
        redirectToUrl("vote.php");
        return;
    }

    // Récupération de l'identifiant du cpa
    $id_cpa = getCandidateCpsId($mysqlClient, 'cpa', $choix_cpa, $promo_etudiant, $options_etudiant);
    if ($id_cpa === false) {
        $_SESSION["erreur_envoi"] = "Le CPA choisi n'existe pas.";
        redirectToUrl("vote.php");
        return;
    }


    /* -----------
        Envoi du vote dans la base de données
        ----------
    */
    try {
        // Début de la transaction
        $mysqlClient->beginTransaction();

        // Fonction pour insérer un vote
        function insertVote($mysqlClient, $id_etudiant, $id_candidat) {
            $query = "INSERT INTO vote(etudiant, candidat) VALUES(:id_etudiant, :id_candidat)";
            $stmt = $mysqlClient->prepare($query);
            $stmt->execute([':id_etudiant' => $id_etudiant, ':id_candidat' => $id_candidat]);
        }

        // Envoi des votes dans la base de données
        insertVote($mysqlClient, $id_etudiant, $id_president);
        insertVote($mysqlClient, $id_etudiant, $id_vicepresident);
        insertVote($mysqlClient, $id_etudiant, $id_cp);
        insertVote($mysqlClient, $id_etudiant, $id_cpa);

        // Validation de la transaction
        $mysqlClient->commit();

        $_SESSION["vote_succes"] = "Merci d'avoir voté";
        redirectToUrl("votesuccess.php");
    } catch (Exception $ex) {
        $mysqlClient->rollBack();
        $_SESSION["erreur_envoi"] = "Une erreur est survenue lors de l'envoi de votre vote. Veuillez réessayer.";
        die("Erreur : " . $ex->getMessage());
        // redirectToUrl("vote.php");
    }

}