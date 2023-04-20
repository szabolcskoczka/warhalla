<?php
require_once("php/init.php");
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="Nem vagy bejelentkezve">
    <meta name="descripson"
        content="Vásárolj olcsón a Warhalla webshopjában moddeleket és festékeket - Warhalla webshop">
    <meta name="keywords" content="Nem vagy bejelentkezve">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>Nem vagy bejelentkezve</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/felhasznalo.css">

    <link rel="icon" type="image/x-icon" href="weblap_kepek/ikon.png">
    <link rel="shortcut icon" type="image/x-icon" href="weblap_kepek/ikon.png">
</head>

<body data-container="body" class="cms-home-4 cms-index-index page-layout-1column layout-1170 wide" aria-busy="false">
    <div class="page-wrapper">
        <?php include "lapreszek/header.php"; ?>
        <?php include "lapreszek/fejlec.php"; ?>
        <?php include "lapreszek/koszontes.php"; ?>
        <?php include "lapreszek/navbar.php"; ?>
        <main id="maincontent" class="page-main">
            <div class="login-container-ter" id="minden_kozepre">
                <div id="szoveg_arnyek">
                    <p>
                        Nem vagy bejelentkezve!
                    </p>
                </div>
                <div id="szoveg_arnyek">
                    <h1>
                        Kérlek jelentkezz be az oldalra!
                    </h1>
                </div>
                <div>
                    <h4 id="szoveg_arnyek2">
                        <a href="customer_login.php">
                            Bejelentkezés
                        </a>
                    </h4>
                </div>
            </div>
        </main>
        <?php include "lapreszek/footer.php"; ?>
    </div>
    <script src="bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php
require_once("php/close.php");