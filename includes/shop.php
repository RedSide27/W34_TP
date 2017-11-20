<?php
$mysqli = new mysqli('localhost','root','','minewatch');
$query = "SELECT * FROM `skin`ORDER BY ((Skin_No * 100) / (Skin_No + Skin_Yes))";

$result = $mysqli->query($query);
?>


<section id="portfolio" xmlns="http://www.w3.org/1999/html">
	<div class="container" style="margin-top: 100px">
		<div class="box">
			<div class="center gap">
				<h2>Prochain Skin</h2>
				<p class="lead">Décider vous-même des prochains skins !!</p>
				<h3>Allez votes !!</h3>
			</div><!--/.center-->
			<ul class="portfolio-items col-4">

                <?php
                // Boucle pour afficher Les skin minecraft
                while ($row = $result->fetch_assoc()) {
                    $PouceUp = intval(($row["Skin_Yes"]*100)/($row["Skin_Yes"] + $row["Skin_No"]));
                    ?>
					<li class="portfolio-item minecraft">
						<div class="item-inner">
							<div class="portfolio-image">
								<img style="height: 235px;width: 235px;" src="<?=$row["Skin_PATH"]?>" alt=""> <!-- # de la photo -->
								<div class="overlay">
									<a class="preview btn btn-danger" href="<?=$row["Skin_PATH"]?>"><i class="icon-eye-open"></i></a>
								</div>
							</div>
							<div class="row">
								<div><button type="button" class="btn btn-default btn-md">
										<span class="glyphicon glyphicon-thumbs-up alert-success"><?=$PouceUp . "%"?></span> <!-- Nb de Pouce Vert -->
										<button style="margin-left: 15%;" type="button" class="btn btn-default btn-md">
											<span class="glyphicon glyphicon-thumbs-down alert-danger"><?=100 - $PouceUp . "%"?></span></div> <!-- Nb de Pouce Rouge -->
								<h5><?=$row["Skin_Name"]?></h5>
							</div>
					</li>
                    <?php
                }
                ?>
				<!---------------------------------------------------Fin Minecraft Debut OverWatch--------------------------------------------------->
                <?php
                while ($row = $result->fetch_assoc()) {
                    $PouceUp = intval(($row["Skin_Yes"]*100)/($row["Skin_Yes"] + $row["Skin_No"]));
                ?>
				<li class="portfolio-item overwatch">
					<div class="item-inner">
						<div class="portfolio-image">
							<img src="<?=$row["Skin_PATH"]?>" alt=""> <!-- # de la photo -->
							<div class="overlay">
								<a class="preview btn btn-danger" title="Lorem ipsum dolor sit amet" href="<?=$row["Skin_PATH"]?>"><i class="icon-eye-open"></i></a>
							</div>
						</div>
						<div class="row">
							<div><button type="button" class="btn btn-default btn-md">
									<span class="glyphicon glyphicon-thumbs-up alert-success"><?=$PouceUp . "%"?></span> <!-- Nb de Pouce Vert -->
									<button style="margin-left: 15%;" type="button" class="btn btn-default btn-md">
										<span class="glyphicon glyphicon-thumbs-down alert-danger"><?=100 - $PouceUp . "%"?></span></div> <!-- Nb de Pouce Rouge -->
						<h5><?=$row["Skin_Name"]?></h5>
					</div>
					</div>
				</li><!--/.portfolio-item-->
	                <?php
                }
                ?>

			</ul>
		</div><!--/.box-->
	</div><!--/.container-->
</section><!--/#portfolio-->