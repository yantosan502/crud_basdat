<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
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
    if (isset($_GET['kode_pelanggan'])) {
        $kode_pelanggan=input($_GET['kode_pelanggan']);

        $sql="SELECT * FROM pelanggan WHERE kode_pelanggan='$kode_pelanggan'";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_array($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $kode_barang=htmlspecialchars($_POST["kode_pelanggan"]);
        $nama_barang=htmlspecialchars($_POST["kode_barang"]);

        //Query update data pada tabel anggota
        $sql="UPDATE pelanggan SET
            kode_barang='$kode_barang'
            WHERE kode_pelanggan='$kode_pelanggan'";

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
    <h2>Update Data Pelanggan</h2>
    <a href="../pelanggan/index.php" class="btn btn-success">Kembali</a><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Kode Barang :</label>
            <input type="text" name="kode_barang" class="form-control" value="<?php echo $data['kode_barang']; ?>" placeholder="Masukan Kode Barang" required />
        </div>

        <input type="hidden" name="kode_pelanggan" value="<?php echo $data['kode_pelanggan']; ?>" />

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon>Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>