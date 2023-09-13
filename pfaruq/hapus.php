<?php

include("config.php");

if(isset($_GET['id'])){

//ambil nis dari query string

$id = $_GET['id'];

//buat query hapus

$sql = "DELETE FROM t_siswa WHERE id=$id";

$query = mysqli_query($db, $sql) or die(mysqli_error($db));

//apakah query update berhasil?
if($query) {

//kalau berhasil, alihkan ke halaman index.php dengan status-sukses 
header('location:index.php?status=sukses');

}else{

//kalau gagal, alihkan ke halaman index.php dengan status = gagal 
header('Location:index.php?status=gagal');

}

} else {

die("Akses dilarang ...");

}

?>