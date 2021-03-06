<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Rangkuman / Diagram Pie</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="clearfix"></div>
                <div class="row">
                    <form action="<?= base_url('Rangkuman/chart') ?>" method="POST" class="row col-md-12 p-3">
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="<?= $tanggalawal; ?>" name="tglawal" id="tglawal">
                        </div>
                        <div class="col-md-1">
                            <center><input type="text" class="form-control" value="S/D" readonly></center>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="<?= $tanggalakhir; ?>" name="tglakhir" id="tglakhir">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success"> Tampilkan </button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
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
                            <div class="row justify-content-center">
                                <div class="x_content col-md-8 col-sm-8 ">
                                    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
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
    //         },

    //     }
    // });

    $(function () {
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Data Kecelakaan Pie'
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
</script>