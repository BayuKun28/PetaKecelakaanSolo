<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dashboard</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Welcome <?= $user['nama']; ?></strong>
                </div>
                <div class="row justify-content-center">
                    <form action="<?= base_url('Dashboard') ?>" method="POST" class="row col-md-12 p-3">
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?= $tanggalawal; ?>" name="tglawal" id="tglawal">
                        </div>
                        <div class="col-md-1">
                            <center><input type="text" class="form-control" value="S/D" readonly></center>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?= $tanggalakhir; ?>" name="tglakhir" id="tglakhir">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success"> Tampilkan </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="x_content">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-6 col-sm-6  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Chart Pie</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Chart Diagram</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <canvas id="containerbatang"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Table Status</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-striped table-hover" id="tabledata">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Jumlah Kecelakaan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($status as $s) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $s['nama_kecamatan']; ?></td>
                                            <td><?= $s['jumlahkasus']; ?></td>
                                            <td>
                                                <?php if ($s['jumlahkasus'] <= 10) {
                                                    echo "<img src=". base_url('assets/status/hijau.png');" > ";
                                                }
                                                elseif ($s['jumlahkasus'] > 10 && $s['jumlahkasus'] <= 20 ) {
                                                    echo "<img src=". base_url('assets/status/kuning.png');" > ";
                                                }
                                                elseif ($s['jumlahkasus'] > 20 && $s['jumlahkasus'] <= 30 ) {
                                                    echo "<img src=". base_url('assets/status/orange.png');" > ";
                                                }elseif ($s['jumlahkasus'] > 30 ) {
                                                    echo "<img src=". base_url('assets/status/merah.png');" > ";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Keterangan</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-striped table-hover" id="tabledata">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><img src="<?= base_url('assets/status/hijau.png'); ?>"></td>
                                            <td>Aman</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><img src="<?= base_url('assets/status/kuning.png'); ?>"></td>
                                            <td>Kurang Aman</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><img src="<?= base_url('assets/status/orange.png'); ?>"></td>
                                            <td>Rawan</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><img src="<?= base_url('assets/status/merah.png'); ?>"></td>
                                            <td>Berbahaya</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="x_content">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Peta</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Settings 1</a>
                                            <a class="dropdown-item" href="#">Settings 2</a>
                                        </div>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="x_content">
                                    <div id="map" class="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>

<?php
//Inisialisasi nilai variabel awal
$nama_kecamatan = "";
$jumlah = null;
foreach ($graph as $item) {
    $kec = $item->nama_kecamatan;
    $nama_kecamatan .= "'$kec'" . ", ";
    $jum = $item->jumlahkasus;
    $jumlah .= "$jum" . ", ";
}
?>
<script>
    $(document).ready(function() {
        var dateNow = new Date();
        $("#tglawal").datetimepicker({
            format: "Y-m-d H:i:s"
        });
        $("#tglakhir").datetimepicker({
            format: "Y-m-d H:i:s"
        });
    });
    $(function () {
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Persentase Kecelakaan',
                data: [
                <?php 
                    // data yang diambil dari database
                if(count($graph)>0)
                {
                 foreach ($graph as $data) {
                     echo "['" .$data->nama_kecamatan . "'," . $data->jumlahkasus ."],\n";
                 }
             }
             ?>
             ]
         }]
     });
    });
    // var ctx = document.getElementById('container').getContext('2d');
    // var chart = new Chart(ctx, {
    //     // The type of chart we want to create
    //     type: 'pie',
    //     // The data for our dataset
    //     data: {
    //         labels: [<?php echo $nama_kecamatan; ?>],
    //         datasets: [{
    //             label: 'Data Kasus Kecelakaan ',
    //             backgroundColor: ['rgb(255, 0, 0)', 'rgba(0, 102, 255)', 'rgb(0, 204, 0)', 'rgb(255, 255, 0)', 'rgb(204, 204, 0)'],
    //             borderColor: ['rgb(255, 99, 132)'],
    //             data: [<?php echo $jumlah; ?>]
    //         }]
    //     },
    //     // Configuration options go here
    //     options: {
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero: true
    //                 }
    //             }]
    //         }
    //     }
    // });

    var ctx = document.getElementById('containerbatang').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $nama_kecamatan; ?>],
            datasets: [{
                label: 'Data Kasus Kecelakaan ',
                backgroundColor: ['rgb(255, 0, 0)', 'rgba(0, 102, 255)', 'rgb(0, 204, 0)', 'rgb(255, 255, 0)', 'rgb(204, 204, 0)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var locations = <?php echo json_encode($lokasi, JSON_NUMERIC_CHECK); ?>;
    var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    var mymap = L.map('map', {
        center: [-7.5695313, 110.8271533, 17],
        zoom: 12,
        layers: [googleStreets]
    });
    var array = [];
    for (var i = 0; i < locations.length; i++) {
        marker = new L.marker([locations[i][1], locations[i][2]])
        .bindPopup("Lokasi:" + locations[i][4] + "<br>Keterangan:" + locations[i][3]);
        array.push(marker);
    }
    var layerGroup = L.featureGroup(array).addTo(mymap);
    mymap.fitBounds(layerGroup.getBounds(), {
        padding: [50, 50]
    });
    var baseMaps = {
        "<span style='color: gray'>OSM</span>": osm,
        "Google": googleStreets
    };
    var overlayMaps = {
        "Kecelakaan": layerGroup
    };
    L.control.layers(baseMaps, overlayMaps).addTo(mymap);
</script>