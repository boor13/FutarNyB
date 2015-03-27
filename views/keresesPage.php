<?php include('includes/header.php'); ?>
<div id="content">

    <?php if (isset($_SESSION['sresult'])) : ?>

        <?php
        if (!empty($_SESSION['sresult'])) {
            foreach ($_SESSION['sresult'] as $item) {




                echo '<b><br>Cimzett neve:</b>' . $item['cimzett_neve'];
                echo '<b><br>Súly:</b>' . $item['suly'];
                echo '<b><br>Szálitás kezdete:</b>' . $item['szalitas_kezdete'];
                echo '<b><br>Érkezés ideje:</b>' . $item['erkezes_ideje'];
                echo '<b><br>Átvétel ideje:</b>' . $item['atvetel_ideje'];
            }
        } else {
            echo '<p>Nincs találat.</p>';
        }
        unset($_SESSION['sresult']);
        ?>
        <br>
        <ul id="navigation" class="nav nav-pills">
            <li role="presentation"><a href="?q=kereses">Új keresés</a></li>
        </ul>

    <?php else : ?>
        <div id="content" class="row">
            <div class="col-md-12">
                <form name="searchForm" method="post" id="searchForm">

                    <label>Azonositó:</label>
                    <br>
                    <input type="text" name="csKod" class="shortText">


                    <input type="submit" value="Keresés"  name="searchSubmit">
                </form>

            </div>
        </div>

    <?php endif; ?>
</div>
<?php
include('includes/footer.php');
