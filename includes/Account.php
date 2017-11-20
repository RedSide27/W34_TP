<script src="js/jquery.js"  type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$("#Edit").click(function () {
		$(".form-control").prop("readonly", false);
		$("#pwd").prop("type","text")
		})
	});
</script>
<?php
$mysqli = new mysqli('localhost','root','','minewatch');
// print_r($_SESSION["login"]);
$query = "SELECT * FROM users WHERE User_ID = " . $_SESSION["login"];
//    echo $query;
$result = $mysqli->query($query);

$row = $result->fetch_assoc();

if (isset($_POST["saveChange"])){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $pass = $_POST['pwd'];

        $query = "UPDATE `users` SET `Username`='{$username}',`Password`='{$pass}',`User_LastName`='{$lastname}',`User_FirstName`='{$name}',`User_Email`='{$email}',`User_Inscription`='{$row["User_Inscription"]}',`User_Phone`='{$telephone}',`User_Adresse`='{$adresse}',`IsConfirm`={$row["IsConfirm"]},`IsAdmin`={$row["IsAdmin"]},`FK_Order_ID`={$row["FK_Order_ID"]} WHERE User_ID = " . $_SESSION["login"];
//	    echo $query;
    if($mysqli->query($query)){
        header("Location:index.php?page=Account");
    }
}

?>

    <div style="margin-top: 100px" class="container">
        <div class="box">
            <div class="center gap">
                <h2><?=$row["Username"]?></h2>
                <form style="display: inline;" method="POST" action="#">
                    <div  class="row" >
                        <div class="col-md-offset-2" >
                         <div class="col-md-10">
                            <div class="form-group">
                                <label>Prénom</label>
                                <input style="float: left;" type="text" value="<?=$row["User_FirstName"]?>" readonly class="form-control TextCenter" name="name" />
                            </div>
                        </div>
                    </div>
		        <div class="col-md-offset-2" >
			        <div class="col-md-10">
				        <div class="form-group">
					        <label>Nom</label>
					        <input type="text" value="<?=$row["User_LastName"]?>" readonly class="form-control TextCenter" name="lastname" />
				        </div>
			        </div>
		        </div>
				        <div class="col-md-offset-2" >
					        <div class="col-md-10">
						        <div class="form-group">
							        <label>Username</label>
							        <input type="text" value="<?=$row["Username"]?>" readonly class="form-control TextCenter" name="username" />
						        </div>
					        </div>
				        </div>
						        <div class="col-md-offset-2" >
							        <div class="col-md-10">
								        <div class="form-group">
									        <label>Téléphone</label>
									        <input type="text" value="<?=$row["User_Phone"]?>" readonly class="form-control TextCenter" name="telephone" />
								        </div>
							        </div>
						        </div>
								        <div class="col-md-offset-2" >
									        <div class="col-md-10">
										        <div class="form-group">
											        <label>Adresse</label>
											        <input type="text" value="<?=$row["User_Adresse"]?>" readonly class="form-control TextCenter" name="adresse" />
										        </div>
									        </div>
								        </div>
                <div class="col-md-offset-2" >
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value="<?=$row["User_Email"]?>" readonly class="form-control TextCenter" name="email" />
                        </div>
                    </div>
                </div>
                <div class="col-md-offset-2" >
                    <div class="col-md-10">
                    <div class="form-group">
                        <label>Password</label>
                        <input id="pwd" type="password" value="<?= $row["Password"]?>" readonly class="form-control TextCenter" name="pwd" />
                    </div>
                </div>
                </div>
                    </div>
	                <div><button id="Edit" type="button" class="btn btn-default btn-sm">
			                <span class="glyphicon glyphicon-pencil"></span>
			                <button name="saveChange" type="submit" class="btn btn-default btn-sm">
				                <span class="glyphicon glyphicon-floppy-saved"></span>
	                </div>
	        <!--fin-------------------------------------------------------------------------------------->
	</form>

            <div class="container">
                <h2>Dernier Achats</h2>
                <table class="table">
                    <tbody>
                    <tr>
                        <td>État</td>
                        <td>Nom de Produit</td>
                        <td>NoConfirmation</td>
                    </tr>
                    <tr class="success ListAchatClick">
                        <td>Envoyée</td>
                        <td>Pack or</td>
                        <td>15611541651</td>
                    </tr>
                    <tr class="success ListAchatClick">
                        <td>Envoyée</td>
                        <td>Skin Minecraft</td>
                        <td>15611541342</td>
                    </tr>
                    <tr class="danger ListAchatClick">
                        <td>Refuser</td>
                        <td>Pack Grand Master</td>
                        <td>15611541167</td>
                    </tr>
                    <tr name="achat" class="warning ListAchatClick">
                        <td>En Confirmation</td>
                        <td>Pack Fer</td>
                        <td>15611541654</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div><!--/.row-->
        </div><!--/.box-->
    </div><!--/.container-->
</section><!--/#contact-->
