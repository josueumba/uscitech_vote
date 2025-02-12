<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

foreach(glob(__DIR__ . "/candidats/*.php") as $file) {
    require_once $file;
}
require_once(__DIR__ ."/results.php");
require_once(__DIR__ ."/treat_candidat.php");
require_once(__DIR__ ."/fonctions.php");

if(!isset($_SESSION["logged_student"])) {
    redirectToUrl('login.php');
}

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
    <link rel="stylesheet" href="styles/style2.css">
    <title>Résultats</title>
</head>
<body>
    <?php require_once(__DIR__ . "/header.php") ?>
    
    <section class="section-results">
        <h1>résultats</h1>

        <div>
            <h2>président</h2>
            <?php foreach($presidence as $president): ?>
                <p><?php echo $president["nom"]; ?> : <?php echo $president["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>vice président</h2>
            <?php foreach($vice_presidence as $vice_president): ?>
                <p><?php echo $vice_president["nom"]; ?> : <?php echo $vice_president["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>delegue économie</h2>
            <?php foreach($delegue_economie as $delegue): ?>
                <p><?php echo $delegue["nom"]; ?> : <?php echo $delegue["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>delegue adjoint économie</h2>
            <?php foreach($delegue_adjoint_economie as $delegue): ?>
                <p><?php echo $delegue["nom"]; ?> : <?php echo $delegue["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>delegue ingénierie</h2>
            <?php foreach($delegue_ingenierie as $delegue): ?>
                <p><?php echo $delegue["nom"]; ?> : <?php echo $delegue["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>delegue adjoint ingénierie</h2>
            <?php foreach($delegue_adjoint_ingenierie as $delegue): ?>
                <p><?php echo $delegue["nom"]; ?> : <?php echo $delegue["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <!-- <div>
            <h2>delegue science de l'éducation</h2>
            <?php foreach($delegue_education as $delegue): ?>
                <p><?php echo $delegue["nom"]; ?> : <?php echo $delegue["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>delegue adjoint science de l'éducation</h2>
            <?php foreach($delegue_adjoint_education as $delegue): ?>
                <p><?php echo $delegue["nom"]; ?> : <?php echo $delegue["voix"]; ?></p>
            <?php endforeach; ?>
        </div> -->

        <div>
            <h2>delegue sciences informatiques</h2>
            <?php foreach($delegue_informatique as $delegue): ?>
                <p><?php echo $delegue["nom"]; ?> : <?php echo $delegue["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>delegue adjoint sciences informatiques</h2>
            <?php foreach($delegue_adjoint_informatique as $delegue): ?>
                <p><?php echo $delegue["nom"]; ?> : <?php echo $delegue["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cp bac1 économie</h2>
            <?php foreach($cp_bac1_economies as $cp): ?>
                <p><?php echo $cp["nom"]; ?> : <?php echo $cp["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cpa bac1 économie</h2>
            <?php foreach($cpa_bac1_economie as $cpa): ?>
                <p><?php echo $cpa["nom"]; ?> : <?php echo $cpa["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cp bac1 sciences informatiques</h2>
            <?php foreach($cp_bac1_informatique as $cp): ?>
                <p><?php echo $cp["nom"]; ?> : <?php echo $cp["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cpa bac1 sciences informatiques</h2>
            <?php foreach($cpa_bac1_informatique as $cpa): ?>
                <p><?php echo $cpa["nom"]; ?> : <?php echo $cpa["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cp bac1 science de l'éducation</h2>
            <?php foreach($cp_bac1_education as $cp): ?>
                <p><?php echo $cp["nom"]; ?> : <?php echo $cp["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cpa bac1 science de l'éducation</h2>
            <?php foreach($cpa_bac1_education as $cpa): ?>
                <p><?php echo $cpa["nom"]; ?> : <?php echo $cpa["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cp bac1 ingénierie</h2>
            <?php foreach($cp_bac1_ingenierie as $cp): ?>
                <p><?php echo $cp["nom"]; ?> : <?php echo $cp["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cpa bac1 ingénierie</h2>
            <?php foreach($cpa_bac1_ingenierie as $cpa): ?>
                <p><?php echo $cpa["nom"]; ?> : <?php echo $cpa["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cp bac2 économie</h2>
            <?php foreach($cp_bac2_economie as $cp): ?>
                <p><?php echo $cp["nom"]; ?> : <?php echo $cp["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cpa bac2 économie</h2>
            <?php foreach($cpa_bac2_economie as $cpa): ?>
                <p><?php echo $cpa["nom"]; ?> : <?php echo $cpa["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cp bac2 sciences informatiques</h2>
            <?php foreach($cp_bac2_informatique as $cp): ?>
                <p><?php echo $cp["nom"]; ?> : <?php echo $cp["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cpa bac2 sciences informatiques</h2>
            <?php foreach($cpa_bac2_informatique as $cpa): ?>
                <p><?php echo $cpa["nom"]; ?> : <?php echo $cpa["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cp bac3 génie électrique</h2>
            <?php foreach($cp_bac3_genieelectrique as $cp): ?>
                <p><?php echo $cp["nom"]; ?> : <?php echo $cp["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cpa bac3 génie électrique</h2>
            <?php foreach($cpa_bac3_genieelectrique as $cpa): ?>
                <p><?php echo $cpa["nom"]; ?> : <?php echo $cpa["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cp bac3 génie logiciel</h2>
            <?php foreach($cp_bac3_genielogiciel as $cp): ?>
                <p><?php echo $cp["nom"]; ?> : <?php echo $cp["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cpa bac3 génie logiciel</h2>
            <?php foreach($cpa_bac3_genielogiciel as $cpa): ?>
                <p><?php echo $cpa["nom"]; ?> : <?php echo $cpa["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cp bac3 réseau et télécommunication</h2>
            <?php foreach($cp_bac3_reseau as $cp): ?>
                <p><?php echo $cp["nom"]; ?> : <?php echo $cp["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

        <div>
            <h2>cpa bac3 réseau et télécommunication</h2>
            <?php foreach($cpa_bac3_reseau as $cpa): ?>
                <p><?php echo $cpa["nom"]; ?> : <?php echo $cpa["voix"]; ?></p>
            <?php endforeach; ?>
        </div>

    </section>

    <?php require_once(__DIR__ . "/footer.php") ?>
</body>
</html>
