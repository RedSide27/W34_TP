<?php
$mysqli = new mysqli('localhost','root','','minewatch');
session_start();
// s'il y a le mot disconnect dans l'url unset($_SESSION{"login"});
// On peur recuperer la variable disconnect dans l'url avec $_GET["disconnect"]
if(isset($_GET["disconnect"])){
    //Detruire une session
    unset($_SESSION["login"]);
    unset($_SESSION["isAdmin"]);
    //redirige l'utilisateur vers l'accueil
    header("Location:index.php?page=accueil");
}

if(!isset($_SESSION["isAdmin"])){
    $_SESSION["isAdmin"] = false;
}

if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = array();
}

if(isset($_GET["delete"])){
    $index = $_GET["delete"];

    unset($_SESSION["cart"][$index]);

    //Reconstruire les indexs
    $_SESSION["cart"] = array_values($_SESSION["cart"]);
    header("location:index.php?page=cart");
}

if (isset($_POST["AddCart"])) {

    $itemExist = false;
	$qty = 1;
    while ($element = each($_POST)) {
        echo $element["key"] . " " . $element["value"];
        if ($element["key"] == "PackID") {
            $productCode = $element["value"];
        }
    }
    //Vérifier si l'article est déjà dans le panier
    for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
        $parts = explode(";", $_SESSION["cart"][$i]);

        if ($productCode == $parts[0]) {
            $itemExist = true;
            $_SESSION["cart"][$i] = $productCode . ";" . $qty += 1;
            break;
        }
    }

    if (!$itemExist) {
        $_SESSION["cart"][] = $productCode . ";" . $qty;
    }
	print_r($_SESSION["cart"]);
}
$loginsuccess = false;
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
            <div style="width: 200px;" class="navbar-header">
                <a class="navbar-brand" href="index.php?page=accueil"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php?page=accueil"><i class="icon-home"></i></a></li>
                    <li><a href="index.php?page=PackSkin">Pack de Skins</a></li>
                    <li><a href="index.php?page=shop">Prochain Skin</a></li>
	                <li><a href="index.php?page=cart">Panier<?="(" . count($_SESSION["cart"]) . ")"?></a></li>
                    <?php
                    if(isset($_SESSION["login"])){
                        if($_SESSION["isAdmin"] == true) {
                            echo '<li><a href="index.php?page=admin">Admin</a></li>';
                        }
                        echo '<li><a href="index.php?page=Account">Mon Account</a></li>';
                        echo '<li><a class="menu" href="index.php?disconnect">Disconnect</a></li>';           
                    }
                    else {
                        ?>
                        <li><a class="menu" href="index.php?page=login">login</a></li>
                        <li><a class="menu" href="index.php?page=register">Register</a></li>
                        
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
        case "accueil" :
            include ("includes/accueil.php");
            break;
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
        case "cart" :
            include ("includes/cart.php");
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
<script src="js/jquery.js"  type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>