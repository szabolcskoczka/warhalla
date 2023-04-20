<?php
require_once("php/init.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 1;

$result = mysqli_query(
    $conn,
    "SELECT f.*, faj.megnevezes AS megnev_faj, fel.megnevezes AS megnev_fel, mer.megnevezes AS megnev_mer
    FROM festekek AS f
    INNER JOIN festekek_fajtaja AS faj ON faj.fajta_id =f.fajtaja
    INNER JOIN festekek_felulete AS fel ON fel.felulet_id = f.felulete
    INNER JOIN festekek_merete AS mer ON mer.meret_id = f.merete
    WHERE f.id='$id'"
);

$kosarba_helyezett_db = 0;
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="Festékek">
    <meta name="descripson"
        content="Vásárolj olcsón a Warhalla webshopjában moddeleket és festékeket - Warhalla webshop">
    <meta name="keywords" content="Festekek">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>Warhalla</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/js.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/vasarlo_felulet.css">

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
            <a id="contentarea" tabindex="-1"></a>
            <div class="columns">
                <div class="column main">
                    <div id="termekekTere" class="row">
                        <?php
                        if ($result->num_rows > 0):
                            while ($row = $result->fetch_assoc()):
                                ?>
                                <div class=" col-sm-8 col-md-8 col-lg-8">
                                    <div id="termekTere">
                                        <center>
                                            <img class="product-image-photo kepek" src="webshop_kepek/<?= $row["kep"] ?>.jpg"
                                                alt=" <?= $row["neve"] ?>">
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div id="termekStatisztikaTere">
                                        <div>
                                            <h5 id="statisztikak">
                                                A termék neve:
                                                <strong>
                                                    <?= $row["neve"] ?>
                                                </strong>
                                            </h5>
                                            <h5 id="statisztikak">
                                                A festék fatája:
                                                <strong>
                                                    <?= $row["megnev_faj"] ?>
                                                </strong>
                                            </h5>
                                            <h5 id="statisztikak">
                                                A festék
                                                <strong>
                                                    <?= $row["megnev_fel"] ?>
                                                </strong>
                                                felületekre használható
                                            </h5>
                                            <h5 id="statisztikak">
                                                A festék
                                                <strong>
                                                    <?= $row["megnev_mer"] ?>
                                                </strong>
                                                méretű
                                            </h5>
                                            <h5 id="statisztikak">
                                                Ez a festéket
                                                <strong>
                                                    <?= $row["vizre_oldodik"] ? "Oldja" : "Nem oldja" ?>
                                                </strong>
                                                a víz!
                                            </h5>
                                            <h5 id="statisztikak">
                                                Ez a festéket
                                                <strong>
                                                    <?= $row["higitora_oldodik"] ? "Oldja" : "Nem oldja" ?>
                                                </strong>
                                                a higító!
                                            </h5>
                                            <h5 id="statisztikak">
                                                Ez a festék jelenleg:
                                                <strong>
                                                    <?= $row["elerheto"] ? "Elérhető" : "Nem elérhető" ?>
                                                </strong>
                                            </h5>
                                            <h5 id="statisztikak">
                                                A festek ára:
                                                <strong>
                                                    <?= $row["ar"] ?>
                                                </strong>
                                                forint
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="#leirasGomg">
                                        <div class="tocart-form">
                                            <?php if ($row["elerheto"] == 1) { ?>
                                                <?php if (isset($_SESSION['id'])) { ?>
                                                    <form data-role="tocart-form" action="kosarba_helyez.php" method="post">
                                                        <input type="hidden" name="tipus" value="f">
                                                        <input type="hidden" name="termek_id" value="<?php echo $id; ?>">
                                                        <input type="hidden" name="mennyiseg" value="1">
                                                        <button id="kosarba" type="submit" title="Kosárba"
                                                            class="action tocart primary">
                                                            Kosárba
                                                        </button>
                                                    </form>
                                                <?php } else { ?>
                                                    <form data-role="tocart-form" action="nem_bejelentkezett.php" method="GET">
                                                        <button id="kosarba" type="submit" title="Kosárba"
                                                            class="action tocart primary">
                                                            Kosárba
                                                        </button>
                                                    </form>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <button id="kosarba" type="submit" title="Kosárba" value="Kosárba"
                                                    onclick="nem_elerheto()">
                                                    Kosárba
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        ?>
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
    function nem_elerheto() {
        alert("A termék jelenleg nem elérhető! \nKérlek próbáld meg később");
    };
</script>
<?php
require_once("php/close.php");