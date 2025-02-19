<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/fonctions.php");

$presidents= getCandidates($mysqlClient, 'PRESIDENT');
?>

<div class="flex-container">
    <?php foreach($presidents as $candidate) : ?>
        <div class="flex-item">
            <label for="<?= $candidate["nom"] . "_" . $candidate["prenom"] . "_P"; ?>">
                    <img src="images/<?= strtolower($candidate["nom"] . "_" . $candidate["prenom"]) . ".jpg"; ?>" alt="photo candidat président">
                    <?= strtoupper($candidate["nom"] . " " . $candidate["prenom"]); ?>
            </label>

            <input type="radio" name="choix_president" id="<?= $candidate["nom"] . "_" . $candidate["prenom"] . "_P"; ?>" value="<?= $candidate["nom"] . " " . $candidate["prenom"]; ?>" required>
        </div>
    <?php endforeach; ?>

    <div class="flex-item">
        <label for="BLANC_VOTE_P">
                <img src="images/faux.png" alt="photo candidat président">
                VOTE BLANC
        </label>

        <input type="radio" name="choix_president" id="BLANC_VOTE_P" value="BLANC VOTE" required>
    </div>
        
</div>