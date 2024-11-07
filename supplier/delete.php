<?php  
    include "../koneksi.php";
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_GET['kode_suplier'])) {
        $kode_supplier=input($_GET['kode_supplier']);

        $sql="delete from supplier where kode_supplier='$kode_supplier'";
        $hasil=mysqli_query($kon,$sql);
        echo "<script>alert('Data Berhasil Dihapus');window.location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Data Gagal Dihapus');window.location.href='index.php';</script>";
    }
?>
