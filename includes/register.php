<?php


//
//require('recaptcha/autoload.php');
//if (isset($_POST['register'])){
//    if(isset($_POST['g-recaptcha-reponse'])) {
//        $recaptcha = new \ReCaptcha\ReCaptcha('6Lc9szIUAAAAAHszBfx2H8N35y9G0au5TJx_qKgm');
//        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
//        if ($resp->isSuccess()) {
//            echo"Captchat Valide";
//        } else {
//            $errors = $resp->getErrorCodes();
//        }
//    }
//    else {
//    }
//}


    if (isset($_POST['register'])) {
        $secretKey = "6Lc9szIUAAAAAHszBfx2H8N35y9G0au5TJx_qKgm";
        $responseKey = $_POST['g-recaptcha-response'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ($response->success)
            header("Location:index.php?page=accueil");
        else
            header("Location:index.php?page=login");
    }

?>
<head>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<div class="container" style="margin-top: 100px">
	<div class="box">
	<div class="center gap">
		<h2>Inscrivez-vous</h2>

		<form method="POST" action="index.php">
        <h1>Pas de compte ? Pas de problème ! Juste a remplir ce formulaire !</h1>
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
            <label>Email</label>
            <input type="text" class="form-control" name="email" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6  col-md-offset-3">
        <div class="form-group">
            <label>Confirmation email</label>
            <input type="text" class="form-control" name="emailConfirm" />
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
		<div class="row">
			<center><div class="g-recaptcha" data-sitekey="6Lc9szIUAAAAAO4TsVV5zOjmlSwd7Hx9sCYp4EKs" style="margin-top: 10px"></div></center>
			</form>
		</div>
<input type="submit" name="register" class="btn btn-primary" value="Valider" style="margin-top: 10px" />
</div>
</div>