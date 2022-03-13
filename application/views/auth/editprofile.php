<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Pengguna</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form method="post" action="<?= base_url('Auth/simpanprofile'); ?>">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Username</label>
                                    <input type="hidden" name="idedit" id="idedit" value="<?= $pengguna['id']; ?>" class="form-control" required>
                                    <input type="text" name="username" id="username" value="<?= $pengguna['username']; ?>" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" placeholder="New Password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Nama</label>
                                    <input type="text" name="nama" id="nama" value="<?= $pengguna['nama']; ?>" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Level</label>
                                    <select name="level" id="level" class="form-control">
                                        <option selected value="<?= $pengguna['level']; ?>"><?php
                                                                                            if ($pengguna['level'] == 1) {
                                                                                                echo "Admin";
                                                                                            } else if ($pengguna['level'] == 2) {
                                                                                                echo "Petugas";
                                                                                            } else if ($pengguna['level'] == 3) {
                                                                                                echo "Masyarakat";
                                                                                            }
                                                                                            ?></option>
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