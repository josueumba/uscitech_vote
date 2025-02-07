<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/../fonctions.php");

$cps= getCandidatesCps($mysqlClient, 'CP', 'BAC2', 'ECONOMIE');
?>

<div class="flex-container">
    <?php foreach($cps as $candidate) : ?>
        <div class="flex-item">
            <label for="<?= $candidate["nom"] . "_" . $candidate["prenom"] . "_CP"; ?>">
                    <img src="images/<?= strtolower($candidate["nom"] . "_" . $candidate["prenom"]) . ".jpg"; ?>" alt="photo candidat cp">
                    <?= $candidate["nom"] . " " . $candidate["prenom"]; ?>
            </label>

            <input type="radio" name="choix_cp" id="<?= $candidate["nom"] . "_" . $candidate["prenom"] . "_CP"; ?>" value="<?= $candidate["nom"] . " " . $candidate["prenom"]; ?>" required>
        </div>
    <?php endforeach; ?>

    <div class="flex-item">
        <label for="blanc_vote_cp">
                <img src="images/faux.png" alt="photo candidat cp">
                VOTE BLANC
        </label>

        <input type="radio" name="choix_cp" id="blanc_vote_cp" value="BLANC VOTE">
    </div>
        
</div>