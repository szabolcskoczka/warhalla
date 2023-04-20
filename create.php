<?php
require_once("php/init.php");
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="Fiók készítés">
    <meta name="descripson"
        content="Vásárolj olcsón a Warhalla webshopjában moddeleket és festékeket - Warhalla webshop">
    <meta name="keywords" content="Fiók készítés">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>Fiók készítés</title>
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
            <div class="columns">
                <div class="column maincontent">
                    <div class="login-container-ter" id="szoveg_szin">
                        <div class="page-title-wrapper">
                            <a id="contentarea" tabindex="-1"></a>
                            <h1 class="page-title">
                                <span class="base" data-ui-id="page-title-wrapper">Új felhasználó létrehozása</span>
                            </h1>
                        </div>
                        <hr id="hr_style1">
                        <form class="create-account" action="uj_felha_connect.php" method="post" autocomplete="off"
                            novalidate="novalidate">
                            <fieldset class="fieldset create info">
                                <legend class="legend">
                                    <span>Személyes Adatok</span>
                                </legend>
                                <hr>
                                <div class="field name required">
                                    <label for="name">
                                        <span>Kérem adja meg a nevét:</span>
                                    </label>
                                    <div class="control">
                                        <input type="text" id="name" name="name" value title="név"
                                            class="input-text required-entry" data-validate="{required:true}"
                                            autocomplete="off" aria-required="true">
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <br>
                            <fieldset class="fieldset create account" data-hasrequired="* Kötelező mezők">
                                <legend class="legend">
                                    <span>Bejelentkezési Adatok</span>
                                </legend>
                                <hr>
                                <div class="field required">
                                    <label for="email">
                                        <span>E-mail cím</span>
                                    </label>
                                    <div class="control">
                                        <input type="email" name="email" autocomplete="email" id="email" value
                                            title="E-mail" class="input-text"
                                            data-validate="{required:true, 'validate-email':true}" aria-required="true">
                                    </div>
                                </div>
                                <br>
                                <div class="field password required">
                                    <label for="password">
                                        <span>Jelszó</span>
                                    </label>
                                    <div class="control">
                                        <input type="password" name="password" id="password" title="Jelszó"
                                            class="input-text" data-password-min-length="8"
                                            data-password-min-character-sets="3"
                                            data-validate="{required:true, 'validate-customer-password':true}"
                                            autocomplete="off" aria-required="true">
                                    </div>
                                </div>
                                <br>
                                <div class="field confirmation required">
                                    <label for="password-confirmation">
                                        <span>Jelszó Megerősítése</span>
                                    </label>
                                    <div class="control">
                                        <input type="password" name="password_confirmation" title="Jelszó Megerősítése"
                                            id="password-confirmation" class="input-text"
                                            data-validate="{required:true, equalTo:'#password'}" autocomplete="off"
                                            aria-required="true">
                                    </div>
                                </div>
                            </fieldset>
                            <hr>
                            <br>
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error">
                                    <?php echo $_GET['error']; ?>
                                <p>
                                <?php } ?>
                            <div class="actions-toolbar">
                                <br>
                                <div class="primary">
                                    <button type="submit" name="letrehoz" class="action submit primary"
                                        title="Fiók létrehozása">
                                        <span>Fiók létrehozása</span>
                                    </button>
                                    <input type="reset" class="action login primary">
                                </div>
                                <br>
                                <div class="secondary">
                                    <a class="action back" href="index.php">
                                        <span>Vissza a főoldalra</span>
                                    </a>
                                </div>
                            </div>
                        </form>
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