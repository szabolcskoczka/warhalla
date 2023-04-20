<?php
require_once("php/init.php");
require_once("php/cart.php");

if (!isset($_SESSION['id'])) {
    header("Location: nem_bejelentkezett.php");
}

$kosar_id = $_SESSION['kosar_id'];

$cart = new Cart($conn);
$result = $cart->getCartContent($kosar_id);
//echo $kosar_id; 
$ossz_ar = 0;
$szamlalo = 0;
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
    <title>Kosár</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/kosar.css">

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
            <div class="columns">
                <div class="column" id="termekekTere">
                    <div class="page-title-wrapper">
                        <h1 class="page-title">
                            <span class="base" data-ui-id="page-title-wrapper">Kosarad</span>
                        </h1>
                    </div>
                    <div class="block block-dashboard-info">
                        <div class="block-title">
                            <strong>Itt láthatóka a kiválasztott termékeid:</strong>
                            <br>
                        </div>
                    </div>
                    <ol class="products list items product-items">
                        <?php
                        /*echo $kosar_id; 1
                        print_r($_SESSION); Array ( [email] => demo [nev] => Hovanecz Máté [id] => 1 [kosar_id] => 1 )
                        */
                        if ($result->num_rows > 0):
                            while ($row = $result->fetch_assoc()):
                                ?>
                                <li class="item product product-item">
                                    <div id="termekTere" class="row">
                                        <div class="vl col-sm-1 col-md-1 col-lg-1 " id="termekNeve">
                                            <?php $szamlalo += 1 ?>
                                            <h4 id="felulalulJobbra">
                                                <?= $szamlalo ?>
                                                #
                                            </h4>
                                        </div>
                                        <div class="vl col-sm-1 col-md-1 col-lg-1" id="termekNeve">
                                            <?php
                                            if ($row['tipus'] == 'f') {
                                                ?>
                                                <a href="festekek.php" lass="action" id="termekNeve">
                                                    Festék
                                                </a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="modellek.php" class="action" id="termekNeve">
                                                    Modell
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="vl col-sm-5 col-md-5 col-lg-5">
                                            <h4 id="termekNeve">
                                                <p class="kozepre" id="szoveg_style">
                                                    <?= $row["neve"] ?>
                                                </p>
                                            </h4>
                                        </div>
                                        <div class="vl col-sm-1 col-md-1 col-lg-1">
                                            <div class="product-item-info" data-container="product-grid">
                                                <div class="product-img-hover">
                                                    <img class="product-image-photo default_image img-fluid kosar_kepek"
                                                        src="webshop_kepek/<?= $row["kep"] ?>.jpg" alt="<?= $row["neve"] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vl col-sm-2 col-md-2 col-lg-2">
                                            <div class="product details product-item-details">
                                                <div class="price-box price-final_price" data-role="priceBox">
                                                    <h4 class="price jobbra" id="termekNeve">
                                                        <?= $row["ar"] ?> Ft
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-2 col-lg-2 kozepre row">
                                            <label for="quantity" id="kosar_mennyi">
                                                Darab:
                                            </label>
                                            <span>
                                                <input class='number-wrapper' type="number" name="mennyi" min="0" step="1"
                                                    value="<?= $row["mennyiseg"] ?>">
                                            </span>
                                        </div>
                                    </div>
                                    <?php $ossz_ar += $row["ar"] ?>
                                </li>
                                <?php
                            endwhile;
                        endif;
                        ?>
                    </ol>
                </div>
                <div class="column row" id="VegzetTer">
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <h3 id="felulalulJobbra">
                            A kiválasztott termékeinek összesített értéke:
                            <?= $ossz_ar ?>
                            Forint
                        </h3>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <button id="torles" type="submit" name="send" title="A teljes kosár kiürítése."
                            onclick="fiok_torol()">
                            Kosár törlése
                        </button>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <form action="send.php" method="post">
                            <input type="hidden" name="subject" value="Új megrendelés">
                            <input type="hidden" name="ossz_ar" value="<?= $ossz_ar ?>">
                            <button id="megrendeles" type="submit" name="send" title="A termékek megrendelése.">
                                Megrendelés
                            </button>
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
<script>
    function fiok_torol() {
        alert("A termék törlésre kerültek a kosardból!");
        <?php //$cart->emptyCart($kosar_id); ?>
    };              //Ha Lenyomjuk az F5-öt törli a fiókot*/ 
</script>
<?php
require_once("php/close.php");