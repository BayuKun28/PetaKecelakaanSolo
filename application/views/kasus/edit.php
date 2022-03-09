<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Kasus</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form method="post" action="<?= base_url('Kasus/simpanedit'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="hidden" name="idedit" id="idedit" value="<?= $kasus['id']; ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="lokasi" id="lokasi" class="form-control" required><?= $kasus['lokasi']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Kecamatan</label>
                                <div class="row">
                                    <div class="col-md-10">
                                        <select class="form-control itemKecamatan" id="kecamatan" name="kecamatan" required>
                                            <option selected='selected' value="<?= $kasus['kdkecamatan']; ?>"> <?= $kasus['kecamatan']; ?> </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="keterangan" class="form-control" required><?= $kasus['keterangan']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Jumlah Kasus</label>
                                        <input type="number" name="jumlah" id="jumlah" value="<?= $kasus['jumlah']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tanggal</label>
                                        <input type="text" name="tanggal" id="tanggal" value="<?= $kasus['tanggal']; ?>" autocomplete="off" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Titik Koordinat</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="lat" id="lat" value="<?= $kasus['lat']; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="lng" id="lng" value="<?= $kasus['lng']; ?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kecelakaan</label>
                                <div class="row">
                                    <div class="col-md-10">
                                        <select class="form-control itemJenis" id="jenis" name="jenis" required>
                                            <option selected='selected' value="<?= $kasus['kdjenis']; ?>"> <?= $kasus['jenis']; ?> </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h3>Pilih Titik</h3>
                            <div id="map" style="height: 400px"></div>
                            <textarea name="polygon" class="form-control" style="display:none"></textarea>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                                <a href="<?= base_url('Kasus'); ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php $this->load->view('templates/footer'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        var dateNow = new Date();
        $("#tanggal").datetimepicker({
            format: "Y-m-d H:i:s"
        });
        $('.itemKecamatan').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url(); ?>/Kecamatan/getKecamatan",
                dataType: "json",
                delay: 250,
                data: function(params) {
                    return {
                        kec: params.term
                    };
                },
                processResults: function(data) {
                    var results = [];
                    $.each(data, function(index, item) {
                        results.push({
                            id: item.id,
                            text: item.nama_kecamatan
                        });
                    });
                    return {
                        results: results
                    }
                }
            }

        });

        $('.itemJenis').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url(); ?>/Jenis/getJenis",
                dataType: "json",
                delay: 250,
                data: function(params) {
                    return {
                        jen: params.term
                    };
                },
                processResults: function(data) {
                    var results = [];
                    $.each(data, function(index, item) {
                        results.push({
                            id: item.id,
                            text: item.nama_jenis
                        });
                    });
                    return {
                        results: results
                    }
                }
            }
        });
    });

    var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });


    var map = L.map('map', {
        center: [-7.5695313, 110.8271533, 17],
        zoom: 50,
        layers: [googleStreets]
    });

    var theMarker = {};
    map.on('click', function(e) {
        var coord = e.latlng;
        var lat = coord.lat;
        var lng = coord.lng;
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };
        theMarker = L.marker([lat, lng]).addTo(map);
        $.ajax({
            url: "https://nominatim.openstreetmap.org/reverse",
            data: "lat=" + lat +
                "&lon=" + lng +
                "&format=json",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                document.getElementById('lokasi').value = data.display_name;
            }
        })
    });
</script>
<?php
if (!empty($this->session->flashdata('message'))) {
    $pesan = $this->session->flashdata('message');
    if ($pesan == "Berhasil Ditambah") {
        $script = "
                    <script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Data',
                              text: 'Data Berhasil Ditambah'
                            }) 
                    </script>
                ";
    } elseif ($pesan == "Berhasil Dihapus") {
        // die($pesan);
        $script = "
                    <script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Data',
                              text: 'Berhasil Dihapus'
                            }) 
                    </script>
                ";
    } elseif ($pesan == "Berhasil Di Update") {
        // die($pesan);
        $script = "
                    <script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Data',
                              text: 'Berhasil Di Update'
                            }) 
                    </script>
                ";
    } else {
        $script =
            "
                    <script>
                                Swal.fire({
                                  icon: 'error',
                                  title: 'Data',
                                  text: 'Gagal'
                                }) 

                    </script>
                    ";
    }
} else {
    $script = "";
}
echo $script;
?>