<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$promotion= $_SESSION["logged_student"]["promotion"];
$options= $_SESSION["logged_student"]["options"];
$path= strtolower($promotion.$options);
$path= str_replace(' ', '', $path);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style2.css">
    <title>Vote</title>
</head>
<body>
    <?php require_once(__DIR__ . "/header.php") ?>
    
    <form action="submit_vote.php" method="post">
        <?php if(isset($_SESSION["erreur_envoi"])): ?>
            <p class="error-message"><?php echo $_SESSION["erreur_envoi"]; unset($_SESSION["erreur_envoi"]) ?></p>
        <?php endif; ?>
        <div class="form-vote">
            <h1>PRESIDENT</h1>
            <?php require_once(__DIR__ . "/president_form.php") ?>

            <h1>VICE - PRESIDENT</h1>
            <?php require_once(__DIR__ . "/vicepresident_form.php") ?>

            <h1>CP</h1>
            <?php require_once(__DIR__ . "/cps/cp" . $path . "_form.php") ?>

            <h1>CPA</h1>
            <?php require_once(__DIR__ . "/cps/cpa" . $path . "_form.php") ?>

            <button type="submit">VOTER</button>

        </div>
    </form>    

    <?php require_once(__DIR__ . "/footer.php") ?>
</body>
</html>