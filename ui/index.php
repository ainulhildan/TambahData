<?php 
include ('config.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <header><h3>Daftar Siswa</h3></header>
    <nav><a href="v_form.php"><button>Tambah Baru</button></a></nav>
    <br>
    <table border="1" cellpadding = "8">
        <thread>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No Telpon</th>
                <th>kelas</th>
                <th>Tindakan</th>
            </tr>
</thread>

<tbody>
    <?php 
    $sql = "SELECT * FROM t_siswa";
    $query = mysqli_query($db,$sql);
    while($siswa = mysqli_fetch_array($query)){
        echo "<tr>";
        echo "<td>".$siswa['nis']."</td>";
        echo "<td>".$siswa['nama_lengkap']."</td>";
        echo "<td>".$siswa['alamat']."</td>";
        echo "<td>".$siswa['jenis_kelamin']."</td>";
        echo "<td>".$siswa['no_telp']."</td>";
        echo "<td>".$siswa['kelas']."</td>";
        echo "<td>";
        echo "<a href = 'form_edit.php?nis=".$siswa['nis']."'>Edit</a> |";
        echo "<a href = 'hapus.php?nis=".$siswa['nis']."'>Hapus</a> |";
    }
    ?>
</tbody>
    </table>
    <p>Total:
        <?php echo mysqli_num_rows($query)?>
    </p>
</body>
</html>