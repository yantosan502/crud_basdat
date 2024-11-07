<?php
include "../koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <h2 style="text-align: center;">Data Pelanggan</h2>
    <br>
    <?php
    //Cek apakah ada nilai dari method GET dengan nama buku1
    if (isset($_GET['kode_pelanggan'])) {
        $kode_barang=htmlspecialchars($_GET["kode_pelanggan"]);

        $sql="DELETE FROM pelanggan WHERE kode_pelanggan='$kode_pelanggan' ";
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
            <th>Kode Pelanggan</th>
            <th>Kode Barang</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>
        <?php
        $sql="SELECT * FROM pelanggan";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
            <tr style="text-align: center;">
                <td><?php echo $no; ?></td>
                <td><?php echo $data["kode_pelanggan"]; ?></td>
                <td><?php echo $data["kode_barang"]; ?></td>
                
                <td>
                    <a href="update.php?kode_pelanggan=<?php echo htmlspecialchars($data['kode_pelanggan']); ?>" 
                    class="btn btn-warning" role="button">Edit</a>
                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?kode_pelanggan=<?php echo $data['kode_pelanggan']; ?>" 
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