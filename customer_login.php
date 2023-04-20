<?php
require_once("php/init.php");
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="kosár">
    <meta name="descripson"
        content="Vásárolj olcsón a Warhalla webshopjában moddeleket és festékeket - Warhalla webshop">
    <meta name="keywords" content="kosár">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>Login</title>
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
        <?php include "lapreszek/navbar.php"; ?>
        <main class="page-main col-12">
            <div id="columns">
                <div class="column">
                    <div class="login-container-ter row">
                        <div class="col-sm-6 col-lg-6 col-xs-12 col-mobile-12">
                            <div class="block block-customer-login block-customer-style">
                                <div class="block-title">
                                    <strong id="block-customer-login-heading" role="heading" aria-level="2">
                                        Regisztrált felhasználók
                                    </strong>
                                </div>
                                <div class="block-content" aria-labelledby="block-customer-login-heading">
                                    <form class="form form-login" action="login.php" method="post" id="login-form"
                                        novalidate="novalidate">
                                        <fieldset class="fieldset login" data-hasrequired="* Kötelező mezők">
                                            <div class="field note">
                                                Ha van regisztrált fiókod, akkor jelentkezz be az email címeddel!
                                            </div>
                                            <br>
                                            <?php if (isset($_GET["registration"]) && $_GET["registration"] == "success"): ?>
                                                <div class="alert alert-dark" role="alert">
                                                    Sikeresen be lettél regisztrálva. Kérlek jelentkezz be.
                                                </div>
                                            <?php endif; ?>
                                            <div class="hibak">
                                                <?php if (isset($_GET['error'])) { ?>
                                                    <p class="error">
                                                        <?php echo $_GET['error']; ?>
                                                    </p>
                                                <?php } ?>
                                                <br>
                                            </div>
                                            <div class="field email required">
                                                <label class="label" for="email">
                                                    <span>E-mail</span>
                                                </label>
                                                <div class="control">
                                                    <input type="email" class="input-text" title="email" name="email"
                                                        id="email"
                                                        data-validate="{required:true, 'validate-email':true}"
                                                        aria-required="true" value autocomplete="off"
                                                        placeholder="Ide írd be az email címedet..">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="field password required">
                                                <label for="felha_password" class="label">
                                                    <span>Jelszó</span>
                                                </label>
                                                <div class="control">
                                                    <input type="password" class="input-text" title="jelszo"
                                                        id="felha_password" name="felha_password"
                                                        data-validate="{required:true}" aria-required="true"
                                                        autocomplete="off" placeholder="Ide írd be az jelszavadat..">
                                                </div>
                                            </div>
                                            <div id="felhaszbelepo-control">
                                                <div class="actions-toolbar row">
                                                    <div class="primary col-sm-6 col-lg-6 col-xs-12 col-mobile-12">
                                                        <button type="submit" class="action login primary" name="send"
                                                            id="send2">
                                                            <span>Belépés</span>
                                                        </button>
                                                        <input type="reset" class="action login primary">
                                                    </div>
                                                    <div class="secondary col-sm-6 col-lg-6 col-xs-12 col-mobile-12">
                                                        <a class="action remind login-forgot-szoveg"
                                                            href="forgotpassword.php">
                                                            <span>Elfelejtetted a jelszavad?</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xs-12 col-mobile-12">
                            <div class="block block-new-customer block-customer-style">
                                <div class="block-title">
                                    <strong id="block-new-customer-heading" role="heading" aria-level="2">
                                        Új felhasználók
                                    </strong>
                                </div>
                                <div class="block-content" aria-labelledby="block-new-customer-heading">
                                    <p>Készítsd el a saját fiókodat, hogy gyorsabban vásárolhass!</p>
                                    <div class="actions-toolbar">
                                        <div class="primary">
                                            <a href="create.php" class="action create primary">
                                                <span>Fiók létrehozása</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
require_once("php/close.php");