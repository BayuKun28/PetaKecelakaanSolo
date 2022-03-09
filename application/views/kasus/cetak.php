<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_content">
                <div class="row col-md-12">
                    <div class="table-responsive">
                        <center>
                            <h3>Laporan Data Kasus </h3>
                            <h4> <?= $tanggalawal; ?> s/d <?= $tanggalakhir; ?></h4>
                            <table border="1" width="100%">
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
            </div>

        </div>
    </div>
</div>