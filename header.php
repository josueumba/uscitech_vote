<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<header class="d-flex" id="header">
    <?php if(isset($_SESSION['logged_student'])): ?>
        <p><a href="home.php">USCITECH VOTE</a></p>
    <?php else :?>
        <p><a href="index.php">USCITECH VOTE</a></p>
    <?php endif; ?>

    <?php if(isset($_SESSION['logged_student'])): ?>
        <p style="font-weight:600; border:1px solid white; border-radius: 50px; padding:5px 10px">
            <?php echo $_SESSION['logged_student']['prenom'] . " " . $_SESSION['logged_student']['nom'] ?>
        </p>
    <?php endif; ?>

    <nav>
        <?php if(isset($_SESSION['logged_student'])): ?>
            <a href="home.php" id="hidden">Home</a>
            <?php if($_SESSION['logged_student']['promotion'] == "GOLD") : ?>
                <a href="results_form.php">Results</a>
            <?php else : ?>
                <a href="vote.php" id="hidden">Vote</a>
            <?php endif; ?>
            <a href="about.php" id="hidden">About</a>
            <a href="logout.php">LogOut</a>
        <?php else :?>
            <a href="index.php" id="hidden">Home</a>
            <a href="login.php" id="hidden">Login</a>
            <a href="about.php" id="hidden">About</a>
        <?php endif; ?>
    </nav>
</header>