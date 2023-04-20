<?php
require_once("php/init.php");

if (isset($_POST['keresesGomb'])) { // sikerült
    function validate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $keresett = mysqli_real_escape_string($conn, $_POST['kereses']);
    echo $keresett; //eljut eddig
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $sql = "SELECT * FROM `osszes_termek` WHERE neve LIKE '%$keresett;%' ";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

    echo "Enni elemet talált: ".$queryResults." !";

    if ($queryResults > 0) { 
        while ($row = mysqli_fetch_assoc($result)){
            echo $row['id'];
            echo $row['neve'];
            echo $row['kep'];
            echo $row['ar'];
            echo $row['tipus'];
        }
        /*if ($row['email'] === $felha_email && $row['jelszo'] === $felha_password) {
             echo " hello";
            $_SESSION['email'] = $row['email'];
            $_SESSION['nev'] = $row['nev'];
            $_SESSION['id'] = $row['id'];
            // A felhasználót átviszi a fiókjába
            exit();
        }
        else {
            echo "hiba2";
        }*/
    } else {
        echo "nem találni ilyen elemet!";
    }
}

require_once("php/close.php");
