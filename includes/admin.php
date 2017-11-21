<?php
$mysqli = new mysqli('localhost','root','','minewatch');
if(isset($_))
	if(isset($_POST["SendPack"])){
		$PackName = $_POST["nom"];
		$Prix = $_POST["prix"];
		$item1 = $_POST["item1"];
        $item2 = $_POST["item3"];
        $item3 = $_POST["item3"];
        $item4 = $_POST["item4"];
        $item5 = $_POST["item5"];
        if(!empty($PackName) || !empty($Prix) || !empty($item1) || !empty($item2) || !empty($item3) || !empty($item4) || !empty($item5)){
        	$query = "INSERT INTO `pack_skin`(`Pack_ID`, `Pack_Name`, `Pack_Price`, `Pack_Skin_ID1`, `Pack_Skin_ID2`, `Pack_Skin_ID3`, `Pack_Skin_ID4`, `Pack_Skin_ID5`) VALUES (0,'$PackName',$Prix,'$item1','$item2','$item3','$item4','$item5')";
        	$mysqli->query($query);
        }
	}
?>

<html>
<body ng-app>
    <section id="pricing">
        <div class="container box" style="margin-top: 100px">
            <div>
                <div class="center">
                    <h2>Ajouter Pack de skins</h2>
                    <?php
                    if(isset($_SESSION["UploadIMG"])) {
                        echo $_SESSION["UploadIMG"];
                        unset($_SESSION["UploadIMG"]);
                    }
                    ?>
                </div><!--/.center-->
	            <form method="post" action="#">
		            <div>
                <div class="big-gap"></div>
                <div id="pricing-table" class="row">

                    <div style="background-color: #5bc0de" class="col-sm-4 col-sm-offset-2">
                        <ul class="plan featured">
                            Titre
                            <li class="plan-name"><input type="text" ng-model="nomPack" name="nom"></li>
                            Prix
                            <li class="plan-name"><input type="number" name="prix" ng-model="prixPack" ng-required="number" required></li>
                            Item1
                            <li><input type="text" ng-model="item1" name="item1"></li>
                            Item2
                            <li><input type="text" ng-model="item2" name="item2"></li>
                            Item3
                            <li><input type="text" ng-model="item3" name="item3"></li>
                            Item4
                            <li><input type="text" ng-model="item4" name="item4"></li>
                            Item5
                            <li><input type="text" ng-model="item5" name="item5"></li>
	                        <li><input class="btn btn-primary btn-lg" type="submit" name="SendPack" value="Envoyé"></li>

                        </ul>
                    </div><!--/.col-sm-4-->
	            </form>
                    <div style="background-color: #5bc0de;margin-left: 50px" class="col-sm-4">
                        <ul class="plan">
                            <li class="plan-name">{{nomPack}}</li>
                            <li class="plan-price">{{prixPack | currency}}</li>
                            <li>{{item1}}</li>
                            <li>{{item2}}</li>
                            <li>{{item3}}</li>
                            <li>{{item4}}</li>
                            <li>{{item5}}</li>
                            <li class="plan-action"><a href="#" class="btn btn-primary btn-lg">Acheter</a></li>
                        </ul>
                    </div><!--/.col-sm-4-->
            </div>
	        <hr/>
	            <div class="center"><h2>Ajouter Pack de skins</h2></div>
	        <div class="col-md-offset-2" >
		        <div class="col-md-10">
			        <div class="form-group">
				        <label>Nom du Skin</label>
				        <input type="text" value="" class="form-control" name="SkinName" />
			        </div>
		        </div>
	        </div>
            <form method="POST" action="includes/upload.php" enctype="multipart/form-data">
    	        <div class="col-md-offset-2" >
    		        <div class="col-md-10">
    			        <div class="form-group">
    				        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" />
    			        </div>
    		        </div>
    	        </div>
    	        <div class="col-md-offset-2" >
    		        <div class="col-md-10">
    			        <div class="form-group">
    				        <input type="submit" class="btn btn-primary" value="submit" name="AddSkin">
    			        </div>
    		        </div>
    	        </div>
            </form>
                </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <script src="js/jquery.js"></script>
</body>
</html>
