<?php 
require_once "../_config/config.php";

if(isset($_POST['add'])) {
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    mysqli_query($con, "INSERT INTO tb_beras (id_beras, harga_beras, harga_zakat) VALUES ('', '$nama', '$ket')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    mysqli_query($con, "UPDATE tb_beras SET harga_beras = '$nama', harga_zakat = '$ket' WHERE id_beras = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>