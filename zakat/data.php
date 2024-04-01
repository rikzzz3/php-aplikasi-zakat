<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Zakat</h1>
        <h4>
            <small>Data Pembayaran Zakat</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus"> Tambah Data Zakat</i></a>
            </div>
        </h4>
        <center>
		    <a target="_blank" href="export.php">Export Ke Excel</a>
	    </center>
        <div style="margin-bottom: 20px;">
            <form class="form-inline" action="" method="post">
                <div class="form-group">
                    <input type="text" name="pencarian" class="form-control" placeholder="Pencarian">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

                </div>
            </form>
        </div>
        <div class="table-responsive">
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
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $batas = 20;
                $hal = @$_GET['hal'];
                if(empty($hal)) {
                    $posisi = 0;
                    $hal = 1;
                } else {
                    $posisi = ($hal - 1) * $batas;
                }
                $no = 1;
                if($_SERVER['REQUEST_METHOD'] == "POST") {
                    $pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
                    if($pencarian != '') {
                        $sql = "SELECT * FROM tb_zakat 
                                INNER JOIN tb_beras ON tb_zakat.id_beras = tb_beras.id_beras 
                                WHERE nama_muzakki LIKE '%$pencarian%'";
                        $query = $sql;
                        $queryJml = $sql;
                    } else {
                        $query = "SELECT * FROM tb_zakat 
                                INNER JOIN tb_beras ON tb_zakat.id_beras = tb_beras.id_beras 
                                LIMIT $posisi, $batas";
                        $queryJml = "SELECT * FROM tb_zakat";
                        $no = $posisi + 1;
                    }
                } else {
                    $query = "SELECT * FROM tb_zakat 
                            INNER JOIN tb_beras ON tb_zakat.id_beras = tb_beras.id_beras 
                            LIMIT $posisi, $batas";
                    $queryJml = "SELECT * FROM tb_zakat";
                    $no = $posisi + 1;
                }
        
                $sql_zkt = mysqli_query($con, $query) or die (mysqli_error($con));
                if(mysqli_num_rows($sql_zkt) > 0) {
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
                            <td class="text-center">
                                <a href="edit.php?id=<?=$data['id_zakat']?>" class="btn btn-warning bts-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="del.php?id=<?=$data['id_zakat']?>" onclick="return confirm('Apakah anda ingin menghapus data?')" class="btn btn-danger bts-xs"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    } 
                } else {
                    echo "<tr><td colspan=\"10\" align=\"center\">Data tidak ditemukan</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
        if(@$_POST['pencarian'] == '') { ?>
            <div style="float:left;">
                <?php
                $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
                echo "Jumlah Data : <b>$jml</b>";
                ?>
            </div>
            <div style="float:right;">
                <ul class="pagination pagination-sm" style="margin:0">
                    <?php
                    $jml_hal = ceil($jml / $batas);
                    for ($i=1; $i <= $jml_hal; $i++) {
                        if($i != $hal) {
                            echo "<li><a href=\"?hal=$i\">$i</a></li>";
                        } else {
                            echo "<li class=\"active\"><a>$i</a></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <?php
        } else { 
            echo "<div style=\"float:left;\">";
            $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
            echo "Data Hasil Pencarian : <b>$jml</b>";
            echo "</div>";
        }
        ?>
    </div>

<?php include_once('../_footer.php'); ?>