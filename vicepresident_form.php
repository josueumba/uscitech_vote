<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/fonctions.php");

$vice_presidents= getCandidates($mysqlClient, 'VICE PRESIDENT');
?>

<div class="flex-container">
    <?php foreach($vice_presidents as $candidate) : ?>
        <div class="flex-item">
            <label for="<?= $candidate["nom"] . "_" . $candidate["prenom"] . "_VP"; ?>">
                    <img src="images/<?= $candidate["nom"] . "_" . $candidate["prenom"]; ?>" alt="photo candidat vice-président">
                    <?= $candidate["nom"] . " " . $candidate["prenom"]; ?>
            </label>

            <input type="radio" name="choix_vicepresident" id="<?= $candidate["nom"] . "_" . $candidate["prenom"] . "_VP"; ?>" value="<?= $candidate["nom"] . " " . $candidate["prenom"]; ?>" required>
        </div>
    <?php endforeach; ?>

    <div class="flex-item">
        <label for="BLANC_VOTE_VP">
                <img src="images/faux.png" alt="photo candidat vice-président">
                VOTE BLANC
        </label>

        <input type="radio" name="choix_vicepresident" id="BLANC_VOTE_VP" value="BLANC VOTE">
    </div>
    
        
</div>