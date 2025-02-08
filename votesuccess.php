<?php
session_start();

require_once(__DIR__ ."/fonctions.php");

if(!isset($_SESSION["logged_student"])) {
    redirectToUrl('login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style2.css">
    <title>Vote Succes</title>
</head>
<body>
    <?php require_once(__DIR__ . "/header.php") ?>
    
    <section class="section-voted">
        <div class="section-voted1">
            <?php if(isset($_SESSION["voted_error_message"])): ?>
                <p><?php echo $_SESSION["voted_error_message"]; ?></p>
                <img src="images/faux.png" alt="">
            <?php else : ?>
                <p><?php echo $_SESSION["vote_succes"]; ?></p>
                <img src="images/ok.png" alt="">
            <?php endif; ?>
            <a href="home.php">OK</a>
        </div>

        <div class="section-voted2"><img src="images/10.svg" alt=""></div>
    </section>

    <?php require_once(__DIR__ . "/footer.php") ?>


</body>
</html>