<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/../fonctions.php");

$cpas= getCandidatesCps($mysqlClient, 'CPA', 'BAC3', 'GENIE ELECTRIQUE');
?>

<div class="flex-container">
    <?php foreach($cpas as $candidate) : ?>
        <div class="flex-item">
            <label for="<?= $candidate["nom"] . "_" . $candidate["prenom"] . "_CPA"; ?>">
                    <img src="images/<?= strtolower($candidate["nom"] . "_" . $candidate["prenom"]) . ".jpg"; ?>" alt="photo candidat cpa">
                    <?= strtoupper($candidate["nom"] . " " . $candidate["prenom"]); ?>
            </label>

            <input type="radio" name="choix_cpa" id="<?= $candidate["nom"] . "_" . $candidate["prenom"] . "_CPA"; ?>" value="<?= $candidate["nom"] . " " . $candidate["prenom"]; ?>" required>
        </div>
    <?php endforeach; ?>

    <div class="flex-item">
        <label for="blanc_vote_cpa">
                <img src="images/faux.png" alt="photo candidat cpa">
                VOTE BLANC
        </label>

        <input type="radio" name="choix_cpa" id="blanc_vote_cpa" value="BLANC VOTE" required>
    </div>
        
</div>