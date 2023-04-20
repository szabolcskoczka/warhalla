<?php
require_once("php/init.php");


print_r($_SESSION); //Array ( [email] => hovaneczm@gmail.com [nev] => Hovanecz Máté [id] => 1 )
print_r($_POST); //Array ( [tipus] => f [termek_id] => 11 [mennyiseg] => 1 )


$felhasznalo_id = $_SESSION['id'];
$ter_tip = $_POST['tipus'];
$ter_id = $_POST['termek_id'];
$ter_menny = $_POST['mennyiseg']; //megvan

//echo "itt"; //eljut eddig

if (isset($_POST['tipus']) && isset($_POST['termek_id']) && isset($_POST['mennyiseg'])) {
    $felhasznalo_id = $_SESSION['id'];
    $ter_tip = $_POST['tipus'];
    $ter_id = $_POST['termek_id'];
    $ter_menny = $_POST['mennyiseg'];
    $kosar_id = $_SESSION['kosar_id'];
    //eljut eddig

    /*print_r($row);
    echo $kosar_id;*///müködik
    $query = "INSERT INTO kosar_termekek (kosar_id,tipus,termek_id,mennyiseg) values ($kosar_id,'$ter_tip',$ter_id,$ter_menny)";
    $conn->query($query);

    if ($ter_tip == 'f') {
        header("Location: vasarlo_felulet_festekek.php?id=$ter_id");//vasarolt=success
    } elseif ($ter_tip == 'm') {
        header("Location: vasarlo_felulet_modellek.php?id=$ter_id");
    } else {
        echo "hiba";
        exit();
    }
} else {
    echo "hiba";
}

require_once("php/close.php");