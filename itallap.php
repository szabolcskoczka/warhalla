<?php
require_once("php/init.php");
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="itallap">
    <meta name="descripson"
        content="Vásárolj olcsón a Warhalla webshopjában moddeleket és festékeket - Warhalla webshop">
    <meta name="keywords" content="Italaink">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>Warhallla Itallap</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/toolbar.css">
    <link rel="stylesheet" href="css/itallap.css">

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
                    <span class="base" data-ui-id="page-title-wrapper">Itallapunk</span>
                </h1>
                <h5>
                    A csaták között minden vezérnek szüksége van egy kevés pihenésre! <br>
                    Ha győzelemre vezetted a seregedet csillapítsd a szomjadat egy frissítő itallal!
                </h5>
            </div>
            <div class="columns">
                <div class="column main">
                    <ol id="italok_hattere">
                        <li class="row" id="italter">
                            <div class="col-md-4">
                                <img class="product-image-photo default_image img-fluid" src="italok/triplakill.jpg"
                                    alt="Tripla kill">
                            </div>
                            <div class="col-md-8">
                                <h3 id="italCim">
                                    Tripla kill
                                </h3>
                                <div id="leiras">
                                    Legismertebb akciónk a 3 koponyás shot. A kristály koponyák élénkkék színében
                                    tündöklő koponyák szerencsét hoznak már ha képes vagy meginni őket egyszerre. Nincs
                                    nagyobb dicsőség, mint ha egyszerre három
                                    ellenfelet intézel el egy magad!
                                    <br>
                                    <br>
                                    <strong>Összetevők:</strong>
                                    <br>
                                    Vodka, Blue Curacao, Gin, Citrom
                                </div>
                            </div>
                        </li>
                        <li class="row" id="italter">
                            <div class="col-md-8">
                                <h3 id="italCim">
                                    Stamina Potion
                                </h3>
                                <div id="leiras">
                                    Ha úgy érzed, hogy a folyamatos harc elfárasztót ez a varázsital majd segít rajtad.
                                    Ettől az italtól pillanatok alatt felélénkülsz és folytathatod a viadalt
                                    sorozatidat. Töltsd fel magadat a mágia erejével. Zöld tehát természetes.
                                    <br>
                                    <br>
                                    <strong>Összetevők:</strong>
                                    <br>
                                    Fanta, Vodka, Blue Curacao
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img class="product-image-photo default_image img-fluid" src="italok/Stamina_Potion.jpg"
                                    alt="Stamina Potion">
                            </div>
                        </li>
                        <li class="row" id="italter">
                            <div class="col-md-4">
                                <img class="product-image-photo default_image img-fluid" src="italok/kávé.png"
                                    alt="Wood elf Cafe">
                            </div>
                            <div class="col-md-8">
                                <h3 id="italCim">
                                    Wood elf Cafe
                                </h3>
                                <div id="leiras">
                                    Ahhoz, hogy olyan friss és üde legyél, mint egy erdei elf fontos, hogy jól indítsd a
                                    napot! Erre szolgál a kávézónk különleges Wood elf kávéja. Ez a kávé különlegesség
                                    100% természetes növényi anyagok felhasználásával készült és még az izé is nagyon
                                    finom. A nyilai garantáltan célba találnak annak, akinek szeme mindig éberen figyel.
                                    <br>
                                    <br>
                                    <strong>Összetevők:</strong>
                                    <br>
                                    Pörkölt olasz kávé, Szójatej, Méz, Kakaó
                                </div>
                            </div>
                        </li>
                        <li class="row" id="italter">
                            <div class="col-md-8">
                                <h3 id="italCim">
                                    Pox Watcher
                                </h3>
                                <div id="leiras">
                                    Aki a káosz istenek légiójába lép számoljon azzal, hogy az ajándékuk nem marad el
                                    jutalmukként. Nurgle apó fiai szívesen fogyasztják a jóféle sört még akkor is, ha az
                                    italban gyakran az előző követők maradványai úszkálnak. Aki ilyen nedűt akar inni
                                    annak jobb lesz, ha mindig odafigyel, hogy mit töltöttek a kupájába.
                                    <br>Ez a 2 az 1-ben finomság külön-külön vagy akár egyben is fogyasztható!
                                    <br>
                                    <br>
                                    <strong>Összetevők:</strong>
                                    <br>
                                    Korsó: Alma, Fanta, Vodka <br>
                                    Koponya: Blue Curacao, Gin, Tonic
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img class="product-image-photo default_image img-fluid" src="italok/pox_Watcher.jpg"
                                    alt="Pox Watcher">
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </main>
    </div>
    <?php include "lapreszek/footer.php"; ?>
    <script src="bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php
require_once("php/close.php");