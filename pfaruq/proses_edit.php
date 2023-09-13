<?php
include("config.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
//ambil data dari form


$nis= $_POST['nis'];
$nama = $_POST['nama'];
$jk = $_POST['jenis_kelamin'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
$bb = $_POST['berat_badan'];
$tb = $_POST['tinggi_badan'];

//buat query update

$sql = "UPDATE t_siswa SET nama='$nama',jenis_kelamin='$jk', no_telp='$no_telp', alamat='$alamat', berat_badan='$bb', tinggi_badan='$tb' WHERE nis= $nis";
$query = mysqli_query($db, $sql) or die(mysqli_error($db));

//apakah update berhasil

if($query) {

//kalau berhasil, alihkan ke halaman index.php dengan status=sukses
header('location:index.php?status=sukses');

//kalau gagal, alihkan ke halaman index.php dengan status = gagal
header('Location:index.php?status=gagal');

}
}else{
die("Akses dilarang...");
}
?>