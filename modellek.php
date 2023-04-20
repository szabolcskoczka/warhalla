<?php
require_once("php/init.php");

if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$total_records_per_page = 9;

$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$result_count = mysqli_query(
    $conn,
    "SELECT COUNT(*) As total_records FROM `modellek`"
);
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;

if (!isset($_GET['sorter'])) {
    $_GET['sorter'] = "position";
}
$OrderBy = "ORDER BY id DESC ";
switch ($_GET['sorter']) {
    case "name":
        $OrderBy = "ORDER BY neve ";
        break;
    case "price":
        $OrderBy = "ORDER BY ar ";
        break;
    case "jt":
        $OrderBy = "ORDER BY jatektipusa ";
        break;
}

$result = mysqli_query(
    $conn,
    "SELECT * FROM `modellek` $OrderBy LIMIT $offset, $total_records_per_page"
);
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
    <title>Modellek</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/toolbar.css">
    <link rel="stylesheet" href="css/webshop.css">


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
            <div class="page-title-wrapper category-description">
                <h1 class="page-title" id="page-title-heading " aria-labelledby="page-title-heading toolbar-amount">
                    <span class="base" data-ui-id="page-title-wrapper">Modellek</span>
                </h1>
                <h5>
                    A terepasztalok főszereplői az apró modollek akiket mesteri taktikádal győzelembe vezethetsz!
                </h5>
            </div>
            <div class="columns">
                <div class="column main">
                    <div class="products wrapper grid products-grid">
                        <?php include "toolbar/modell_toolbar.php"; ?>
                        <ol class="products list items product-items row" id="termekekTere">
                            <?php
                            if ($result->num_rows > 0):
                                while ($row = $result->fetch_assoc()):
                                    ?>
                                    <li class="item product product-item col-md-4">
                                        <div id="termekTere">
                                            <div class="product-item-info" data-container="product-grid">
                                                <div class="product-img-hover">
                                                    <a href="" class="product photo product-item-photo" tabindex="-1">
                                                        <img class="product-image-photo default_image img-fluid kepek"
                                                            src="webshop_kepek/<?= $row["kep"] ?>.jpg"
                                                            alt=" <?= $row["neve"] ?>">
                                                    </a>
                                                </div>
                                                <div class="product details product-item-details">
                                                    <strong class="product name product-item-name">
                                                        <h4 id="termekNeve">
                                                            <a class="product-item-link"
                                                                href="vasarlo_felulet_modellek.php?id=<?= $row["id"] ?>">
                                                                <?= $row["neve"] ?>
                                                            </a>
                                                        </h4>
                                                    </strong>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="price-box price-final_price col-sm-6 col-md-6 col-lg-6"
                                                                data-role="priceBox">
                                                                <span class="special-price">
                                                                    <span class="price-label">Webshop ár:</span>
                                                                    <span>
                                                                        <h5 class="price">
                                                                            <?= $row["ar"] ?> Ft
                                                                        </h5>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="tocart-form col-sm-6 col-md-6 col-lg-6">
                                                                <a href="vasarlo_felulet_modellek.php?id=<?= $row["id"] ?>"
                                                                    id="vasarlas" title="Vásárlás" class="action tocart">
                                                                    Vásárlás
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                endwhile;
                            endif;
                            ?>
                        </ol>
                        <?php include "toolbar/modell_toolbar.php"; ?>
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