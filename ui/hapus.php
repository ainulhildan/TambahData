<?php 
include("config.php");
if(isset($_GET['nis'])){
    // ambil mis dari query string
    $nis = $_GET['nis'];
    // membuat query hapus
    $sql = "DELETE FROM t_siswa WHERE nis=$nis";
    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
    // apakah query update berhasil?
    if($query){
        // kakalu berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location:index.php?status=sukses');
    } else{
        // kalau gagal alihkan ke halaman index.html dengan status=gagal
        header('Location:index.php?status=gagal');
    }
} else {
    die("Akses Dilarang...");
}

?>