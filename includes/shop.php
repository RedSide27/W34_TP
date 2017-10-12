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
                // Boucle pour afficher Les skin OverWatch
                for ($j=1;$j<13;$j++){
                    $pouceUp = rand(0,100);
                    $pouceDown = 100-$pouceUp;

                ?>
				<li class="portfolio-item overwatch">
					<div class="item-inner">
						<div class="portfolio-image">
							<img src="images/portfolio/thumb/item<?=$j?>.jpg" alt=""> <!-- # de la photo -->
							<div class="overlay">
								<a class="preview btn btn-danger" title="Lorem ipsum dolor sit amet" href="images/portfolio/full/item<?=$j?>.jpg"><i class="icon-eye-open"></i></a>
							</div>
						</div>
						<div class="row">
							<div><button type="button" class="btn btn-default btn-md">
									<span class="glyphicon glyphicon-thumbs-up alert-success"><?=$pouceUp . "%"?></span> <!-- Nb de Pouce Vert -->
									<button style="margin-left: 15%;" type="button" class="btn btn-default btn-md">
										<span class="glyphicon glyphicon-thumbs-down alert-danger"><?=$pouceDown . "%"?></span></div> <!-- Nb de Pouce Rouge -->
						<h5>Overwatch Skin</h5>
					</div>
					</div>
				</li><!--/.portfolio-item-->
	                <?php
                }
                ?>

				<!---------------------------------------------------Fin OverWatch Debut Minecraft--------------------------------------------------->
				<?php
				// Boucle pour afficher Les skin minecraft
				 for ($i=1;$i<13;$i++){
                     $pouceUp = rand(0,100);
                     $pouceDown = 100-$pouceUp;
				 	?>
				<li class="portfolio-item minecraft">
					<div class="item-inner">
						<div class="portfolio-image">
							<img style="height: 235px;width: 235px;" src="images/portfolio/thumb/Skin<?=$i?>.png" alt=""> <!-- # de la photo -->
							<div class="overlay">
								<a class="preview btn btn-danger" href="images/portfolio/full/Skin<?=$i?>.jpg"><i class="icon-eye-open"></i></a>
							</div>
						</div>
						<div class="row">
							<div><button type="button" class="btn btn-default btn-md">
									<span class="glyphicon glyphicon-thumbs-up alert-success"><?=$pouceUp . "%"?></span> <!-- Nb de Pouce Vert -->
									<button style="margin-left: 15%;" type="button" class="btn btn-default btn-md">
										<span class="glyphicon glyphicon-thumbs-down alert-danger"><?=$pouceDown . "%"?></span></div> <!-- Nb de Pouce Rouge -->
							<h5>Minecraft Skin</h5>
						</div>
				</li>
				<?php
				 }
				?>
			</ul>
		</div><!--/.box-->
	</div><!--/.container-->
</section><!--/#portfolio-->