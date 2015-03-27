<?php include('includes/header.php'); ?>

<div id="content">
  <h2>Keresés a hírekben</h2>
  
	<?php if (isset($_SESSION['sresult'])) : ?>
	
		<?php 
			if (!empty($_SESSION['sresult'])) {
				foreach ($_SESSION['sresult'] as $item) {
					$tagID = $item['tag'];
					echo '<div class="news">';
					echo '<div class="tag">'.$tags[$tagID].'</div>';
					echo '<div class="title">'.$item['title'].'</div>';
					echo '<div class="text">'.$item['text'].'</div>';
					echo '<div class="date">'.$item['date'].'</div>';
					echo '</div>';
				}
			} else {
				echo '<p>Nincs találat.</p>';
			}
			unset($_SESSION['sresult']); 
		?>
		<br>
		<ul id="navigation" class="nav nav-pills">
		<li role="presentation"><a href="?q=hirek">Új keresés</a></li>
		</ul>
	
	<?php else : ?>
  
		<form name="searchForm" method="post" id="searchForm">
				<label>Rovatban:</label>
				<br>
				<select name="tag">
				<option value="0">Összes</option>'
				<?php 
					foreach ($tags as $id => $tag) {
						echo '<option value="'.$id.'">'.$tag.'</option>';
					}
				?>
				</select>
				<br>
				<label>Címben:</label>
				<br>
				<input type="text" name="title" class="shortText">
				<br>
				<label>Szövegtörzsben:</label>
				<br>
				<input type="text" name="text" class="shortText">
				<br>
				<input type="submit" name="searchSubmit" value="Keresés">
			</form>
  
	<?php endif; ?>
  <hr>
  <h2>Hírek rögzítése</h2>
  
	<?php if (isset($_SESSION['msg'])) : ?>
	
		<p><?php print($_SESSION['msg']); unset($_SESSION['msg']); ?></p>
		<br>
		<ul id="navigation" class="nav nav-pills">
		<li role="presentation"><a href="?q=hirek">Új hír</a></li>
		</ul>
	
	<?php else : ?>
		
		<?php if ($_SESSION['rights']==1 || $_SESSION['rights']==2 || $_SESSION['rights']==3) : ?>
	
			<form name="newsForm" method="post" id="newsForm">
				<label>Cím:</label>
				<br>
				<input type="text" name="title" class="shortText">
				<br>
				<label>Bevezető:</label>
				<br>
				<textarea name="lead" class="leadText"></textarea>
				<br>
				<label>Szövegtörzs:</label>
				<br>
				<textarea name="text" class="longText"></textarea>
				<br>
				<label>Dátum:</label>
				<br>
				<input type="text" name="date" class="shortText">
				<br>
				<label>Rovat:</label>
				<br>
				<select name="tag">
				<?php 
					foreach ($tags as $id => $tag) {
						echo '<option value="'.$id.'">'.$tag.'</option>';
					}
				?>
				</select>
				<br>
				<?php if ($_SESSION['rights']==1 || $_SESSION['rights']==2) : ?>
					<label>Publikálható: </label>
					<input type="checkbox" name="published" value="1">
					<br>
				<?php endif; ?>
				<input type="submit" name="newsSubmit">
			</form>
			
		<?php else : ?>
		
			<p>Nincs jogosultsága az oldal megtekintéséhez.</p>
		
		<?php endif; ?>
		
		<?php if ($_SESSION['rights']==1 || $_SESSION['rights']==2) : ?>
		
			<hr>
			<h2>Publikálatlan hírek</h2>
			
			<form name="publishForm" method="post" id="publishForm">
				<table>
					<?php
						$c = 1;
						foreach ($nonPublished as $item) {
							$tagID = $item['tag'];
							echo '<tr>';
							echo '<td class="tid"><input type="checkbox" name="publish'.$c.'" value="'.$item['id'].'"></td>';
							echo '<td class="ttag">'.$tags[$tagID].'</td>';
							echo '<td class="ttitle">'.$item['title'].'</td>';
							echo '</tr>';
							$c++;
						}
					?>
				</table>
				<input type="submit" name="publishSubmit" value="Publikál">
			</form>
			
		<?php endif; ?>
  
	<?php endif; ?>
	
</div>

<?php
include('includes/footer.php');
