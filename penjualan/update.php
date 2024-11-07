<!DOCTYPE html>
<html>
<head>
    <title>Data Penjualan</title>
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
    if (isset($_GET['kode_penjualan'])) {
        $kode_penjualan=input($_GET['kode_penjualan']);

        $sql="SELECT * FROM penjualan WHERE kode_penjualan='$kode_penjualan'";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_array($hasil);
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $kode_penjualan=htmlspecialchars($_POST["kode_penjualan"]);
        $kode_barang=htmlspecialchars($_POST["kode_barang"]);
        $kode_pelanggan=htmlspecialchars($_POST["kode_pelanggan"]);
        $banyaknya=htmlspecialchars($_POST["banyaknya"]);
        $total_transaksi=htmlspecialchars($_POST["total_transaksi"]);

        //Query update data pada tabel anggota
        $sql="UPDATE penjualan SET
            kode_barang='$kode_barang',
            kode_pelanggan='$kode_pelanggan',
            banyaknya='$banyaknya',
            total_transaksi='$total_transaksi'
            WHERE kode_penjualan='$kode_penjualan'";

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
    <h2>Update Data Penjualan</h2>
    <a href="../penjualan/index.php" class="btn btn-success">Kembali</a><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Kode Barang :</label>
            <input type="text" name="kode_barang" class="form-control" value="<?php echo $data['kode_barang']; ?>" placeholder="Masukan Kode Barang" required />
        </div>
        <div class="form-group">
            <label>Kode Pelanggan :</label>
            <input type="text" name="kode_pelanggan" class="form-control" value="<?php echo $data['kode_pelanggan']; ?>" placeholder="Masukan Kode Pelanggan" required />
        </div>
        <div class="form-group">
            <label>Banyaknya :</label>
            <input type="text" name="banyaknya" class="form-control" value="<?php echo $data['banyaknya']; ?>" placeholder="Masukan Jumlah Barang" required />
        </div>
        <div class="form-group">
            <label>Total Transaksi :</label>
            <input type="text" name="total_transaksi" class="form-control" value="<?php echo $data['total_transaksi']; ?>" placeholder="Masukan Total Transaksi" required />
        </div>

        <input type="hidden" name="kode_penjualan" value="<?php echo $data['kode_penjualan']; ?>" />

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon>Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>