<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Beras</h1>
        <h4>
            <small>Edit Data Beras</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali</i></a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_beras = mysqli_query($con, "SELECT * FROM tb_beras WHERE id_beras = '$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($sql_beras);
                ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama">Harga Beras</label>
                        <input type="hidden" name="id" value="<?=$data['id_beras']?>">
                        <input type="text" name="nama" value="<?=$data['harga_beras']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="ket">Harga Zakat per Jiwa</label>
                        <input type="text" name="ket" value="<?=$data['harga_zakat']?>" class="form-control" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>