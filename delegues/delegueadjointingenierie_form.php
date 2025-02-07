<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ ."/../fonctions.php");

$delegues_adjoint= getCandidatesDelegues($mysqlClient, 'DELEGUE ADJOINT', 'INGENIERIE');
?>

<div class="flex-container">
    <?php foreach($delegues_adjoint as $candidate) : ?>
        <div class="flex-item">
            <label for="<?= $candidate["nom"] . "_" . $candidate["prenom"] . "_DA"; ?>">
                    <img src="images/<?= strtolower($candidate["nom"] . "_" . $candidate["prenom"]) . ".jpg"; ?>" alt="photo candidat delegue adjoint">
                    <?= $candidate["nom"] . " " . $candidate["prenom"]; ?>
            </label>

            <input type="radio" name="choix_delegue_adjoint" id="<?= $candidate["nom"] . "_" . $candidate["prenom"] . "_DA"; ?>" value="<?= $candidate["nom"] . " " . $candidate["prenom"]; ?>" required>
        </div>
    <?php endforeach; ?>

    <div class="flex-item">
        <label for="blanc_vote_da">
                <img src="images/faux.png" alt="photo candidat delegue adjoint">
                VOTE BLANC
        </label>

        <input type="radio" name="choix_delegue_adjoint" id="blanc_vote_da" value="BLANC VOTE">
    </div>
        
</div>