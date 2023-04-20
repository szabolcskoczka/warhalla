<?php
$hiba="";
//új vagy módosítás
if(isset($_POST['btn_save'])){
    $id=(int)$_POST['id'];
    $neve=$_POST['neve'];
    $jatektipusa=$_POST['jatektipusa'];
    $kategoriaja=$_POST['kategoriaja'];
    $frakcioja=$_POST['frakcioja'];
    $anyaga=$_POST["anyaga"];
    $figura_szama=$_POST['figura_szama'];
    $ar=$_POST['ar'];
    if(isset($_POST["elerheto"])) $elerheto=1; else $elerheto=0;
    $kep="";
    if($_FILES['kep']['name']!=""){
        if($id!=0){
            $sql="SELECT kep FROM modellek WHERE id='$id'";
            $sor=mysqli_fetch_assoc(mysqli_query($conn,$sql));
            $kep=$sor['kep'].".jpg";
            if($kep!="" && file_exists("../webshop_kepek/".$kep)){
                unlink("../webshop_kepek/".$kep);
            }
        }
        $sv=explode(".",$_FILES['kep']['name']);
        $kiterjesztes=$sv[count($sv)-1];
        $kep=date("YmdHis").rand(100,999);
        move_uploaded_file($_FILES['kep']['tmp_name'],"../webshop_kepek/".$kep.".".$kiterjesztes);
    }

    if($id==0){
        $sql="INSERT INTO modellek (neve,jatektipusa,kategoriaja,frakcioja,kep,anyaga,figura_szama,elerheto,ar) VALUES 
        ('$neve','$jatektipusa','$kategoriaja','$frakcioja','$kep','$anyaga','$figura_szama','$elerheto','$ar')";
        //echo $sql;
    }
    else{
        $sql="UPDATE modellek SET neve='$neve',jatektipusa='$jatektipusa',kategoriaja='$kategoriaja',
        frakcioja='$frakcioja',anyaga='$anyaga',figura_szama='$figura_szama',elerheto='$elerheto',ar='$ar'"; 
        if($kep!=""){
            $sql.=",kep='$kep'";
        }
        $sql.=" WHERE id='$id'";
    }
    mysqli_query($conn,$sql);
    header("Location:index.php?page=".$_POST['page']);
    return;
}
// törlés
if(isset($_POST['del'])){
    $id=(int)$_POST['del'];
    $sql="SELECT kep FROM modellek WHERE id='$id'";
    $sor=mysqli_fetch_assoc(mysqli_query($conn,$sql));
    $kep=$sor['kep'].".jpg";
    if($kep!="" && file_exists("../webshop_kepek/".$kep)){
        unlink("../webshop_kepek/".$kep);
    }  
    $sql="DELETE FROM modellek WHERE id='$id'";
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
m.id,m.neve,m.jatektipusa,m.kategoriaja,m.frakcioja,m.kep,m.anyaga,m.figura_szama,m.elerheto,m.ar,
jt.megnevezes AS megnevezes_jatektipus,
k.megnevezes AS megnevezes_kategoria,
f.megnevezes AS megnevezes_frakcio,
a.megnevezes AS megnevezes_anyag,
CASE WHEN m.elerheto=1 THEN 'Igen' ELSE 'Nem' END AS 'kaphato'
FROM modellek AS m 
INNER JOIN jatek_tipusa AS jt ON jt.tipus_id=m.jatektipusa
INNER JOIN modell_kategoriaja AS k ON k.kategoria_id=m.kategoriaja
INNER JOIN frakcio AS f ON f.frakcio_id=m.frakcioja
INNER JOIN modell_anyaga AS a ON a.anyag_id=m.anyaga
ORDER BY m.neve"; 
$result = mysqli_query($conn, $sql);
?>
<div>
    <h3 id="cim">Új modell rögzítése</h3>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="page" value="<?=$_REQUEST['page']?>">
        <input type="hidden" name="id" id="id" value=""> 
        Megnevezés:
        <input type="text" name="neve" id="neve" value="" placeholder="Megnezevés" required>
        Játék típus:
        <select name="jatektipusa" id="jatektipusa" required> 
            <option value="" disabled selected>Válasszon</option>
            <?php
                $sql="SELECT tipus_id, megnevezes FROM jatek_tipusa ORDER BY megnevezes";
                $sorok=mysqli_query($conn, $sql);
                while ($sor=mysqli_fetch_assoc($sorok)) {
                    if($sor["tipus_id"]==$_POST["jatektipusa"]){
                        $sv="selected";
                    }
                    else{
                        $sv="";
                    }
                    echo '<option value="'.$sor["tipus_id"].'" '.$sv.'>'.$sor["megnevezes"].'</option> ';
                }
            ?>
        </select>
        Kategória:
        <select name="kategoriaja" id="kategoriaja" required> 
            <option value="" disabled selected>Válasszon</option>
            <?php
                $sql="SELECT kategoria_id, megnevezes FROM modell_kategoriaja ORDER BY megnevezes";
                $sorok=mysqli_query($conn, $sql);
                while ($sor=mysqli_fetch_assoc($sorok)) {
                    if($sor["kategoria_id"]==$_POST["kategoriaja"]){
                        $sv="selected";
                    }
                    else{
                        $sv="";
                    }
                    echo '<option value="'.$sor["kategoria_id"].'" '.$sv.'>'.$sor["megnevezes"].'</option> ';
                }
            ?>
        </select>
        Frakció:
        <select name="frakcioja" id="frakcioja" required> 
            <option value="" disabled selected>Válasszon</option>
            <?php
                $sql="SELECT frakcio_id, megnevezes FROM frakcio ORDER BY megnevezes";
                $sorok=mysqli_query($conn, $sql);
                while ($sor=mysqli_fetch_assoc($sorok)) {
                    if($sor["frakcio_id"]==$_POST["frakcioja"]){
                        $sv="selected";
                    }
                    else{
                        $sv="";
                    }
                    echo '<option value="'.$sor["frakcio_id"].'" '.$sv.'>'.$sor["megnevezes"].'</option> ';
                }
            ?>
        </select>
        Kép:
        <input type="file" name="kep" id="kep">
        Anyaga:
        <select name="anyaga" id="anyaga" required> 
            <option value="" disabled selected>Válasszon</option>
            <?php
                $sql="SELECT anyag_id, megnevezes FROM modell_anyaga ORDER BY megnevezes";
                $sorok=mysqli_query($conn, $sql);
                while ($sor=mysqli_fetch_assoc($sorok)) {
                    if($sor["anyag_id"]==$_POST["anyaga"]){
                        $sv="selected";
                    }
                    else{
                        $sv="";
                    }
                    echo '<option value="'.$sor["anyag_id"].'" '.$sv.'>'.$sor["megnevezes"].'</option> ';
                }
            ?>
        </select>
        Figurák száma:
        <input type="number" name="figura_szama" id="figura_szamar" value="" placeholder="Figurák száma" required>
        Ár:
        <input type="number" name="ar" id="ar" value="" placeholder="Ár" required>
        <label for="elerheto">Elérhető:</label>
        <input type="checkbox" name="elerheto" id="elerheto" value="1">

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
            <th class="">Megnevezés</th>
            <th class="">Játék típus</th>
            <th class="">Kategória</th>
            <th class="">Frakció</th>
            <th class="">Kép</th>
            <th class="">Anyag</th>
            <th class="">Figura szám</th>
            <th class="">Ár</th>
            <th class="">Elérhető</th>
            <th class="">Szerkesztés</th>
            <th class="">Törlés</th>
        </tr>
</thead>
<?php
while($row=mysqli_fetch_assoc($result)){
    $edit="szerkeszt('".$row['id']."','".$row['neve']."','".$row['jatektipusa']."','".$row['kategoriaja']."','".$row['frakcioja']."',
    '".$row['anyaga']."','".$row['figura_szama']."','".$row['ar']."','".$row['elerheto']."')"; 
    $del="torol('".$row['id']."','".$row['neve']."')";
    if(file_exists("../webshop_kepek/".$row["kep"].".jpg")){
        $img='<img class="kep" src="'."../webshop_kepek/".$row["kep"].".jpg".'">';
    }
    else{
        $img="";
    }
    echo '
    <tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['neve'].'</td>
        <td>'.$row['megnevezes_jatektipus'].'</td>
        <td>'.$row['megnevezes_kategoria'].'</td>
        <td>'.$row['megnevezes_frakcio'].'</td>
        <td>'.$img.'</td>
        <td>'.$row['megnevezes_anyag'].'</td>
        <td>'.$row['figura_szama'].'</td>
        <td>'.number_format($row['ar'],0,',',' ').' Ft</td>
        <td>'.$row['kaphato'].'</td>
        <td><button class=" rounded bg-info" onclick="'.$edit.'">Szerkesztés</button></td>
        <td><button class=" rounded bg-danger" onclick="'.$del.'">Törlés</button></td>
    </tr>
    ';
}
?>
</table>

<script>
function szerkeszt(id,megn,faj,fel,mer,viz,hig,ar,eler){
    document.getElementById('cim').innerHTML="Modell módosítása";
    document.getElementById('id').value=id;
    document.getElementById('neve').value=megn ;
    document.getElementById('jatektipusa').value=faj ;
    document.getElementById('kategoriaja').value=fel ;
    document.getElementById('frakcioja').value=mer;
    document.getElementById('anyaga').checked=viz=='1';
    document.getElementById('figura_szama').checked=hig=='1';
    document.getElementById('ar').value=ar;
    document.getElementById('elerheto').checked=eler=='1';
    document.getElementById('neve').focus();
}
function megsem(){
    document.getElementById('cim').innerHTML="Új modellek rögzítése";
    document.getElementById('id').value="";
    document.getElementById('neve').value="";
    document.getElementById('neve').focus();
}
function torol(id,megn){
    if(confirm("Biztosan törli: '"+megn+"'")){
        document.getElementById('id_del').value=id;
        document.getElementById('frm_del').submit();
    }
}

</script>