<?php

$mysqli = new mysqli('localhost','root','','minewatch');
require('recaptcha/autoload.php');


if (isset($_POST['register'])){
    if(isset($_POST['g-recaptcha-reponse'])) {
        $recaptcha = new \ReCaptcha\ReCaptcha('6Lc9szIUAAAAAHszBfx2H8N35y9G0au5TJx_qKgm');
        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) {
            echo "ok";
        } else {
            echo "pas ok";
        }
   }
   else {
    echo "non remplis";
   }
}

/*
    if (isset($_POST['register'])) {
        $secretKey = "6Lc9szIUAAAAAHszBfx2H8N35y9G0au5TJx_qKgm";
        $responseKey = $_POST['g-recaptcha-response'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ($response->success) {

             
        }
        else{
            header("Location:index.php?page=login");
        }
    }
}
   
*/
if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['emailConfirm']) && !empty($_POST['pwd'])) {
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $pass = $_POST['pwd'];
    $date = date("Y-m-d");

    $query = "INSERT INTO users VALUES(0,'{$username}', '{$pass}', '{$lastname}', '{$name}', '{$email}', '{$date}', '{$telephone}', '{$adresse}', NULL, NULL, NULL)";

    if($mysqli->query($query)){
        header("Location:index.php?page=accueil");
    }
}
?>
<head>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<div class="container" style="margin-top: 100px">
	<div class="box">
	<div class="center gap">
		<h2>Inscrivez-vous</h2>

		<form method="POST" action="#">
        <h1>Pas de compte ? Pas de problème ! Juste a remplir ce formulaire !</h1>
			<div class="row">
				<div class="col-md-6  col-md-offset-3">
					<div class="form-group">
						<label>Prénom</label>
						<input type="text" class="form-control" name="name" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6  col-md-offset-3">
					<div class="form-group">
						<label>Nom de Famille</label>
						<input type="text" class="form-control" name="lastname" />
					</div>
				</div>
			</div>
			<div class="row" />
        <div class="col-md-6  col-md-offset-3">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" />
            </div>
        </div>
	</div>
		<div class="row">
			<div class="col-md-6  col-md-offset-3">
				<div class="form-group">
					<label>Téléphone</label>
					<input type="text" class="form-control" name="telephone" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6  col-md-offset-3">
				<div class="form-group">
					<label>Adresse</label>
					<input type="text" class="form-control" name="adresse" />
				</div>
			</div>
		</div>
<div class="row">
    <div class="col-md-6  col-md-offset-3">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6  col-md-offset-3">
        <div class="form-group">
            <label>Confirmation email</label>
            <input type="email" class="form-control" name="emailConfirm" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6  col-md-offset-3">
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="pwd" />
        </div>
    </div>
</div>
<!--		<div class="g-recaptcha" data-sitekey="6Lc9szIUAAAAAO4TsVV5zOjmlSwd7Hx9sCYp4EKs"></div>-->
<input type="submit" name="register" class="btn btn-primary" value="Valider" style="margin-top: 10px" />
</div>
</form>
</div>
