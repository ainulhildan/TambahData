<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if the nis already exists in the database
    $id = $_POST['id'];
    $existingQuery = mysqli_query($db, "SELECT id FROM t_siswa WHERE id = '$id'");
    
    if (mysqli_num_rows($existingQuery) > 0) {
        // Handle duplicate 'nis' value
        header('Location: index.php?status=duplicate');
    } else {
        // Continue with the insert query
        $id = $_POST['id'];
        $nis= $_POST['nis'];
        $nama = $_POST['nama'];
        $jk = $_POST['jenis_kelamin'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        $bb = $_POST['berat_badan'];
        $tb = $_POST['tinggi_badan'];

        $sql = "INSERT INTO t_siswa(nis,id,  nama, jenis_kelamin, no_telp, alamat,  berat_badan, tinggi_badan)
        VALUES('$nis','$id','$nama','$jk','$no_telp','$alamat','$bb','$tb')";
        
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));

        if ($query) {
            header('Location: index.php?status=sukses');
        } else {
            header('Location: index.php?status=gagal');
        }
    }
} else {
    die("Akses dilarang ...");
}

?>