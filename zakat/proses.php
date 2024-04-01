<?php 
require_once "../_config/config.php";

if(isset($_POST['add'])) {
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $jiwa = trim(mysqli_real_escape_string($con, $_POST['jiwa']));
    $hrg_beras = trim(mysqli_real_escape_string($con, $_POST['hrg_beras']));
    $tagihan = trim(mysqli_real_escape_string($con, $_POST['tagihan']));
    $pembayaran = trim(mysqli_real_escape_string($con, $_POST['pembayaran']));
    $kembalian = trim(mysqli_real_escape_string($con, $_POST['kembalian']));
    mysqli_query($con, "INSERT INTO tb_zakat (id_zakat, nama_muzakki, alamat, jml_jiwa, id_beras, tagihan_zakat, jumlah_uang, kembalian, tanggal_transaksi) VALUES ('', '$nama', '$alamat', '$jiwa', '$hrg_beras', '$tagihan', '$pembayaran', '$kembalian', '$tgl')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $jiwa = trim(mysqli_real_escape_string($con, $_POST['jiwa']));
    $hrg_beras = trim(mysqli_real_escape_string($con, $_POST['hrg_beras']));
    $tagihan = trim(mysqli_real_escape_string($con, $_POST['tagihan']));
    $pembayaran = trim(mysqli_real_escape_string($con, $_POST['pembayaran']));
    $kembalian = trim(mysqli_real_escape_string($con, $_POST['kembalian']));
    mysqli_query($con, "UPDATE tb_zakat SET nama_muzakki = '$nama', alamat = '$alamat', jml_jiwa = '$jiwa', id_beras = '$hrg_beras', tagihan_zakat = '$tagihan', jumlah_uang = '$pembayaran', kembalian = '$kembalian' tanggal_transaksi = '$tgl' WHERE id_zakat = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>