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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['kode_barang'])) {
        $kode_barang=input($_GET['kode_barang']);

        $sql="SELECT * FROM barang WHERE kode_barang='$kode_barang'";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_array($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $kode_barang=htmlspecialchars($_POST["kode_barang"]);
        $nama_barang=htmlspecialchars($_POST["nama_barang"]);
        $kode_supplier=htmlspecialchars($_POST["kode_supplier"]);
        $tgl_masuk=input($_POST["tgl_masuk"]);
        $jumlah_barang=htmlspecialchars($_POST["jumlah_barang"]);
        $prices=htmlspecialchars($_POST["prices"]);
        
        //Query update data pada tabel anggota
        $sql="UPDATE barang SET
            nama_barang='$nama_barang',
            kode_supplier='$kode_supplier',
            tgl_masuk='$tgl_masuk',
            jumlah_barang='$jumlah_barang',
            prices='$prices'
            WHERE kode_barang='$kode_barang'";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";
        }
    }
    ?>
    <h2>Update Data Barang</h2><br>
    <a href="../barang/index.php" class="btn btn-success">Kembali</a><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Barang :</label>
            <input type="text" name="nama_barang" class="form-control" value="<?php echo $data['nama_barang']; ?>" placeholder="Masukan Kode Barang" required />
        </div>
        <div class="form-group">
            <label>Kode Supplier :</label>
            <input type="text" name="kode_supplier" class="form-control" value="<?php echo $data['kode_supplier']; ?>" placeholder="Masukan Nama Barang" required />
        </div>
        <div class="form-group">
            <label for="tgl_masuk">Tanggal masuk :</label>
            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
        </div>
        <div class="form-group">
            <label>Jumlah Barang :</label>
            <input type="text" name="jumlah_barang" class="form-control" value="<?php echo $data['jumlah_barang']; ?>" placeholder="Masukan Kode Supplier" required />
        </div>
        <div class="form-group">
            <label>Prices</label>
            <input type="text" name="prices" class="form-control" value="<?php echo $data['price']; ?>" placeholder="Masukkan Harganya" required />
        </div>

        <input type="hidden" name="kode_barang" value="<?php echo $data['kode_barang']; ?>" />

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon>Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>