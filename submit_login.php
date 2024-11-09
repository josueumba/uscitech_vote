<?php
session_start();
require_once(__DIR__ ."/config/mysql.php");
require_once(__DIR__ ."/dbconnection.php");
require_once(__DIR__ ."/variables.php");
require_once(__DIR__ ."/fonctions.php");

$postData= $_POST;
$email= strip_tags($postData["email"]);
$password= strip_tags($postData["password"]);

if(isset($email) && isset($password)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['login_error_message'] = 'Il faut un email valide pour soumettre le formulaire.';
    } else {
        foreach($students as $student) {
            if(
                isset($student['password']) &&
                isset($student['email']) &&
                $student['password'] == $password &&
                $student['email'] == $email
            ) {
                $_SESSION['logged_student'] = [
                    'email' => $student['email'],
                    'nom' => $student['nom'],
                    'prenom' => $student['prenom'],
                    'id' => $student['id'],
                    'promotion' => $student['promotion'],
                    'options' => $student['options']
                ];
            }
        }

        if(!isset($_SESSION['logged_student'])) {
            $_SESSION['login_error_message'] = 'Les informations envoyées ne permettent pas de vous identifier';
        }
    }

    redirectToUrl('login.php');
}