<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Kasus</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <form action="<?= base_url('Kasus') ?>" method="POST" class="row col-md-12">
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
                <div class="row col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabledata">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kecamatan</th>
                                    <th>Lokasi</th>
                                    <th>Keterangan</th>
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Actions</th>
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
                                        <td>
                                            <a href="<?= base_url('Kasus/Edit/') . $s['id']; ?>" class=" btn btn-success" name="editkasus" id="editkasus"><i class="fa fa-pencil"></i></a>
                                            <a href='javascript:void(0)' data-kode="<?= $s['id']; ?>" class="del_kasus btn btn-danger" name="hapuskasus" id="hapuskasus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabledata').DataTable({
            responsive: true
        });
        var dateNow = new Date();
        $("#tglawal").datetimepicker({
            format: "Y-m-d H:i:s"
        });
        $("#tglakhir").datetimepicker({
            format: "Y-m-d H:i:s"
        });

        $(document).on('click', '.del_kasus', function(event) {
            event.preventDefault();
            let kode = $(this).attr('data-kode');
            let delete_url = "<?= base_url(); ?>/Kasus/delete/" + kode;

            Swal.fire({
                title: 'Hapus Data',
                text: "Apakah Anda Yakin Ingin Menghapus Data Ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.value) {
                    window.location.href = delete_url;
                }
            });
        });
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