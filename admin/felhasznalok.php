<?php
$hiba="";
//új vagy módosítás
if(isset($_POST['btn_save'])){
    $id=(int)$_POST['id'];
    $nev=$_POST['nev'];
    $email=$_POST['email'];
    $jelszo=$_POST['jelszo'];

    if($id==0){
        $sql="INSERT INTO felhasznalok (nev,email,jelszo) VALUES 
        ('$nev','$email','$jelszo')";
        //echo $sql;
    }
    else{
        $sql="UPDATE felhasznalok SET nev='$nev',email='$email',jelszo='$jelszo'"; 
        $sql.=" WHERE id='$id'";
    }
    mysqli_query($conn,$sql);
    header("Location:index.php?page=".$_POST['page']);
    return;
}
// törlés
if(isset($_POST['del'])){
    $id=(int)$_POST['del'];
    $sql="DELETE FROM felhasznalok WHERE id='$id'";
    try{
        mysqli_query($conn,$sql);
        header("Location:index.php?page=".$_POST['page']);
        return;
    }
    catch(Exception $err){
        $hiba="Nem törölhető, mert más elem használja ezt az elemet!";
        $_SESSION['hiba']=$hiba;
    }    
}

//listázás
$sql="SELECT
f.id,f.nev,f.email,f.jelszo
FROM felhasznalok AS f
ORDER BY f.nev";
$result = mysqli_query($conn, $sql);
?>
<div>
    <h3 id="cim">Új Felhasználó rögzítése</h3>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="page" value="<?=$_REQUEST['page']?>">
        <input type="hidden" name="id" id="id" value=""> 
        Felhasználónév:
        <input type="text" name="nev" id="nev" value="" placeholder="Felhasználónév" required>
        Email:
        <input type="text" name="email" id="email" value="" placeholder="Email" required>
        Jelszó:
        <input type="text" name="jelszo" id="jelszo" value="" placeholder="Jelszó" required>
        <input type="submit" name="btn_save" class="rounded bg-success" value="Ment">
        <input type="button" value="Mégsem" class="rounded bg-warning" onclick="megsem()">
    </form>
    <form action="index.php" method="post" id="frm_del">
        <input type="hidden" name="page" value="<?=$_REQUEST['page']?>">
        <input type="hidden" name="del" id="id_del" value="">  
    </form>
</div>
<br>
<?php
    if(isset($_SESSION['hiba']) && $_SESSION['hiba']!=""){
        echo'<div class="text-danger">'.$_SESSION['hiba'].'</div>';
        unset($_SESSION['hiba']);
    }
?>
<table class="table">
    <thead class="thead-dark">
        <tr class="">
            <th class="">Azonosító</th>
            <th class="">Felhasználónév</th>
            <th class="">Email</th>
            <th class="">Jelszó</th>
            <th class="">Szerkesztés</th>
            <th class="">Törlés</th>
        </tr>
</thead>
<?php
while($row=mysqli_fetch_assoc($result)){
    $edit="szerkeszt('".$row['id']."','".$row['nev']."','".$row['email']."','".$row['jelszo']."')"; 
    $del="torol('".$row['id']."','".$row['nev']."')";
   
    echo '
    <tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['nev'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['jelszo'].'</td>
        <td><button class=" rounded bg-info" onclick="'.$edit.'">Szerkesztés</button></td>
        <td><button class=" rounded bg-danger" onclick="'.$del.'">Törlés</button></td>
    </tr>
    ';
}
?>
</table>

<script>
function szerkeszt(id,felh,ema,jel){
    document.getElementById('cim').innerHTML="Felhasználók módosítása";
    document.getElementById('id').value=id;
    document.getElementById('nev').value=felh;
    document.getElementById('email').value=ema;
    document.getElementById('jelszo').value=jel;
    document.getElementById('nev').focus();
}
function megsem(){
    document.getElementById('cim').innerHTML="Új felhasználó rögzítése";
    document.getElementById('id').value="";
    document.getElementById('nev').value="";
    document.getElementById('nev').focus();
}
function torol(id,felh){
    if(confirm("Biztosan törli: '"+felh+"'")){
        document.getElementById('id_del').value=id;
        document.getElementById('frm_del').submit();
    }
}

</script>