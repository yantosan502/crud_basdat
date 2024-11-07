<?php  
    include "../koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Penjualan</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <h2 style="text-align: center;">Data Penjualan</h2>
    <br>
    <?php
   //Cek apakah ada nilai dari method GET dengan nama buku1
    if (isset($_GET['kode_penjualan'])) {
    $kode_penjualan=htmlspecialchars($_GET["kode_penjualan"]);

    $sql="DELETE FROM penjualan WHERE kode_penjualan='$kode_penjualan' ";

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
    <table class="table table-striped table-dark">
        <br>
        <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>Kode Penjualan</th>
            <th>Kode Barang</th>
            <th>Kode Pelanggan</th>
            <th>Banyaknya</th>
            <th>Total Transaksi</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>
        <?php      
        $sql3="SELECT * FROM penjualan";

        $hasil3=mysqli_query($kon,$sql3);
        $no=0;
        while ($data = mysqli_fetch_array($hasil3)) {
            $no++;
            ?>
            <tbody>
            <tr style="text-align: center;">
                <td><?php echo $no;?></td>
                <td><?php echo $data["kode_penjualan"]; ?></td>
                <td><?php echo $data["kode_barang"]; ?></td>
                <td><?php echo $data["kode_pelanggan"]; ?></td>
                <td><?php echo $data["banyaknya"]; ?></td>
                <td><?php echo $data["total_transaksi"]; ?></td>
                <td>
                    <a href="update.php?kode_penjualan=<?php echo htmlspecialchars($data['kode_penjualan']); ?>" 
                    class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" href="delete.php?kode_penjualan=<?php echo $data['kode_penjualan']; ?>" 
                    class="btn btn-danger">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>
