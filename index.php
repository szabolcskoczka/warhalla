<?php
require_once("php/init.php");

if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$total_records_per_page = 6;

$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$result_count = mysqli_query(
    $conn,
    "SELECT COUNT(*) As total_records FROM `osszes_termek`"
);

$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;

if (!isset($_GET['sorter'])) {
    $_GET['sorter'] = "position";
}
$OrderBy = "ORDER BY id DESC ";

$result = mysqli_query(
    $conn,
    "SELECT * FROM `osszes_termek` $OrderBy LIMIT $offset, $total_records_per_page"
);
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="Warhalla Cafe Webshop">
    <meta name="descripson"
        content="Vásárolj olcsón a Warhalla webshopjában moddeleket és festékeket - Warhalla webshop">
    <meta name="keywords" content="Warhalla Cafe webshop">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>Warhalla Cafe Webshop</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v=1">
    <link rel="stylesheet" href="css/index_style.css">

    <link rel="icon" type="image/x-icon" href="weblap_kepek/ikon.png">
    <link rel="shortcut icon" type="image/x-icon" href="weblap_kepek/ikon.png">
</head>

<body data-container="body" class="cms-home-4 cms-index-index page-layout-1column layout-1170 wide" aria-busy="false">
    <?php include "lapreszek/header.php"; ?>
    <?php include "lapreszek/fejlec.php"; ?>
    <?php include "lapreszek/koszontes.php"; ?>
    <?php include "lapreszek/navbar.php"; ?>
    <div class="container indexmain">
        <article class="col-12">
            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" id="falig">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../weblap/weblap_kepek/kincsesKamra.jpg" alt="kincsesKamra">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../weblap/weblap_kepek/fest_k_akcio.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../weblap/weblap_kepek/15_slideshow.png" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </article>
        <article>
            <div class="row">
                <div class="container">
                    <div id="leiras">
                        <h2 id="h2index">A Warhalla története</h2>
                        <p>
                            A Warhalla története:
                            A Warhalla Cafe egy kávézó, ahol kézműves söröket, kávé különlegességeket és
                            minőségi
                            ételeket fogyaszthatnak a kedves vendégek, ami mellett lehetőséget adunk
                            többféle
                            társasjáték, és Magyarországon egyedülálló módon a Terepasztalos Stratégiai
                            Társasjátékok űzésére.

                            <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#demo"
                                id="leirasGomg">
                                <img src="weblap_kepek/ikon.png" width="55%" alt="Tovább">
                            </button>

                        <div id="demo" class="collapse">
                            Célunk, hogy összefogjuk az asztali szerepjátékos, cosplay-es, társasjátékos,
                            valamint
                            kiemelten a wargame-es közösséget, és megadja nekik a megfelelő helyet a
                            találkozásokhoz
                            és a hobbi űzéséhez.
                            </p>
                            <p>
                                Ahogy bővült a piac úgy igyekeztünk mi is ellátni vendégink igényeit így
                                boltunkban
                                már kaphatóak a modellek mellett festékek, alapozó sprék és kiegészítők is.
                                Egyszóval minden, ami ahhoz kell, hogy a minijeinket hangulatossá és
                                egyedivé
                                tegyük.
                            </p>
                            <p>
                                Ezen felül játékosainknak tudunk biztosítani a játékhoz kisebb maketteket,
                                tereptárgyakat és base lapokat is, így az összecsapások még jobban
                                átélhetőek
                                legyenek. Ha esetleg még új vagy a hobbiban akkor a kávézónk biztosítani tud
                                neked
                                egy kezdő sereget is ami a katonák mellett tartalmaz néhány hasznos tippet
                                is,
                                hogy
                                megértsd a játék szabályit.
                            </p>
                            <p>
                                A Warhalla Cafe egy kávézó, egy wargame- szerepjátékos bolt, és egy klub
                                kombinációja. Több év játékoktatói, és klubvezetői tapasztalattal a hely
                                alapítói
                                nagyban átlátják, hogy milyen igényeknek kell megfelelni, és nem mellesleg
                                maguk
                                is
                                játékosok. Mondhatnánk azt is, hogy a helyet játékosok tervezték a
                                játékosoknak.
                            </p>
                        </div>
                    </div>
                </div>
                <p></p>
                <p></p>
            </div>
        </article>
        <!--Socel média akkok (youtube, facebook)-->
        <article>
            <div class="col-12">
                <div id="uj">
                    <div>
                        <h1>Legújabb megjelenések</h1>
                    </div>
                    <div id="legfrissebb">
                        <div>
                            <h4>Itt láthatóak a legfrissebb termékeink</h4>
                        </div>
                        <?php if (isset($_GET['sorter']) && $_GET['sorter'] == "position") ?>
                        <ul class="row">
                            <?php
                            if ($result->num_rows > 0):
                                while ($row = $result->fetch_assoc()):
                                    ?>
                                    <li class="item product product-item col-md-2">
                                        <div id="termekTereindex">
                                            <div class="product-item-info" data-container="product-grid">
                                                <div class="product-img-hover ">
                                                    <a href="" class="product photo product-item-photo" tabindex="-1">
                                                        <img class="product-image-photo default_image img-fluid "
                                                            src="webshop_kepek/<?= $row["kep"] ?>.jpg"
                                                            alt=" <?= $row["neve"] ?>">
                                                    </a>
                                                </div>
                                                <div class="product details product-item-details" id="indexadatok">
                                                    <strong class="product name product-item-name indexkep_nev">
                                                        <?php if ($row['tipus'] == 'f') { ?>
                                                            <a href="vasarlo_felulet_festekek.php?id=<?= $row["id"] ?>"
                                                                title="<?= $row["neve"] ?>" class="action tocart">
                                                                <?= $row["neve"] ?>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="vasarlo_felulet_modellek.php?id=<?= $row["id"] ?>"
                                                                title="<?= $row["neve"] ?>" class="action tocart">
                                                                <?= $row["neve"] ?>
                                                            </a>
                                                        <?php } ?>
                                                    </strong>
                                                    <div class="price-box price-final_price " data-role="priceBox">
                                                        <span class="special-price">
                                                            <span class="price-label">Webshop ár:</span>
                                                            <span id="product-price-20310" data-price-amount="">
                                                                <h5 class="price">
                                                                    <?= $row["ar"] ?> Ft
                                                                </h5>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="tocart-form vasarlasGombindex">
                                                    <?php if ($row['tipus'] == 'f') { ?>
                                                        <a href="vasarlo_felulet_festekek.php?id=<?= $row["id"] ?>" title="Vásárlás"
                                                            class="action tocart ">
                                                            Vásárlás
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="vasarlo_felulet_modellek.php?id=<?= $row["id"] ?>" title="Vásárlás"
                                                            class="action tocart">
                                                            Vásárlás
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                endwhile;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <?php include "lapreszek/footer.php"; ?>
    <script src="bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php
require_once("php/close.php");
?>