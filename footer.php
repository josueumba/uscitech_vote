<hr>
<footer class="d-flex" id="footer">
    <nav class="nav-foot">
        <?php if(isset($_SESSION['logged_student'])): ?>
            <a href="home.php">Home</a>
        <?php else :?>
            <a href="index.php">Home</a>
        <?php endif; ?>
        <a href="about.php">About</a>

    </nav>
    <i>Copyright@2024</i>
    <i></i>
</footer>