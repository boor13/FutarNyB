<?php include('includes/header.php'); ?>
<div id="content">
<?php if (isset($_SESSION['logged'])) : ?>

    <p>Üdv az oldalon, <?php echo $_SESSION['name']; ?>! |
        <a role="presentation"><a href="?q=kijelentkezes">Kijelentkezés</a></p>
        


<?php else : ?>
    <form name="loginForm" method="post" class="form-inline">
        <input type="text" name="uName" class="form-control input-sm" placeholder="Név">
        <br>
        <input type="password" name="uPass" class="form-control input-sm" placeholder="Jelszó">
        <br>
        <input type="submit" name="loginSubmit" value="Belépés" class="btn btn-default btn-sm">
        <br>
        <ul id="navigation" class="nav nav-pills">
            <li role="presentation"><a href="?q=regisztracio">Regisztáció</a></li>
        </ul>

    </form>
<?php endif; ?>
</div>


<?php include('includes/footer.php'); ?>


?>
