<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Pengguna</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabledata">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pengguna as $s) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $s['username']; ?></td>
                                        <td><?= $s['nama']; ?></td>
                                        <td><?php
                                            if ($s['level'] == 1) {
                                                echo "Admin";
                                            } else if ($s['level'] == 2) {
                                                echo "Petugas";
                                            } else if ($s['level'] == 3) {
                                                echo "Masyarakat";
                                            }; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('Auth/Edit/') . $s['id']; ?>" class=" btn btn-success" name="editpengguna" id="editpengguna"><i class="fa fa-pencil"></i></a>
                                            <a href='javascript:void(0)' data-kode="<?= $s['id']; ?>" class="del_pengguna btn btn-danger" name="hapuspengguna" id="hapuspengguna"><i class="fa fa-trash"></i></a>
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

        $(document).on('click', '.del_pengguna', function(event) {
            event.preventDefault();
            let kode = $(this).attr('data-kode');
            let delete_url = "<?= base_url(); ?>/Auth/delete/" + kode;

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