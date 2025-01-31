<?php
session_start();
require_once(__DIR__ ."/dbconnection.php");
require_once(__DIR__ ."/variables.php");
require_once(__DIR__ ."/fonctions.php");


$postData= $_POST;
$nom= strip_tags($postData["nom"]);
$prenom= strip_tags($postData["prenom"]);
$email= strip_tags($postData["email"]);
$promotion= strip_tags($postData["promotion"]);
$options= strip_tags($postData["options"]);
$poste= strip_tags($postData["poste"]);

if(isset($nom, $prenom, $email, $promotion, $options, $poste)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['login_error_message'] = 'Il faut un email valide pour soumettre le formulaire.';
        redirectToUrl('candidate.php');
        return;
    } else {
        //Retrieve the candidate student's id
        $query= "SELECT e.id FROM etudiant e 
                WHERE nom= :nom AND prenom= :prenom AND email= :email AND promotion= :promotion AND options= :options";
        $stmt= $mysqlClient->prepare($query);
        $stmt->execute([
            'nom'=> $nom,
            'prenom'=> $prenom,
            'email'=> $email,
            'promotion'=> $promotion,
            'options'=> $options
        ]);
        $idEtudiantPostule= $stmt->fetch();
        $idEtudiantPostule= $idEtudiantPostule['id'];

        //Retrieve the poste's id
        $query= "SELECT p.id FROM poste p
                WHERE titre= :poste";
        $stmt= $mysqlClient->prepare($query);
        $stmt->execute(['poste'=> $poste]);
        $idPoste= $stmt->fetch();
        $idPoste= $idPoste['id'];
    }
}

if(!isset($idEtudiantPostule, $idPoste)) {
    $_SESSION['login_error_message'] = "L'étudiant est introuvable dans la base de données";
    redirectToUrl('candidate.php');
    return;
} else {
    //Register student as a candidate
    $query= "INSERT INTO candidat(etudiant, poste) VALUES(:etudiant, :poste)";
    $stmt= $mysqlClient->prepare($query);
    $stmt->execute(['etudiant' => $idEtudiantPostule, 'poste' => $idPoste]);
    redirectToUrl('home.php');
    return;
}