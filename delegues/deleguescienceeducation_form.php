<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/../fonctions.php");

//$delegues= getCandidatesDeleguesSEE($mysqlClient, 'DELEGUE', 'SCIENCE EDUCATION');
?>

<div class="flex-container">
    <?php foreach($delegues as $candidate) : ?>
        <div class="flex-item">
            <label for="<?= $candidate["nom"] . "_" . $candidate["prenom"] . "_D"; ?>">
                    <img src="images/<?= strtolower($candidate["nom"] . "_" . $candidate["prenom"]) . ".jpg"; ?>" alt="photo candidat delegue">
                    <?= strtoupper($candidate["nom"] . " " . $candidate["prenom"]); ?>
            </label>

            <input type="radio" name="choix_delegue" id="<?= $candidate["nom"] . "_" . $candidate["prenom"] . "_D"; ?>" value="<?= $candidate["nom"] . " " . $candidate["prenom"]; ?>" required>
        </div>
    <?php endforeach; ?>

    <div class="flex-item">
        <label for="blanc_vote_d">
                <img src="images/faux.png" alt="photo candidat delegue">
                VOTE BLANC
        </label>

        <input type="radio" name="choix_delegue" id="blanc_vote_d" value="BLANC VOTE" required>
    </div>
        
</div>