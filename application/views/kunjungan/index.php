<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <?php echo $this->session->flashdata('notif') ?>
            <button type="button" data-toggle="modal" data-target="#newModal" class="btn btn-primary mb-3">Tambah Data Baru</button>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Kunjungan</th>
                        <th scope="col">Tanggal - Waktu</th>
                        <th scope="col">Nama Pengunjung</th>
                        <th scope="col">NIM / NIP</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Status</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kunjungan as $kjn) :
                        $id = $kjn['id_kjn'];
                    ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $kjn['id_kjn'] ?></td>
                            <td><?= $kjn['tgl']; ?></td>
                            <td><?= $kjn['nama_kjn']; ?></td>
                            <td><?= $kjn['nim_nip']; ?></td>
                            <td><?= $kjn['jk']; ?></td>
                            <td><?= $kjn['status']; ?></td>
                            <td><?= $kjn['prodi']; ?></td>
                            <td>
                                <button class="badge badge-pill badge-info" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Edit</button>
                                <button class="badge badge-pill badge-warning" data-toggle="modal" data-target="#modal_hapus<?= $id; ?>">Hapus</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newModal">Tambah Kunjungan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('kunjungan'); ?>
                <div class="form-group">
                    <label for="">ID Kunjungan</label>
                    <input type="text" class="form-control" id="id_kjn" name="id_kjn" value="<?= $id_kjn; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tanggal - Waktu</label>
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <input type="text" class="form-control" id="tgl" name="tgl" value="<?= date("Y-m-d h:i:sa") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama Pengunjung</label>
                    <input type="text" class="form-control" id="nama_kjn" name="nama_kjn" placeholder="Masukkan Nama Pengunjung">
                </div>
                <div class="form-group">
                    <label for="">NIM / NIP</label>
                    <input type="text" class="form-control" id="nim_nip" name="nim_nip" placeholder="Masukkan NIM / NIP">
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select class="custom-select" name="jk" value="<?php echo $kjn->jk ?>">>
                        <option selected disabled>Pilih Jenis Kelamin</option>
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Status</label> <br>
                    <input type="radio" name="status" id="status" value="Mahasiswa" checked="checked" onclick="enable(true)" />
                    <label for="status">Mahasiswa</label>
                    <input type="radio" name="status" id="status" value="Dosen" onclick="enable(false)" />
                    <label for="status">Dosen</label>
                    <input type="radio" name="status" id="status" value="Teknisi" onclick="enable(false)" />
                    <label for="status">Teknisi</label>
                    <input type="radio" name="status" id="status" value="Umum" onclick="enable(false)" />
                    <label for="status">Umum</label>
                </div>
                <div class="form-group">
                    <label for="prodi">Prodi</label> <br>
                    <input type="radio" name="prodi" id="TIF" value="TIF">
                    <label for="prodi">TIF</label> &nbsp; &nbsp; &nbsp;
                    <input type="radio" name="prodi" id="MIF" value="MIF">
                    <label for="prodi">MIF</label> &nbsp; &nbsp; &nbsp;
                    <input type="radio" name="prodi" id="TKK" value="TKK">
                    <label for="prodi">TKK</label> <br>
                    <input type="radio" name="prodi" id="Lain-Lain" disabled value="Bukan Mahasiswa TI">
                    <label for="prodi">Bukan Mahasiswa TI</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Simpan Data</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

<script>
    function enable(enabled) {
        var tif = document.getElementById('TIF');
        mif = document.getElementById('MIF');
        tkk = document.getElementById('TKK');
        lain = document.getElementById('Lain-Lain');
        if (enabled) {
            tif.removeAttribute('disabled');
            mif.removeAttribute('disabled');
            tkk.removeAttribute('disabled');
            lain.setAttribute('disabled', 'disabled');
        } else {
            tif.setAttribute('disabled', 'disabled');
            mif.setAttribute('disabled', 'disabled');
            tkk.setAttribute('disabled', 'disabled');
            lain.removeAttribute('disabled');
        }
    }
</script>


<!--MODAL EDIT DATA-->
<!-- <?php
        foreach ($kunjungan as $kjn) :
            $id_kjn = $i['id_kjn'];
            $judul = $i['judul'];
            $nim = $i['nim'];
            $isbn = $i['isbn'];
            $penerbit = $i['penerbit'];
            $penulis = $i['penulis'];
            $prodi = $i['prodi'];
            $nama_kategori = $i['nama_kategori'];
        ?>
    <div class="modal fade" id="modal_edit<?= $id_kjn; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Koleksi</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <?= form_open_multipart('koleksi/edit_koleksi'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="control-label col-xs-3">ID Koleksi</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="id_koleksi" value="<?= $id_koleksi; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Judul</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="judul" value="<?= $judul; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-xs-3">NIM</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="nim" value="<?= $nim; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">ISBN</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="isbn" value="<?= $isbn; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Penerbit</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="penerbit" value="<?= $penerbit; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Penulis</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="penulis" value="<?= $penulis; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Tahun Terbit</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="tahun_terbit" value="<?= $tahun_terbit; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label  col-xs-3">Kategori Koleksi</label>
                        <select class="form-control" name="nama_kategori" id="nama_kategori">
                            <?php foreach ($getKategoriKoleksi as $bc) : ?>
                                <option value="<?= $bc['nama_kategori']; ?>"><?= $bc['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_hapus<?= $id_kjn; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form action="<?= base_url() . 'kunjungan/hapus_kunjungan'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda Yakin mau Menghapus Kunjungan dengan ID "<b><?= $id_kjn; ?></b>"</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_kjn" value="<?= $id_kjn; ?>">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?> -->