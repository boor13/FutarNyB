<?php include('includes/header.php'); ?>

<div id="content">
    
    
    <h2>Csomagok kezelése</h2>

    <table class="tablazat">
        <tr>
            <th>id</th>
            <th>Feladó</th>
            <th>Címzett</th>
            <th>Súly</th>
            <th>Feladás ideje</th>
            <th>Szállítási pont</th>
            <th>Csomag Állapota</th>
            <th>Müveletek</th> 
        </form>
        </tr>
        <?php
        while ($item = $csomagok->fetch_assoc()) {
            $allapot = 'Új csomag';
            if ($item['szalitas_kezdete']!= NULL) $allapot = 'feladva';
            if ($item['erkezes_ideje']!= NULL) $allapot = 'leszállítva';
            if ($item['atvetel_ideje']!= NULL) $allapot = 'átvett';
            
            
            echo '<tr>';
            echo '<td>'.$item['id'];
            echo '<td>'.$item['nev'];
            echo '<td>'.$item['cimzett_neve'];
            echo '<td>'.$item['suly'];
            echo '<td>'.$item['feladas_ideje'];
            echo '<td>'.$item['varos'].', '.$item['megnevezes'];
            echo '<td>'.$allapot;
            echo '<td><a class="btn btn-default btn-xs" href="?q=csomagreszletek&id='.$item['id'].'">Részletek</a> ';
            switch ($allapot) {
                case 'Új csomag':
                    echo '<a class="btn btn-default btn-xs" href="?q=csomag&id='.$item['id'].'&muv=feladas">Feladás</a>';
                    break;
                case 'feladva':
                    echo '<a class="btn btn-default btn-xs" href="?q=csomag&id='.$item['id'].'&muv=megerkezett>Megérkezett</a>';
                    break;
                case 'leszállítva':
                    echo '<a class="btn btn-default btn-xs" href="?q=csomag&id='.$item['id'].'&muv=atvetel">Átvétel</a>';
                    break;
            }
            
            
            
        }
        ?>
    </table>
    
    
    <?php if (isset($_SESSION['msg'])) : ?>

        <p><?php
            print($_SESSION['msg']);
            unset($_SESSION['msg']);
            ?></p>
        <br>
        <ul id="navigation" class="nav nav-pills">
            <li role="presentation"><a href="?q=felhasznalok">Új felhasználó</a></li>
        </ul>

    <?php else : ?>

    <?php if (isset($_SESSION['rights']) && $_SESSION['rights'] == 1) : ?>

            <form name="usersForm" method="post" id="newsForm">
                <label>Feladó:</label>
                <br>
                <select name="senders">
                    <?php
                    foreach ($senders as $sender) {
                        echo '<option value="' . $sender['id'] . '">' . $sender['nev'] . '</option>';
                    }
                    ?>
                </select>
                <br>
                <label>Címzett neve:</label>
                <input type="text" name="cimzett_neve">
                <br>
                <label>Súly:</label>
                <input type="text" name="suly" size="3">
                <br>
                <label>Szállitásí cím:</label>
                <br>
                <select name="vegpont">
                    <?php
                    foreach ($vegpont as $pont) {
                        echo '<option value="' . $pont['id'] . '">' . $pont['cim'] . '</option>';
                    }
                    ?>
                </select>
                <br>
                <label>Törékeny:</label>
                <br>
                <select name="torekeny">
                    <option value="0">Nem törékeny</option>
                    <option value="1">Törékeny</option>
                </select>
                <br>
                <label>Szállitó:</label>
                <br>
                <select name="users">
                    <?php
                    foreach ($users as $user) {
                        echo '<option value="' . $user['id'] . '">' . $user['name'] . '</option>';
                    }
                    ?>
                </select>
                <br>
                <input type="submit" name="csomagSubmit">
            </form>

    <?php else : ?>

            <p>Nincs jogosultsága az oldal megtekintéséhez.</p>

        <?php endif; ?>

<?php endif; ?>

</div>

<?php
include('includes/footer.php');


