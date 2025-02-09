<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/fonctions.php");

if(isset($_SESSION["logged_student"])) {
    redirectToUrl('home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Accueil</title>
</head>
<body>
    <?php require_once(__DIR__ ."/header.php"); ?>

    <main class="d-flex main-index-home">
        <div class="main-div1">
            <h1>ONLINE VOTING SYSTEM</h1>
            <P style="padding:0 30px; font-size:1.2em">Online voting systems are software platforms used to securely conduct votes and elections. As a digital platform, they eliminate the need to cast your votes using paper or having to gather in person</P>
            <a href="login.php">LOGIN</a>
        </div>
        
        <div><img src="images/2.svg" alt=""></div>
    </main>

    <?php require_once(__DIR__ ."/footer.php"); ?>
    
</body>
</html>