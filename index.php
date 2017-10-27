<?php

session_start();
// s'il y a le mot disconnect dans l'url unset($_SESSION{"login"});
// On peur recuperer la variable disconnect dans l'url avec $_GET["disconnect"]
if(isset($_GET["disconnect"])){
    //Detruire une session
    unset($_SESSION["login"]);
    //redirige l'utilisateur vers l'accueil
    header("Location:index.php?page=accueil");
}
$loginsuccess = false;
if(isset($_POST["login"])){
    if(!empty($_POST["username"]) && !empty($_POST["pwd"])) {
        $user = $_POST["username"];
        $pwd = $_POST["pwd"];
        $fichier = fopen("users.txt", "r");

        while ($ligne = fgets($fichier)) {
            $mot = explode(";", $ligne);

            if ($user == $mot[0] && $pwd  == $mot[1]) {
                $_SESSION["login"] = $user;
                $loginsuccess = true;
                header("Location:index.php?page=accueil");
            }
        }
        fclose($fichier);
    }
}
if(isset($_POST["register"])){
    if(!empty($_POST["username"]) && !empty($_POST["pwd"])) {
        $user = $_POST["username"];
        $pwd = $_POST["pwd"];
        $fichier = fopen("users.txt", "a+");
        $copy = fopen("users.txt", "r");

        while ($ligne = fgets($copy)) {
            $mot = explode(";", $ligne);
            if ($user == $mot[0]) {
                $present = true;
            }
        }

        if ($present == false) {
            fwrite($fichier,"\n");
            fwrite($fichier,$user);
            fwrite($fichier, ";" . $pwd . ";");
            header("Location:index.php?page=login");
        }else{
            echo "<h1>tu suck</h1>";
        }

        fclose($fichier);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>DuppOBApp</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
<header id="header" role="banner">
    <div class="container">
        <div id="navbar" class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?page=accueil"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php?page=accueil"><i class="icon-home"></i></a></li>
                    <li><a href="index.php?page=PackSkin">Pack de Skins</a></li>
                    <li><a href="index.php?page=shop">Prochain Skin</a></li>
                    <?php
                    if(isset($_SESSION["login"])){
                        echo '<li><a class="menu" href="index.php?disconnect">Disconnect</a></li>';
                    }
                    else {
                        ?>
                        <li><a class="menu" href="index.php?page=login">login</a></li>
                        <li><a class="menu" href="index.php?page=register">Register</a></li>
                        <li><a href="index.php?page=admin">Admin</a></li>
                        <li><a href="index.php?page=Account">Mon Account</a></li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</header><!--/#header-->

<?php
if(isset($_GET["page"])){
    $page = $_GET["page"];
    switch ($page) {
        case "shop" :
            include ("includes/shop.php");
            break;
        case "PackSkin" :
            include ("includes/PackSkin.php");
            break;
        case "login" :
            include ("includes/login.php");
            break;
        case "register" :
            include ("includes/register.php");
            break;
        case "Account" :
            include ("includes/Account.php");
            break;
        case "admin" :
            include ("includes/admin.php");
            break;
        default:
            include  ("includes/accueil.php");
            break;
    }
}
else
    include  ("includes/accueil.php");
?>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2017 <a target="_blank" title="CopyRight">Ob&Dup</a>. All Rights Reserved.
            </div>
        </div>
    </div>
</footer><!--/#footer-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>