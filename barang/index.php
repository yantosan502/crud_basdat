<?php
include "../koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <h2 style="text-align: center;">Data Barang</h2>
    <br>
    <?php
    //Cek apakah ada nilai dari method GET dengan nama buku1
    if (isset($_GET['kode_barang'])) {
        $kode_barang=htmlspecialchars($_GET["kode_barang"]);

        $sql="DELETE FROM barang WHERE kode_barang='$kode_barang' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");
            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
    ?>
    <a href="../index.php" class="btn btn-success">Kembali</a><br>
    <table class="table">
        <br>
        <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kode Supplier</th>
            <th>Tanggal Masuk</th>
            <th>Jumlah Barang</th>
            <th>Price</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>
        <?php
        $sql="SELECT * FROM barang";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
            <tr style="text-align: center;">
                <td><?php echo $no;?></td>
                <td><?php echo $data["kode_barang"];   ?></td>
                <td><?php echo $data["nama_barang"];   ?></td>
                <td><?php echo $data["kode_supplier"]; ?></td>
                <td><?php echo date('d F Y',strtotime($data["tgl_masuk"]));   ?></td>
                <td><?php echo $data["jumlah_barang"]; ?></td>
                <td><?php echo $data["price"]; ?></td>      
                <td>
                    <a href="update.php?kode_barang=<?php echo htmlspecialchars($data['kode_barang']); ?>" 
                    class="btn btn-warning" role="button">Edit</a>
                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?kode_barang=<?php echo $data['kode_barang']; ?>" 
                    class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">
        Tambah Data
    </a>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>