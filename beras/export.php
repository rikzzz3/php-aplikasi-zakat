<?php
require_once "../_config/config.php";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Beras.xls");
?>
 
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Harga beras</th>
            <th>Harga zakat per jiwa</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $query = "SELECT * FROM tb_beras";
    $sql_beras = mysqli_query($con, $query) or die (mysqli_error($con));
    while($data = mysqli_fetch_array($sql_beras)) { ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data['harga_beras']?></td>
            <td><?=$data['harga_zakat']?></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
        