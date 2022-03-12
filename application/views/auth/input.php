<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Input Pengguna</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form method="post" action="<?= base_url('Auth/Tambah'); ?>">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Level</label>
                                    <select name="level" id="level" class="form-control">
                                        <option value="">Pilih Level</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Petugas</option>
                                        <option value="3">Masyarakat</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ml-2">
                            <hr>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                                <a href="<?= base_url('Auth/pengguna'); ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
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
    } elseif ($pesan == "Username Sudah Ada") {
        // die($pesan);
        $script = "
                            <script>
                                    Swal.fire({
                                      icon: 'error',
                                      title: 'Data',
                                      text: 'Username Sudah Ada'
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