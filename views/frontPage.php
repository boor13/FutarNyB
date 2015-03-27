<?php include('includes/header.php'); ?>

<div id="content" class="row">
    <div class="col-md-12">
        <h2>Kezdőlap</h2>
        
        <?php
        foreach ($news as $item) {
            $tagID = $item['tag'];
            echo '<div class="news">';
            echo '<div class="tag">' . $tags[$tagID] . '</div>';
            echo '<div class="title">' . $item['title'] . '</div>';
            echo '<div class="text">' . $item['text'] . '</div>';
            echo '<div class="date">' . $item['date'] . '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

        <?php include('includes/footer.php'); ?>