<?php
require_once("php/init.php");
require_once("php/cart.php");

$kosar_id = $_SESSION['kosar_id'];
$felha_nev = $_SESSION['nev'];
$email = $_SESSION['email'];

$cart= new Cart($conn);
$result = $cart->getCartContent($kosar_id);


$table = '<table>';
$table .='<tr>  <th>Termék neve</th> <th>Részösszeg</th> <th>Mennyiség</th>  </tr>';
while ($row = $result->fetch_assoc()){
    $table .= '<tr><td>'.$row["neve"].'</td> <td>'.$row["ar"].' Ft</td> <td>'.$row["mennyiseg"].'</td></tr>';
}
$table .='<tr>  <th> </th> <th>Végösszeg</th> <th><strong>'.$_POST["ossz_ar"].' Ft</strong></th>  </tr>';
$table .= '</table>';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    //a kosár adatit 
    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;

    $mail->Username = 'warhallaasztalfoglalas@gmail.com'; //Gamil cím kezedése
    $mail->Password = 'phuoyjmhtaqjlqic'; //a Gmail cím 'App pasword'-je

    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('warhallaasztalfoglalas@gmail.com'); //Gamil cím adat kezdése 
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = $_POST["subject"];
   
    $mail->Body =
        'Kedves,'.$felha_nev.'
    <hr>
    A megrendelésedből a lentebb felsorolt termékek érkeztek meg hozzánk. Hamarosan feldolgozzuk és megrendeljük számodra. Ha a megrendelésed készen áll értesíteni fogunk róla, hogy mihamarabb át tud venni!
    Ha bármilyen kérdésed lenne, akkor bátran tedd fel nekünk az warhallaasztalfoglalas@gmail.com email címen, vagy a következő telefonszámon: Telefon: +36 30 937 8215<br>
    '.$table.'
    <br><br>
    Itt nincs vége!<br>
    1.	Kedveld a Facebook oldalunkat, hogy ne maradj le a legfrissebb híreinkről és akcióinkról!<br>
    2.	Gyere el a klubba és szerezz barátokat!<br>
    3.	Csatlakozz a Warhalla Kávézó Játékos Kereső Facebook csoportjához, hogy mindig találj magadnak játékostársat!<br>
    4.	Vegyél részt a rendezvényeinken!<br>
    5.	Legyél te is a Warhalla állandó lakosa!    <br>
    ';

    //$mail->SMTPDebug  = 1; Debug ellenörzés

    $ok = $mail->send();

    //email küldés sikeres? 
    if ($ok) {
        print("sdafdsadfsadf");
        echo "
            <script>
            alert('Az elküldés sikeres vol!
            Vásárolj nálunk máskor is :)');
            document.location.href = 'send.php';
            </script>
        ";
        $cart->emptyCart($kosar_id);
    } else {
        echo "
        <script>
        alert('Valami hiba történt!
        Kérjük próbálja meg újra!');
        document.location.href = 'send.php';
        </script>
        ";
    }
} else {
    echo "hiba";
}