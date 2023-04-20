<?php
$hiba="";
//új vagy módosítás
if(isset($_POST['btn_save'])){
    $id=(int)$_POST['id'];
    $megnevezes=$_POST['megnevezes'];
    if($id==0){
        $sql="INSERT INTO frakcio (megnevezes) VALUES ('$megnevezes')";
    }
    else{
        $sql="UPDATE frakcio SET megnevezes='$megnevezes' WHERE frakcio_id='$id'";
    }
    mysqli_query($conn,$sql);
    header("Location:index.php?page=".$_POST['page']);
    return;
}
// törlés
if(isset($_POST['del'])){
    $id=(int)$_POST['del'];
    $sql="DELETE FROM frakcio WHERE frakcio_id='$id'";
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
$sql="SELECT * FROM frakcio ORDER BY frakcio_id";
$result = mysqli_query($conn, $sql);
?>
<div>
    <h3 id="cim">Új modell frakció rögzítése</h3>
    <form action="index.php" method="post">
        <input type="hidden" name="page" value="<?=$_REQUEST['page']?>">
        <input type="hidden" name="id" id="id" value=""> 
        Megnevezés:
        <input type="text" name="megnevezes" id="megnevezes" value="" placeholder="Megnezevés" required>
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
            <th class="">Szerkesztés</th>
            <th class="">Törlés</th>
        </tr>
</thead>
<?php
while($row=mysqli_fetch_assoc($result)){
    $edit="szerkeszt('".$row['frakcio_id']."','".$row['megnevezes']."')";
    $del="torol('".$row['frakcio_id']."','".$row['megnevezes']."')";
    echo '
    <tr>
        <td>'.$row['frakcio_id'].'</td>
        <td>'.$row['megnevezes'].'</td>
        <td><button class=" rounded bg-info" onclick="'.$edit.'">Szerkesztés</button></td>
        <td><button class=" rounded bg-danger" onclick="'.$del.'">Törlés</button></td>
    </tr>
    ';
}
?>
</table>

<script>
function szerkeszt(id,megn){
    console.log(id);
    console.log(megn);
    document.getElementById('cim').innerHTML="Festék fajta módosítása";
    document.getElementById('id').value=id;
    document.getElementById('megnevezes').value=megn;
    document.getElementById('megnevezes').focus();
}
function megsem(){
    document.getElementById('cim').innerHTML="Új festék fajta rögzítése";
    document.getElementById('id').value="";
    document.getElementById('megnevezes').value="";
    document.getElementById('megnevezes').focus();
}
function torol(id,megn){
    if(confirm("Biztosan törli: '"+megn+"'")){
        document.getElementById('id_del').value=id;
        document.getElementById('frm_del').submit();
    }
}

</script>