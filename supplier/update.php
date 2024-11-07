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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['kode_supplier'])) {
        $kode_supplier=input($_GET['kode_supplier']);

        $sql="select * from supplier where kode_supplier='$kode_supplier'";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_array($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $kode_supplier=htmlspecialchars($_POST["kode_supplier"]);
        $nama_supplier=htmlspecialchars($_POST["nama_supplier"]);
        $lokasi=htmlspecialchars($_POST["lokasi"]);

        //Query update data pada tabel anggota
        $sql="update supplier set
            nama_supplier='$nama_supplier',
            lokasi='$lokasi'
            where kode_supplier='$kode_supplier'";

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
    <h2>Update Data Supplier</h2>
    <a href="../supplier/index.php" class="btn btn-success">Kembali</a><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Supplier :</label>
            <input type="text" name="nama_supplier" class="form-control" value="<?php echo $data['nama_supplier']; ?>" placeholder="Masukan Kode Supplier" required />
        </div>
        <div class="form-group">
            <label>Lokasi :</label>
            <input type="text" name="lokasi" class="form-control" value="<?php echo $data['lokasi']; ?>" placeholder="Masukan Lokasi Supplier" required />
        </div>
        <input type="hidden" name="kode_supplier" value="<?php echo $data['kode_supplier']; ?>" />

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon>Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>