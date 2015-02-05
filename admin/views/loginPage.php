<?php include('includes/header.php'); ?>
        
        <div id="content">
            <h2>Bejelentkezés</h2>
            
            <form name="loginForm" method="post">
                <label>Felhasználónév:</label>
                <br>
                <input type="text" name="uName">
                <br>
                <label>Jelszó:</label>
                <br>
                <input type="password" name="uPass">
                <br>
                <input type="submit" name="loginSubmit">
            </form>
            
        </div>
        
<?php include('includes/footer.php');