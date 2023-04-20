<?php
require_once("php/init.php");

if (isset($_POST['email']) && isset($_POST['felha_nev'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $felha_email = validate($_POST['email']);
    $felha_nev = validate($_POST['felha_nev']);
    $uj_jelszo = validate($_POST['uj_jelszo']);

    if (empty($felha_email)) {
        header("Location: forgotpassword.php?error=Kérlek add meg az email címed!");
    } else if (empty($felha_nev)) {
        header("Location: forgotpassword.php?error=Kérlek add meg a felhasználó nevedet!");
    } else {
        $sql = "SELECT * FROM `felhasznalok` WHERE nev='$felha_nev' AND email='$felha_email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) { 
            //eljut eddig
            $row = mysqli_fetch_assoc($result);
            if ($row['nev'] === $felha_nev && $row['email'] === $felha_email) {
                echo"itt ";
                $_SESSION['email'] = $row['email'];
                $_SESSION['nev'] = $row['nev'];
                $_SESSION['id'] = $row['id'];
                //header("Location: customer_login.php"); //
            }
        } else {
            header("Location: forgotpassword.php?error=Hibás Felhasználónév vagy Jelszó!");
        }
    }
} else {
    header("Location: forgotpassword.php");
}
require_once("php/close.php");
