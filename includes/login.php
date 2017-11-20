<?php

/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 2017-09-30
 * Time: 17:29
 */
$mysqli = new mysqli('localhost','root','','minewatch');
$query = "SELECT * FROM users";
$result = $mysqli->query($query);
$_SESSION["isAdmin"] = false;
/*
if(isset($_POST['login'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        while($row = $result->fetch_asos()) {
            if($_POST['username'] == $row['Username'] && $_POST['password'] == $row['Password']) {
                $_SESSION["login"] = $_POST['username'];
                $loginsuccess = true;
                header("Location:index.php?page=accueil");
            }
        }
    }
}
*/
if(isset($_POST["login"])){
    if(!empty($_POST["username"]) && !empty($_POST["pwd"])) {
        $user = $_POST["username"];
        $pwd = $_POST["pwd"];

        while($row = $result->fetch_assoc()) {
            if($user == $row['Username'] && $pwd == $row['Password']) {

                $_SESSION["login"] = $row["User_ID"];
                $loginsuccess = true;
                if ($row["IsAdmin"] == 1) {
                   $_SESSION["isAdmin"] = true;
                }
                header("Location:index.php?page=accueil");

            }
        }
    }
}

?>



<div class="container" style="margin-top: 100px">
	<div class="box">
		<div class="center gap">
			<h2>Connecter-vous</h2>

    <form method="POST">
        <div class="row" />
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" />
            </div>
        </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="pwd" />
        </div>
    </div>
</div>
<input type="submit" name="login" class="btn btn-primary" value="Log In" />
<div class="row">
    <a href="index.php?page=register">S'enregistrer</a>
    <div>
        <div>If you don't have an account (~.~)</div>
        </form>
    </div>
</div>
</div>
</div>