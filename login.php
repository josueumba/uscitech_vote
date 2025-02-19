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
    <title>Log In</title>
</head>
<body>
    <?php require_once(__DIR__ . "/header.php") ?>
    
    <section class="main-login">
        <div class="img-login"><img src="images/6.svg" alt="" height="400vh" width="90%"></div>

        <!-- On est redirigé à la page home que quand l'étudiant est connecté -->
        <?php if(!isset($_SESSION['logged_student'])): ?>
            <form action="submit_login.php" method="post">
                <h1>LOGIN</h1>

                <!-- Affichage du message d'errreur -->
                <?php if(isset($_SESSION['login_error_message'])): ?>
                    <div id="alert-error"><?php echo $_SESSION['login_error_message']; unset($_SESSION['login_error_message']); ?></div>
                <?php endif; ?>

                <div class="login-form">
                    <div>
                        <label for="identifiant">Identifiant</label>
                        <input type="email" name="email" id="" placeholder="prenom.nom@uscitech.ac.cd" required>
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="" placeholder="Garde bien ton mot de passe, c'est privé" required>
                    </div>

                    <button type="submit">Login</button>
                </div>
            </form>
        <?php else: ?>
            <?php redirectToUrl('home.php'); ?>
        <?php endif; ?>
    </section>

    <?php require_once(__DIR__ . "/footer.php") ?>
</body>
</html>