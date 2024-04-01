<?php include_once('../_header.php'); ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <div class="box">
        <h1>Zakat</h1>
        <h4>
            <small>Data Pembayaran Zakat</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali</i></a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama">Tanggal Transaksi</label>
                        <input type="date" name="tgl" id="tgl" class="form-control" required autofocus>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Jumlah Jiwa</label>
                        <select name="jiwa" id="jiwa" class="form-control" required onchange="calculateTagihan()">
                            <option value="">Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="ket">Harga Beras Dikonsumsi</label>
                        <select name="hrg_beras" id="hrg_beras" class="form-control" required onchange="calculateTagihan()">
                            <option value="">- Pilih -</option>
                            <?php
                            $sql_hrgberas = mysqli_query($con, "SELECT * FROM tb_beras") or die (mysqli_error($con));
                            while($data_hrgberas = mysqli_fetch_array($sql_hrgberas)) {
                                echo '<option value="'.$data_hrgberas['id_beras'].'">'.$data_hrgberas['harga_beras'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Tagihan</label>
                        <input type="text" name="tagihan" id="tagihan" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Uang yang Dibayarkan</label>
                        <input type="text" name="pembayaran" id="pembayaran" class="form-control" required oninput="calculateKembalian()">
                    </div>
                    <div class="form-group">
                        <label for="nama">Kembalian</label>
                        <input type="text" name="kembalian" id="kembalian" class="form-control" required readonly>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        <input type="reset" name="reset" value="Reset" class="btn btn-default">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Store all harga_zakat values in a JavaScript object
        var harga_zakat = {
            <?php
            $sql_hrgberas = mysqli_query($con, "SELECT * FROM tb_beras") or die (mysqli_error($con));
            while($data_hrgberas = mysqli_fetch_array($sql_hrgberas)) {
                echo $data_hrgberas['id_beras'].':'.$data_hrgberas['harga_zakat'].',';
            }
            ?> };

        function calculateTagihan() {
            var jiwa = document.getElementById("jiwa").value;
            var id_beras = document.getElementById("hrg_beras").value;
            var tagihan = harga_zakat[id_beras] * parseInt(jiwa);

            if (id_beras != "") {
                document.getElementById("tagihan").value = tagihan;
            }
        }

        function calculateKembalian() {
            var tagihan = parseInt(document.getElementById("tagihan").value);
            var pembayaran = parseInt(document.getElementById("pembayaran").value);
            var kembalian = pembayaran - tagihan;
            document.getElementById("kembalian").value = kembalian;
        }

    </script>

<?php include_once('../_footer.php'); ?>