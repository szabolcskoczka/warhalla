<?php
require_once("php/init.php");
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="Modellek">
    <meta name="descripson"
        content="Vásárolj olcsón a Warhalla webshopjában moddeleket és festékeket - Warhalla webshop">
    <meta name="keywords" content="Modellek">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>Elfelejtetted a jelszavadat?</title>
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
        <main class="page-main">
            <div class="columns">
                <div class="column maincontent">
                    <div class="forgot-container">
                        <div class="page-title-wrapper">
                            <h1 class="page-title">
                                <span class="base" data-ui-id="page-title-wrapper">Elfelejtetted a jelszavad?</span>
                            </h1>
                        </div>
                        <br>
                        <div class="hibak">
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error">
                                    <?php echo $_GET['error']; ?>
                                </p>
                            <?php } ?>
                            <br>
                        </div>
                        <form class="password forget" action="jelszo_visszaallit.php" method="post" id="form-validate"
                            novalidate="novalidate">
                            <fieldset class="fieldset" data-hasrequired="* Kötelező mezők">
                                <div class="field note">
                                    Kérem adja meg a felhasználónevét.
                                </div>
                                <div class="field nev required">
                                    <div class="control">
                                        <input type="text" class="input-text" name="felha_nev" title="Felhasználó név"
                                            value data-validate="{required:true, 'validate-email':true}"
                                            aria-required="true" placeholder="Felhasználó név...">
                                    </div>
                                </div>
                                <div class="field note">
                                    Kérem adja meg az e-mail címét.
                                </div>
                                <div class="field email required">
                                    <div class="control">
                                        <input type="email" name="email" title="Email cím" class="input-text" value
                                            placeholder="Email cím..."
                                            data-validate="{required:true, 'validate-email':true}" aria-required="true">
                                    </div>
                                </div>
                                <br>
                                <div class="field note">
                                    <h4>
                                        Kérem adja meg az új jelszót.
                                    </h4>
                                </div>
                                <div class="field Új jelszó required">
                                    <div class="control">
                                        <input type="password" name="uj_jelszo" title="Új jelszó" class="input-text"
                                            value placeholder="Új jelszó"
                                            data-validate="{required:true, 'validate-email':true}" aria-required="true">
                                    </div>
                                </div>
                                <div class="actions-toolbar">
                                    <div class="primary">
                                        <button type="submit" class="action submit primary">
                                            <span>Új jelszó mentése</span>
                                        </button>
                                    </div>
                                    <br>
                                    <div class="secondary">
                                        <a class="action back" href="index.php">
                                            <span>Vissza</span>
                                        </a>
                                    </div>
                                </div>
                            </fieldset>
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