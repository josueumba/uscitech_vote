<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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

            <?php if($_SESSION['logged_student']['promotion'] == "GOLD") : ?>
                <a href="candidate.php">CANDIDATE</a>
            <?php else : ?>
                <a href="vote.php">VOTE NOW</a>
            <?php endif; ?>
        </div>
        
        <div>
            <img src="images/11.svg" alt="">
        </div>
    </main>

    <?php require_once(__DIR__ ."/footer.php"); ?>
    
</body>
</html>