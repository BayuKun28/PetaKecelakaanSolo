<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Rangkuman / Peta</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <div class="row">
                    <form action="<?= base_url('Rangkuman/peta') ?>" method="POST" class="row col-md-12 p-3">
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
            </div>
            <div class="x_content">
                <div id="map" class="map"></div>
            </div>

        </div>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        var dateNow = new Date();
        $("#tglawal").datetimepicker({
            format: "Y-m-d H:i:s"
        });
        $("#tglakhir").datetimepicker({
            format: "Y-m-d H:i:s"
        });
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
            .bindPopup("Lokasi:" + locations[i][4] + "<br>Keterangan:" + locations[i][3] + "<br>Jumlah Kecelakaan :" + locations[i][0]);
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