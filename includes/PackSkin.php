<?php
$mysqli = new mysqli('localhost','root','','minewatch');
$query = "SELECT * FROM pack_skin";
$cpt = 0;
//$result = $mysqli->query($query);
//while ($row = $result->fetch_assoc()) {
//
//if (($cpt % 2) == 0){
?>

<section id="pricing">
	<div class="container" style="margin-top: 100px">
		<div class="box">
			<div class="center">
				<h2>Pack de Skins Customs</h2>
				<p class="lead">Voici les packs spéciaux ! </p>
			</div><!--/.center-->
			<div class="big-gap"></div>
			<div id="pricing-table" class="row">
				<?php
                $result = $mysqli->query($query);
                while ($row = $result->fetch_assoc()) {
					$cpt +=1;
                    if (($cpt % 3) == 0){
				?>
	                    <form method="POST" action="#">
	                    <input type="hidden" value="<?= $row["Pack_ID"] ?>" name="PackID">
				<div class="col-sm-4">
					<ul class="plan">
						<li class="plan-name"><?= $row["Pack_Name"] ?></li>
						<li class="plan-price"><?= $row["Pack_Price"] ?>$</li>
						<li><?= $row["Pack_Skin_ID1"] ?></li>
						<li><?= $row["Pack_Skin_ID2"] ?></li>
						<li><?= $row["Pack_Skin_ID3"] ?></li>
						<li><?= $row["Pack_Skin_ID4"] ?></li>
						<li><?= $row["Pack_Skin_ID5"] ?></li>
						<li class="plan-action"><input type="submit" name="AddCart" value="Ajouter" class="btn btn-primary btn-lg"></li>
					</ul>
				</div><!--/.col-sm-4-->
	                    </form>
                <?php
                } elseif (($cpt % 3) == 1) {
                    ?>
	                    <form method="POST" action="#">
	                    <input type="hidden" value="<?= $row["Pack_ID"] ?>" name="PackID">
					<div class="col-sm-4">
						<ul class="plan">
							<li class="plan-name"><?= $row["Pack_Name"] ?></li>
							<li class="plan-price"><?= $row["Pack_Price"] ?>$</li>
							<li><?= $row["Pack_Skin_ID1"] ?></li>
							<li><?= $row["Pack_Skin_ID2"] ?></li>
							<li><?= $row["Pack_Skin_ID3"] ?></li>
							<li><?= $row["Pack_Skin_ID4"] ?></li>
							<li class="plan-action"><input type="submit" name="AddCart" value="Ajouter" class="btn btn-primary btn-lg"></li>
						</ul>
					</div><!--/.col-sm-4-->
	                    </form>
                    <?php
                } elseif (($cpt % 3) == 2) {
                    ?>
	                    <form method="POST" action="#">
	                    <input type="hidden" value="<?= $row["Pack_ID"] ?>" name="PackID">
					<div class="col-sm-4">
						<ul class="plan featured">
							<li class="plan-name"><?= $row["Pack_Name"] ?></li>
							<li class="plan-price"><?= $row["Pack_Price"] ?>$</li>
							<li><?= $row["Pack_Skin_ID1"] ?></li>
							<li><?= $row["Pack_Skin_ID2"] ?></li>
							<li><?= $row["Pack_Skin_ID3"] ?></li>
							<li><?= $row["Pack_Skin_ID4"] ?></li>
							<li><?= $row["Pack_Skin_ID5"] ?></li>
							<li class="plan-action"><input type="submit" name="AddCart" value="Ajouter" class="btn btn-primary btn-lg "></li>
						</ul>
					</div><!--/.col-sm-4-->
				</form>
                    <?php
                }else{

                    }
                }
				?>
            </div>
        </div>
    </div>


<!--    <div class="container">-->
<!--        <div class="box">-->
<!--            <div class="center">-->
<!--                <h2>Pack de Skins Minecraft</h2>-->
<!--                <p class="lead">Voici les packs spéciaux ! </p>-->
<!--            </div><!--/.center-->
<!--            <div class="big-gap"></div>-->
<!--            <div id="pricing-table" class="row">-->
<!--                <div style="background-color: #bdbdbd" class="col-sm-4">-->
<!--                    <ul class="plan featured">-->
<!--                        <li class="plan-name">Fer</li>-->
<!--                        <li class="plan-price">15$</li>-->
<!--                        <li>1 skin normal Minecraft</li>-->
<!--                        <li>1 skin rare Minecraft</li>-->
<!--                        <li>2 random skin Minecraft</li>-->
<!--                        <li class="plan-action"><a href="#" class="btn btn-primary btn-lg">Acheter</a></li>-->
<!--                    </ul>-->
<!--                </div><!--/.col-sm-4-->
<!--                <div style="background-color: #ffff00" class="col-sm-4">-->
<!--                    <ul class="plan">-->
<!--                        <li class="plan-name">Or</li>-->
<!--                        <li class="plan-price">40$</li>-->
<!--                        <li>3 skin rare Minecraft</li>-->
<!--                        <li>1 skin légendaire Minecraft</li>-->
<!--                        <li>4 random skin Minecraft</li>-->
<!--	                    <li>10% de rabais prochain achat</li>-->
<!--                        <li class="plan-action"><a href="#" class="btn btn-primary btn-lg">Acheter</a></li>-->
<!--                    </ul>-->
<!--                </div><!--/.col-sm-4-->
<!--                <div style="background-color: #5bc0de" class="col-sm-4">-->
<!--                    <ul class="plan">-->
<!--                        <li class="plan-name">Diamant</li>-->
<!--                        <li class="plan-price">$120</li>-->
<!--                        <li>3 skin légendaire Minecraft</li>-->
<!--                        <li>4 skin random Minecraft</li>-->
<!--                        <li>10% de rabais prochain achat</li>-->
<!--                        <li>10 skin normal</li>-->
<!--                        <li>+Bonus : Map Minecraft de Mini-jeux</li>-->
<!--                        <li class="plan-action"><a href="#" class="btn btn-primary btn-lg">Acheter</a></li>-->
<!--                    </ul>-->
<!--                </div><!--/.col-sm-4-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!---->
<!--    <div class="container">-->
<!--        <div class="box">-->
<!--            <div class="center">-->
<!--                <h2>Pack de Skins OverWatch</h2>-->
<!--                <p class="lead">Voici les packs spéciaux ! </p>-->
<!--            </div><!--/.center-->
<!--            <div class="big-gap"></div>-->
<!--            <div id="pricing-table" class="row">-->
<!--                <div style="background-color: #90483A" class="col-sm-4">-->
<!--                    <ul class="plan">-->
<!--                        <li class="plan-name">Bronze</li>-->
<!--                        <li class="plan-price">30$</li>-->
<!--                        <li>1 skin normal Minecraft</li>-->
<!--                        <li>1 skin rare Minecraft</li>-->
<!--                        <li>1 random skin Overwatch</li>-->
<!--                        <li class="plan-action"><a href="#" class="btn btn-primary btn-lg">Acheter</a></li>-->
<!--                    </ul>-->
<!--                </div><!--/.col-sm-4-->
<!--                <div style="background-color: #BBC6E6" class="col-sm-4" class="col-sm-4">-->
<!--                    <ul class="plan">-->
<!--                        <li class="plan-name">Platinum</li>-->
<!--                        <li class="plan-price">50$</li>-->
<!--                        <li>1 skin rare Minecraft</li>-->
<!--                        <li>1 skin légendaire Minecraft</li>-->
<!--                        <li>2 random skin Overwatch</li>-->
<!--                        <li>1 skin légendaire Overwatch</li>-->
<!--                        <li class="plan-action"><a href="#" class="btn btn-primary btn-lg">Acheter</a></li>-->
<!--                    </ul>-->
<!--                </div><!--/.col-sm-4-->
<!--                <div style="background-color: #F9C961" class="col-sm-4">-->
<!--                    <ul class="plan featured">-->
<!--                        <li class="plan-name">GrandMaster</li>-->
<!--                        <li class="plan-price">$120</li>-->
<!--                        <li>3 skin légendaire Minecraft</li>-->
<!--                        <li>2 skin random Minecraft</li>-->
<!--                        <li>10% de rabais prochain achat</li>-->
<!--                        <li>3 skin légendaire Overwatch</li>-->
<!--                        <li>5 skin random Overwatch</li>-->
<!--                        <li class="plan-action"><a href="#" class="btn btn-primary btn-lg">Acheter</a></li>-->
<!--                    </ul>-->
<!--                </div><!--/.col-sm-4-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->


</section><!--/#pricing-->
