<?php include('includes/header.php'); ?>

<div id="content">


    <h2>Csomagok kezelése</h2>

    <table>
        <tr>
            <td><b>id:</b></td>
            <td><?php echo $csomag['id']; ?></td>
        </tr>
        <tr>
            <td><b>Feladó neve:</b></td>
            <td><?php echo $csomag['felado_nev']; ?></td>
        </tr>
        <tr>
            <td><b>Címzett neve:</b></td>
            <td><?php echo $csomag['cimzett_neve']; ?></td>
        </tr>
        <tr>
            <td><b>Szállitási pont:</b></td>
            <td><?php echo $csomag['szallitasi_pont_id']; ?></td>
        </tr>
        <tr>
            <td><b>Feladás idelye:</b></td>
            <td><?php echo $csomag['feladas_ideje']; ?></td>
        </tr>
        <tr>
            <td><b>Érkezés idelye:</b></td>
            <td><?php echo $csomag['erkezes_ideje']; ?></td>
        </tr>
        <tr>
            <td><b>Törékeny:</b></td>
            <td><?php echo $csomag['torekeny']; ?></td>
        </tr>
        <tr>
            <td><b>Szállitás kezdete:</b></td>
            <td><?php echo $csomag['szalitas_kezdete']; ?></td>
        </tr>
        
        <tr>
            <td><b>Azonosító:</b></td>
            <td><?php echo $csomag['azonosito']; ?></td>
        </tr>
        <tr>
            <td><b>Megnevezés:</b></td>
            <td><?php echo $csomag['megnevezes']; ?></td>
        </tr>
        <tr>
            <td><b>Város:</b></td>
            <td><?php echo $csomag['varos']; ?></td>
        </tr>
    </table>


</div>

<?php
include('includes/footer.php');


