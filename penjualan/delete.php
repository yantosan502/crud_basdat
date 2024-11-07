<?php  
    include "../koneksi.php";
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_GET['kode_penjualan'])) {
        $kode_penjualan=input($_GET['kode_penjualan']);

        $sql="DELETE FROM penjualan WHERE kode_penjualan='$kode_penjualan'";
        $hasil=mysqli_query($kon,$sql);
        echo "<script>alert('Data Berhasil Dihapus');window.location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Data Gagal Dihapus');window.location.href='index.php';</script>";
    }
?>
