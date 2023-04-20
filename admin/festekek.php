<?php
$hiba="";
//új vagy módosítás
if(isset($_POST['btn_save'])){
    $id=(int)$_POST['id'];
    $neve=$_POST['neve'];
    $fajtaja=$_POST['fajtaja'];
    $felulete=$_POST['felulete'];
    $merete=$_POST['merete'];
    if(isset($_POST["vizre_oldodik"])) $vizre_oldodik=1; else $vizre_oldodik=0;
    if(isset($_POST["higitora_oldodik"])) $higitora_oldodik=1; else $higitora_oldodik=0;
    $ar=$_POST['ar'];
    if(isset($_POST["elerheto"])) $elerheto=1; else $elerheto=0;
    $kep="";
    if($_FILES['kep']['name']!=""){
        if($id!=0){
            $sql="SELECT kep FROM festekek WHERE id='$id'";
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
        $sql="INSERT INTO festekek (neve,fajtaja,felulete,merete,kep,vizre_oldodik,higitora_oldodik,elerheto,ar) VALUES 
        ('$neve','$fajtaja','$felulete','$merete','$kep','$vizre_oldodik','$higitora_oldodik','$elerheto','$ar')";
        //echo $sql;
    }
    else{
        $sql="UPDATE festekek SET neve='$neve',fajtaja='$fajtaja',felulete='$felulete',
        merete='$merete',vizre_oldodik='$vizre_oldodik',higitora_oldodik='$higitora_oldodik',elerheto='$elerheto',ar='$ar'"; 
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
    $sql="SELECT kep FROM festekek WHERE id='$id'";
    $sor=mysqli_fetch_assoc(mysqli_query($conn,$sql));
    $kep=$sor['kep'].".jpg";
    if($kep!="" && file_exists("../webshop_kepek/".$kep)){
        unlink("../webshop_kepek/".$kep);
    }  
    $sql="DELETE FROM festekek WHERE id='$id'";
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
f.id,f.neve,f.fajtaja,f.felulete,f.merete,f.kep,f.vizre_oldodik,f.higitora_oldodik,f.elerheto,f.ar,
ffa.megnevezes AS megnevezes_fajta,
ffe.megnevezes AS megnevezes_felulet,
fm.megnevezes AS megnevezes_meret,
CASE WHEN f.vizre_oldodik=1 THEN 'Igen' ELSE 'Nem' END AS 'vizre',
CASE WHEN f.higitora_oldodik=1 THEN 'Igen' ELSE 'Nem' END AS 'higitora',
CASE WHEN f.elerheto=1 THEN 'Igen' ELSE 'Nem' END AS 'kaphato'
FROM festekek AS f 
INNER JOIN festekek_fajtaja AS ffa ON ffa.fajta_id=f.fajtaja
INNER JOIN festekek_felulete AS ffe ON ffe.felulet_id=f.felulete
INNER JOIN festekek_merete AS fm ON fm.meret_id=f.merete
ORDER BY f.neve";
$result = mysqli_query($conn, $sql);
?>
<div>
    <h3 id="cim">Új festék rögzítése</h3>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="page" value="<?=$_REQUEST['page']?>">
        <input type="hidden" name="id" id="id" value=""> 
        Megnevezés:
        <input type="text" name="neve" id="neve" value="" placeholder="Megnezevés" required>
        Fajta:
        <select name="fajtaja" id="fajtaja" required> 
            <option value="" disabled selected>Válasszon</option>
            <?php
                $sql="SELECT fajta_id, megnevezes FROM festekek_fajtaja ORDER BY megnevezes";
                $sorok=mysqli_query($conn, $sql);
                while ($sor=mysqli_fetch_assoc($sorok)) {
                    if($sor["fajta_id"]==$_POST["fajtaja"]){
                        $sv="selected";
                    }
                    else{
                        $sv="";
                    }
                    echo '<option value="'.$sor["fajta_id"].'" '.$sv.'>'.$sor["megnevezes"].'</option> ';
                }
            ?>
        </select>
        Felület:
        <select name="felulete" id="felulete" required> 
            <option value="" disabled selected>Válasszon</option>
            <?php
                $sql="SELECT felulet_id, megnevezes FROM festekek_felulete ORDER BY megnevezes";
                $sorok=mysqli_query($conn, $sql);
                while ($sor=mysqli_fetch_assoc($sorok)) {
                    if($sor["felulet_id"]==$_POST["felulete"]){
                        $sv="selected";
                    }
                    else{
                        $sv="";
                    }
                    echo '<option value="'.$sor["felulet_id"].'" '.$sv.'>'.$sor["megnevezes"].'</option> ';
                }
            ?>
        </select>
        Méret:
        <select name="merete" id="merete" required> 
            <option value="" disabled selected>Válasszon</option>
            <?php
                $sql="SELECT meret_id, megnevezes FROM festekek_merete ORDER BY megnevezes";
                $sorok=mysqli_query($conn, $sql);
                while ($sor=mysqli_fetch_assoc($sorok)) {
                    if($sor["meret_id"]==$_POST["merete"]){
                        $sv="selected";
                    }
                    else{
                        $sv="";
                    }
                    echo '<option value="'.$sor["meret_id"].'" '.$sv.'>'.$sor["megnevezes"].'</option> ';
                }
            ?>
        </select>
        Kép:
        <input type="file" name="kep" id="kep">
        <label for="vizre_oldodik">Vízzel oldódik:</label>
        <input type="checkbox" name="vizre_oldodik" id="vizre_oldodik" value="1">
        <label for="higitora_oldodik">Higítóval oldódik:</label>
        <input type="checkbox" name="higitora_oldodik" id="higitora_oldodik" value="1">
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
            <th class="">Fajta</th>
            <th class="">Felület</th>
            <th class="">Méret</th>
            <th class="">Kép</th>
            <th class="">Vízzel oldódik</th>
            <th class="">Higítóval oldódik</th>
            <th class="">Ár</th>
            <th class="">Elérhető</th>
            <th class="">Szerkesztés</th>
            <th class="">Törlés</th>
        </tr>
</thead>
<?php
while($row=mysqli_fetch_assoc($result)){
    $edit="szerkeszt('".$row['id']."','".$row['neve']."','".$row['fajtaja']."','".$row['felulete']."','".$row['merete']."',
    '".$row['vizre_oldodik']."','".$row['higitora_oldodik']."','".$row['ar']."','".$row['elerheto']."')"; 
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
        <td>'.$row['megnevezes_fajta'].'</td>
        <td>'.$row['megnevezes_felulet'].'</td>
        <td>'.$row['megnevezes_meret'].'</td>
        <td>'.$img.'</td>
        <td>'.$row['vizre'].'</td>
        <td>'.$row['higitora'].'</td>
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
    document.getElementById('cim').innerHTML="Festék módosítása";
    document.getElementById('id').value=id;
    document.getElementById('neve').value=megn ;
    document.getElementById('fajtaja').value=faj ;
    document.getElementById('felulete').value=fel ;
    document.getElementById('merete').value=mer;
    document.getElementById('vizre_oldodik').checked=viz=='1';
    document.getElementById('higitora_oldodik').checked=hig=='1';
    document.getElementById('ar').value=ar;
    document.getElementById('elerheto').checked=eler=='1';
    document.getElementById('neve').focus();
}
function megsem(){
    document.getElementById('cim').innerHTML="Új festék rögzítése";
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