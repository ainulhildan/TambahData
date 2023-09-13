<?php
include("config.php");
if (isset($_GET['id'])){
    $title = "Edit";
    $url = 'proses_edit.php';
    $id = $_GET['id'];
    // buat query untuk ambil data dari database
    $sql = "SELECT * FROM t_siswa WHERE id = $id";
    $query = mysqli_query($db, $sql);
    $siswa = mysqli_fetch_assoc($query);
    // jika data yang diedit tidak ditemukan
    if (mysqli_num_rows($query) < 1){
        die("Data tidak ditemukan!!");
    }// url jika diedit data
}else{
    $title = "Add";
        // url jika ditambah data
    $url ='proses_edit.php';
}
?>
<html>
    <head>
        <title>Formulir Siswa</title>
        <body>
            <header><h3>Formulir Siswa</h3></header>
            <form action="proses_edit.php" method="POST">
                <fieldset>
                    <legend><h2>Form Siswa</h2></legend>
                    <div>
                        <label for='nis'>nis: </label><br>
                        <input type="text" name="nis" value="<?php if(isset($_GET['id']))
                        { echo $siswa['nis'];}?>"/>
                    </div>
                    <div>
                        <label for='nama'>Nama: </label><br>
                        <input type="text" name="nama" value="<?php if (isset($_GET['id']))
                        { echo $siswa['nama'];}?>"/>
                    </div>
                    <div>
                        <label for="jenis_kelamin">Jenis kelamin: </label><br>
                        <?php if(isset($_GET['id'])){$jk = $siswa['jenis_kelamin'];?>
                        <td>
                        <input name="jenis_kelamin" type="radio" value="Laki-Laki"
                        <?php if($jk=='Laki-Laki'){echo 'checked';}?>>Laki-Laki
                        <input name="jenis_kelamin" type="radio" value="perempuan"
                        <?php if($jk=='perempuan'){echo 'checked';}?>>Perempuan                            
                        </td>
                        <?php }else{ ?>
                            <td><br>
                            <input name="jenis_kelamin" type="radio" value="Laki-Laki">Laki-Laki
                            <input name="jenis_kelamin" type="radio" value="Perempuan">Perempuan
                        </td>
                        <?php } ?>
                    </div>
                    <div>
                        <label for="no_telp">No Telepon: </label><br>
                        <input type="text" name="no_telp" value="<?php if(isset($_GET['id']))
                        { echo $siswa['no_telp']; } ?>"/>
                    </div>
                    <div>
                        <label for="alamat">Alamat: </label><br>
                        <textarea name="alamat" rows="5"> <?php if (isset($_GET['id']))
                        {echo $siswa['alamat'];}?></textarea>
                    </div>

                    <div>
                        <label for="berat_badan">Berat Badan: </label><br>
                        <input type="text" name="berat_badan" value="<?php if(isset($_GET['id']))
                        { echo $siswa['berat_badan']; } ?>"/>
                    </div>
                    <div>
                        <label for="tinggi_badan">Tinggi Badan: </label><br>
                        <input type="text" name="tinggi_badan" value="<?php if(isset($_GET['id']))
                        { echo $siswa['tinggi_badan']; } ?>"/>
                    </div>
                    <hr>
                    <div>
                        <input type="submit" value="Simpan" name="Simpan"/>
                    </div>
                </fieldset>
            </form>
        </body>
    </head>
</html>