<?php include("inc_header.php") ?>
<h1 class="text-center">Halaman Admin</h1>
<?php
$kataKunci = (isset($_GET['KataKunci'])) ? $_GET['KataKunci'] : "";
?>
<p>
    <a href="halaman_input.php">
        <input type="button" class="btn btn-primary" value="Buat Halaman Baru" />
    </a>
</p>
<form class="row g-3" method="get">
<div class="col-auto">
    <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="kataKunci"
        value="<?php echo isset($kataKunci) ? htmlspecialchars($kataKunci) : '' ?>" />
</div>
<div class="col-auto">
    <input type="submit" name="cari" value="Cari" class="btn btn-secondary" />
</div>

</form>
<table class="table table strippe">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th>Judul</th>
            <th>Kutipan</th>
            <th class="col-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
   $sqlTambahan = "";
   if($kataKunci != ''){
       $arrayKataKunci = explode(" ",$kataKunci);
       for($i = 0; $i < count ($arrayKataKunci); $i++){
           $sqlCari[] = "(judul like '%".$arrayKataKunci[$i]."%' or kutipan like '%".$arrayKataKunci[$i]."%' or isi like '%".$arrayKataKunci[$i]."%')";
       }
       $sqlTambahan = " where ".implode(" or ", $sqlCari);
   }
   
    $sql1 = "SELECT * FROM homepage $sqlTambahan ORDER BY id DESC";
    $q1 = mysqli_query($Koneksi, $sql1);
    $nomor = 1;
    while ($r1 = mysqli_fetch_array($q1)) {
?>
    <tr>
        <td><?php echo $nomor++ ?></td>
        <td><?php echo $r1['judul'] ?></td>
        <td><?php echo $r1['kutipan'] ?></td>
        <td>
            <span class="badge bg-warning text-dark">Edit</span>
            <span class="badge bg-danger">Delete</span>
        </td>
    </tr>
<?php
    }
?>
    </tbody>
</table>
<?php include("inc_footer.php") ?>