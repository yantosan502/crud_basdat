<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
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

        $kode_supplier=input($_POST["kode_supplier"]);
        $nama_supplier=input($_POST["nama_supplier"]);
        $lokasi=input($_POST["lokasi"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into supplier (kode_supplier, nama_supplier, lokasi) values
		('$kode_supplier','$nama_supplier','$lokasi')";

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
    <h2>Input Data Supplier</h2>
    <a href="../supplier/index.php" class="btn btn-success">Kembali</a><br><br>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">       
        <div class="form-group">
            <label>Kode Supplier :</label>
            <input type="text" name="kode_supplier" class="form-control" placeholder="Masukan Kode Supplier" required/>
        </div>
        <div class="form-group">
            <label>Nama Supplier :</label>
            <input type="text" name="nama_supplier" class="form-control" placeholder="Masukan Nama Supplier" required/>
        </div>
        <div class="form-group">
            <label>Lokasi :</label>
            <input type="text" name="lokasi" class="form-control" placeholder="Masukan Lokasi Supplier" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon> Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>