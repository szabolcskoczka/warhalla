<?php
require_once("php/init.php");

if (isset($_POST['email']) && isset($_POST['felha_password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $felha_email = validate($_POST['email']);
    $felha_password = validate($_POST['felha_password']);

    if (empty($felha_email)) {
        header("Location: customer_login.php?error=Az Email cím megadása szükséges!");
    } else if (empty($felha_password)) {
        header("Location: customer_login.php?error=A Jelszó megadása szükséges!");
    } else {
        $sql = "SELECT * FROM `felhasznalok` WHERE email='$felha_email' AND jelszo='$felha_password'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) { //eljut eddig
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $felha_email && $row['jelszo'] === $felha_password) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['nev'] = $row['nev'];
                $_SESSION['id'] = $row['id'];
                $felhasznalo_id = $_SESSION['id'];

                $result = mysqli_query(
                    $conn,
                    "SELECT id FROM kosar k WHERE k.felhasznalo_id='$felhasznalo_id'"
                );

                $kosar = $result->fetch_row();
                $_SESSION['kosar_id'] = $kosar[0];
                /*print_r( $_SESSION);
                print_r( $kosar); 
                hibakeresés*/

                header("Location: account.php"); // A felhasználót átviszi a fiókjába
            } else {
                header("Location: customer_login.php?error=Hibás Felhasználónév vagy Jelszó! (kis-, nagybetű eltérés)");
            }
        } else {
            header("Location: customer_login.php?error=A Felhasználónév nem található vagy hibás  aJelszó!");
        }
    }
} else {
    header("Location: customer_login.php");
}
require_once("php/close.php");