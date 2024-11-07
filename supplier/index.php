<?php  
    include "../koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <h2 style="text-align: center;">Data Supplier</h2>
    <br>
    <?php
   //Cek apakah ada nilai dari method GET dengan nama buku1
    if (isset($_GET['kode_supplier'])) {
    $kode_supplier=htmlspecialchars($_GET["kode_supplier"]);

    $sql="delete from supplier where kode_supplier='$kode_supplier' ";

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
            <th>Kode Supplier</th>
            <th>Nama Supplier</th>
            <th>Lokasi</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>
        <?php        
        $sql3="SELECT * FROM supplier";

        $hasil3=mysqli_query($kon,$sql3);
        $no=0;
        while ($data = mysqli_fetch_array($hasil3)) {
            $no++;
            ?>
            <tbody>
            <tr style="text-align: center;">
                <td><?php echo $no;?></td>
                <td><?php echo $data["kode_supplier"];   ?></td>
                <td><?php echo $data["nama_supplier"];   ?></td>
                <td><?php echo $data["lokasi"];   ?></td>
                <td>
                    <a href="update.php?kode_supplier=<?php echo htmlspecialchars($data['kode_supplier']); ?>" 
                    class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" href="delete.php?kode_supplier=<?php echo $data['kode_supplier']; ?>" 
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
