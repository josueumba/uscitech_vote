<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/fonctions.php");

if($_SESSION["logged_student"]["promotion"] == 'BAC1' || 
    $_SESSION["logged_student"]["promotion"] == 'BAC2'
) {
    redirectToUrl('home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Candidate</title>
</head>
<body>
    <?php require_once(__DIR__ . "/header.php") ?>

    <section class="main-login-c">
        <div class="img-login"><img src="images/6.svg" alt="" height="400vh" width="90%"></div>

        <form action="submit_candidate.php" method="post">
            <h1>POSTULER</h1>

            <!-- Affichage du message d'errreur -->
            <?php if(isset($_SESSION['login_error_message'])): ?>
                    <div id="alert-error"><?php echo $_SESSION['login_error_message']; unset($_SESSION['login_error_message']); ?></div>
            <?php endif; ?>

            <div class="login-form">
                <div>
                    <label for="nom">NOM</label>
                    <input type="text" name="nom" id="nom" required>
                </div>

                <div>
                    <label for="prenom">PRENOM</label>
                    <input type="text" name="prenom" id="prenom" required>
                </div>

                <div>
                    <label for="email">EMAIL</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div>
                    <label for="promotion">PROMOTION</label>
                    <select name="promotion" id="promotion" required>
                        <option value="">CHOISIR LA PROMOTION</option>
                        <option value="BAC1">BAC1</option>
                        <option value="BAC2">BAC2</option>
                        <option value="BAC3">BAC3</option>
                    </select>
                </div>

                <div>
                    <label for="options">OPTION</label>
                    <select name="options" id="options" required>
                        <option value="">CHOISIR L'OPTION</option>
                        <option value="GENIE LOGICIEL">GENIE LOGICIEL</option>
                        <option value="RESEAU TELECOMMUNICATION">RESEAU TELECOMMUNICATION</option>
                        <option value="GENIE ELECTRIQUE">GENIE ELECTRIQUE</option>
                        <option value="SCIENCES INFORMATIQUES">SCIENCES INFORMATIQUES</option>
                        <option value="ECONOMIE">ECONOMIE</option>
                        <option value="INGENIERIE">INGENIERIE</option>
                        <option value="SCIENCE EDUCATION">SCIENCE EDUCATION</option>
                    </select>
                </div>

                <div>
                    <label for="poste">POSTE</label>
                    <select name="poste" id="poste" required>
                        <option value="">CHOISIR LE POSTE</option>
                        <option value="PRESIDENT">PRESIDENT</option>
                        <option value="VICE PRESIDENT">VICE PRESIDENT</option>
                        <option value="CP">CP</option>
                        <option value="CPA">CPA</option>
                        <option value="DELEGUE">DELEGUE</option>
                        <option value="DELEGUE ADJOINT">DELEGUE ADJOINT</option>
                    </select>
                </div>

                <!-- <div>
                    <label for="photo">Choisissez une photo :</label>
                    <input type="file" name="photo" id="photo">
                </div> -->

                <button type="submit">POSTULER</button>
            </div>

        </form>

    </section>
    

    <?php require_once(__DIR__ . "/footer.php") ?>
</body>