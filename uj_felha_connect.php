<?php
require_once("php/init.php");

$nev = $_POST['name'];
$email = $_POST['email'];
$jelszo = $_POST['password'];
$jelszo_meger = $_POST['password_confirmation'];

if (isset($_POST['letrehoz'])) {
    //eljut eddig
    if (empty($nev)) {
        header("Location: create.php?error=A név megadása szükséges!");
    } else if (empty($email)) {
        header("Location: create.php?error=Az email cím megadása szükséges!");
    } else if (empty($jelszo)) {
        header("Location: create.php?error=A jelszó megadása szükséges!");
    } else if (empty($jelszo_meger)) {
        header("Location: create.php?error=Kérem erősítse meg a jelszót!");
    } else {
        if ($jelszo === $jelszo_meger) {
            $felha_adatok = $conn->prepare("INSERT INTO felhasznalok(nev, email, jelszo) VALUES(?, ?, ?)");
            $felha_adatok->bind_param("sss", $nev, $email, $jelszo);
            $felha_adatok->execute();
            //echo "sikeres regisztráció!";//siker!
            $felhasznalo_id = $felha_adatok->insert_id;
            $felha_adatok->close();

            $felha_adatok = $conn->prepare("INSERT INTO kosar (felhasznalo_id) VALUES(?)");
            $felha_adatok->bind_param("s", $felhasznalo_id);
            $felha_adatok->execute();
            $felha_adatok->close();

            require_once("php/close.php");
            header("Location: customer_login.php?registration=success");
        } else {
            header("Location: create.php?error=A megadott jelszó nem egyezik!");
        }
    }
} else {
    header("Location: create.php");
}
require_once("php/close.php");