<?php
require_once("php/init.php");

if (isset($_SESSION['id']) && isset($_SESSION['nev'])) {
    ?>
    <!DOCTYPE html>
    <html lang="hu">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="title" content="Fiók">
        <meta name="descripson"
            content="Vásárolj olcsón a Warhalla webshopjában moddeleket és festékeket - Warhalla webshop">
        <meta name="keywords" content="Fiók">
        <meta name="robots" content="INDEX,FOLLOW">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <title>Fiók</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/felhasznalo.css">

        <link rel="icon" type="image/x-icon" href="weblap_kepek/ikon.png" />
        <link rel="shortcut icon" type="image/x-icon" href="weblap_kepek/ikon.png" />
    </head>

    <body data-container="body" class="cms-home-4 cms-index-index page-layout-1column layout-1170 wide" aria-busy="false">
        <div class="page-wrapper">
            <?php include "lapreszek/header.php"; ?>
            <?php include "lapreszek/fejlec.php"; ?>
            <?php include "lapreszek/koszontes.php"; ?>
            <?php include "lapreszek/navbar.php"; ?>
            <main class="page-main col-12">
                <div class="columns login-container-ter" id="maincontent">
                    <div class="column">
                        <div class="page-title-wrapper ">
                            <h1 class="page-title">
                                <span class="base" data-ui-id="page-title-wrapper">Fiókod</span>
                            </h1>
                        </div>
                        <hr id="hr_style1">
                        <div class="block block-dashboard-info">
                            <div class="block-title">
                                <h2>
                                    <strong>Fiók információk</strong>
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="block-content col-sm-6 col-md-6 col-lg-6 col-xs-12 col-mobile-12">
                                <div class="box box-information">
                                    <strong class="box-title">
                                        <h4>
                                            <span>Fiók adatok</span>
                                        </h4>
                                    </strong>
                                    <br>
                                    <div class="box-content">
                                        <h5>
                                            Neved:
                                            <?php echo $_SESSION['nev']; ?>
                                            <br>
                                            Email címed:
                                            <?php echo $_SESSION['email']; ?>
                                            <br>
                                        </h5>
                                    </div>
                                    <br>
                                    <div class="box-actions">
                                        <a class="action edit" href="">
                                            <span>Szekesztés</span>
                                        </a>
                                        <br>
                                        <a href="" class="action change-password">
                                            Jelszó megváltoztatása
                                        </a>
                                        <br>
                                        <a href="logout.php" class="action logout">
                                            Kijelentkezés
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="box box-newsletter col-sm-6 col-md-6 col-lg-6 col-xs-12 col-mobile-12">
                                <strong class="box-title">
                                    <h4>
                                        <span>Hírlevél</span>
                                    </h4>
                                </strong>
                                <div class="box-content">
                                    <p>
                                        <!--Ide vesszük fel azt ha felhasználó felíratkozott a hírlevelünkre-->
                                        <!-- igen/nem-->
                                    </p>
                                </div>
                                <div class="box-actions">
                                    <a class="action edit" href="">
                                        <span>Szekesztés</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr id="hr_style1">
                        <div class="block-content row">
                            <div class="box box-billing-address col-sm-6 col-md-6 col-lg-6 col-xs-12 col-mobile-12">
                                <strong class="box-title">
                                    <h4>
                                        <span>Számlázási cím</span>
                                    </h4>
                                </strong>
                                <div class="box-content">
                                    <address>
                                        Cím: <!-- Cím-->
                                        <br>
                                        Utca, Házszám <!-- Utca szám-->
                                        <br>
                                        Irányítószám: <!-- irányítószám-->
                                        <br>
                                        Ország:<!-- Ország-->
                                        <br>
                                        Telefonszám:<!-- Telefon-->
                                        <br>
                                    </address>
                                </div>
                                <div class="box-actions">
                                    <a class="action edit" href="" data-ui-id="default-billing-edit-link">
                                        <span>Számlázási cím szerkesztése</span>
                                    </a>
                                </div>
                            </div>
                            <div class="box box-shipping-address col-sm-6 col-md-6 col-lg-6 col-xs-12 col-mobile-12">
                                <strong class="box-title">
                                    <h4>
                                        <span>Szállítási cím</span>
                                    </h4>
                                </strong>
                                <div class="box-content">
                                    <address>
                                        Cím: <!-- Cím-->
                                        <br>
                                        Utca, Házszám <!-- Utca szám-->
                                        <br>
                                        Irányítószám: <!-- irányítószám-->
                                        <br>
                                        Ország:<!-- Ország-->
                                        <br>
                                        Telefonszám:<!-- Telefon-->
                                        <br>
                                    </address>
                                </div>
                                <div class="box-actions">
                                    <a class="action edit" href="" data-ui-id="default-shipping-edit-link">
                                        <span>Szállítási cím szerkesztése</span>
                                    </a>
                                </div>
                            </div>
                        </div>
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
} else {
    header("Location: nem_bejelentkezett.php");
    exit();
}
require_once("php/close.php");
?>