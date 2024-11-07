<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "../koneksi.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $kode_barang=input($_POST["kode_barang"]);
        $nama_barang=input($_POST["nama_barang"]);
        $kode_supplier=input($_POST["kode_supplier"]);
        $tgl_masuk=input($_POST["tgl_masuk"]);
        $jumlah_barang=input($_POST["jumlah_barang"]);
        $prices=input($_POST["prices"]);     

        //Query input menginput data kedalam tabel anggota
        $sql="INSERT INTO barang (kode_barang, nama_barang, kode_supplier, tgl_masuk, jumlah_barang, prices) VALUES
		('$kode_barang','$nama_barang','$kode_supplier', ,'$tgl_masuk', '$jumlah_barang', '$prices')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo mysqli_error($kon);
        }
    }
    ?>
    <h2>Input Data Barang</h2><br>
    <a href="../barang/index.php" class="btn btn-success">Kembali</a><br><br>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        
        <div class="form-group">
            <label>Kode Barang :</label>
            <input type="text" name="kode_barang" class="form-control" placeholder="Masukan Kode Barang" required/>
        </div>
        <div class="form-group">
            <label>Nama Barang :</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Masukan Nama Barang" required/>
        </div>
        <div class="form-group">
            <label>Kode Supplier :</label>
            <input type="text" name="kode_supplier" class="form-control" placeholder="Masukan Kode Supplier" required/>
        </div>
        <div class="form-group">
            <label for="tgl_masuk">Tanggal Masuk :</label>
            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
        </div>
        <div class="form-group">
            <label>Jumlah Barang :</label>
            <input type="text" name="jumlah_barang" class="form-control" placeholder="Masukan Jumlah Barang" required/>
        </div>
        <div class="form-group">
            <label>Prices :</label>
            <input type="text" name="prices" class="form-control" placeholder="Masukan Harganya" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon> Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>