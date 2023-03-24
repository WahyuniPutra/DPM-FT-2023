<?php include("inc_header.php") ?>
<?php
$Judul = "";
$Kutipan = "";
$Isi = "";
$error = "";
$sukses = "";

if(isset($_POST['simpan'])){
    $Judul = $_POST['Judul'];
    $Isi = $_POST['Isi'];
    $Kutipan = $_POST['Kutipan'];
    $error = '';
    $sukses = '';

    if($Judul == '' or $Isi == ''){
        $error = "Silahkan Input Judul dan Isi";
    }

    if(empty($error)){
        $sql1 = "INSERT INTO homepage (Judul, Kutipan, Isi) values ('$Judul','$Kutipan','$Isi')";
        $q1   = mysqli_query($Koneksi, $sql1);

        if($q1){
            $sukses = "Berhasil Memasukkan Data";
        }else{
            $error = "Gagal Memasukkan Data";
        }
    }
}


?>
<h1>Admin Input Data</h1>
<div class="mb-3 row">
    <a href="homepage.php">Kembali Ke Menu Admin</a>
</div>
<?php
if (isset($error) && $error != '') {
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
    <?php
}
if (isset($sukses) && $sukses != '') {
    ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses; ?>
    </div>
    <?php
}
?>

<form action="" method="post">
    <div class="mb-3 row">
        <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="Judul" value="<?php echo $Judul ?>" name="Judul">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Kutipan" class="col-sm-2 col-form-label">Kutipan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="Kutipan" value="<?php echo $Kutipan ?>" name="Kutipan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Isi" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <textarea name="Isi" class="form-control" id="summernote"><?php echo $Isi ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
        </div>
    </div>
</form>
<?php include("inc_footer.php") ?>