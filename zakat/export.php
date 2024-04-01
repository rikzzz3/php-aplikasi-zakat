<?php
require_once "../_config/config.php";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pembayaran zakat.xls");
?>
 
 <table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal Transaksi</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jumlah Jiwa</th>
            <th>Harga Beras Dikonsumsi</th>
            <th>Tagihan</th>
            <th>Uang yang Dibayarkan</th>
            <th>Kembalian</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $query = "SELECT * FROM tb_zakat
            INNER JOIN tb_beras ON tb_zakat.id_beras = tb_beras.id_beras
    ";
    $sql_zkt = mysqli_query($con, $query) or die (mysqli_error($con));
    while($data = mysqli_fetch_array($sql_zkt)) { ?>
        <tr>
            <td><?=$no++?>.</td>
            <td><?=$data['tanggal_transaksi']?></td>
            <td><?=$data['nama_muzakki']?></td>
            <td><?=$data['alamat']?></td>
            <td><?=$data['jml_jiwa']?></td>
            <td><?=$data['harga_beras']?></td>
            <td><?=$data['tagihan_zakat']?></td>
            <td><?=$data['jumlah_uang']?></td>
            <td><?=$data['kembalian']?></td>
        </tr>
        <?php
    } 
    ?>
    </tbody>
</table>
        