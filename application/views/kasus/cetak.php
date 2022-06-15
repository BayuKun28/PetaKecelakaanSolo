<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_content">
                <div class="row col-md-12">
                    <div class="table-responsive">
                        <center>
                            <h3>Laporan Data</h3>
                            <h3>Kasus Kecelakaan Lalu Lintas Di Kota Surakarta</h3>
                            <h4>Periode <?= $tanggalawal; ?> s/d <?= $tanggalakhir; ?></h4>
                            <table border="1" width="100%" style="border-collapse:collapse;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Lokasi</th>
                                        <th>Keterangan</th>
                                        <th>Jenis</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kasus as $s) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $s['kecamatan']; ?></td>
                                            <td><?= $s['lokasi']; ?></td>
                                            <td><?= $s['keterangan']; ?></td>
                                            <td><?= $s['jenis']; ?></td>
                                            <td><?= $s['jumlah']; ?></td>
                                            <td><?= $s['tanggal']; ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </center>
                    </div>
                    <!-- /.table-responsive -->
                </div>

                <div class="row col-md-12">
                    <div class="table-responsive">
                        <center>
                            <h3>Rangkuman </h3>
                            <table  width="100%">
                                <thead>
                                    <tr>
                                        <td colspan="4" ><b>TOTAL KECELAKAAN : <?= $total['totalkasus']; ?> </b></td>
                                        <td colspan="4" ></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kecamatan as $b) : ?>
                                        <tr>
                                            <td width="2%" ><?= $i; ?>.</td>
                                            <td width="20%"><?= $b->nama_kecamatan; ?></td>
                                            <td width="2%">:</td>
                                            <td width="70%"><?= $b->jumlahkasus; ?> Kasus</td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </center>
                    </div>
                    <!-- /.table-responsive -->
                    <div style="width: 35%; text-align: center; float: right;">Surakarta, <?= $hariini; ?> <br>
                        KANIT GAKKUM, <br> <br> <br> <br>
                        <u>SUHARTO, SH</u> <br>
                        IPTU NRP 69060262
                    </div><br><br><br><br><br><br>
                </div>
            </div>
        </div>

    </div>
</div>
</div>