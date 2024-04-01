<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Beras</h1>
        <h4>
            <small>Data Beras</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali</i></a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama">Harga Beras</label>
                        <input type="text" name="nama" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="ket">Harga Zakat per Jiwa</label>
                        <input type="text" name="ket" class="form-control" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>