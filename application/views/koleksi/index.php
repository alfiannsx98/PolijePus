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
            <button type="button" data-toggle="modal" data-target="#modalExcel" class="btn btn-success mb-3">Import Data dari Excel</button>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Koleksi</th>
                        <th scope="col">Judul</th>
                        <th scope="col">NIM</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Kategori Koleksi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($koleksi as $m) :
                        $id = $m['id_koleksi'];
                        ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['id_koleksi'] ?></td>
                            <td><?= $m['judul']; ?></td>
                            <td><?= $m['nim']; ?></td>
                            <td><?= $m['isbn']; ?></td>
                            <td><?= $m['penerbit']; ?></td>
                            <td><?= $m['penulis']; ?></td>
                            <td><?= $m['tahun_terbit']; ?></td>
                            <td><?= $m['nama_kategori']; ?></td>
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
                <h5 class="modal-title" id="newModal">Tambah Koleksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('koleksi'); ?>
                <div class="form-group">
                    <label for="">ID Koleksi</label>
                    <input type="text" class="form-control" id="id_koleksi" name="id_koleksi" placeholder="Masukkan ID Koleksi">
                </div>
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul">
                </div>
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM">
                </div>
                <div class="form-group">
                    <label for="">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukkan ISBN">
                </div>
                <div class="form-group">
                    <label for="">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Penerbit">
                </div>
                <div class="form-group">
                    <label for="">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan Penulis">
                </div>
                <div class="form-group">
                    <label for="">Tahun Terbit</label>
                    <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Masukkan Tahun Terbit">
                </div>
                <div class="form-group">
                    <label for="">Kategori Koleksi</label>
                    <select name="nama_kategori" id="nama_kategori" class="form-control">
                        <?php foreach ($getKategoriKoleksi as $kt) : ?>
                            <option value="<?= $kt['nama_kategori']; ?>"><?= $kt['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
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

<!-- Modal Import Data dari EXCEL -->

<div class="modal fade" id="modalExcel" tabindex="-1" role="dialog" aria-labelledby="modalExcel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalExcel">Tambah Koleksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?= form_open_multipart('koleksi/upload'); ?>
                <div class="form-group">
                    <label for="">Pilih File Excel</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="userfile" name="userfile">
                        <label for="userfile" class="custom-file-label">Pilih Data Excel yang sesuai . . .</label>
                    </div>
                </div>
                <!-- <p>
                    <label for="">Pilih File Excel yang mau diupload</label>
                    <input type="file" class="custom-file-input" name="userfile" id="userfile">
                </p> -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="import" value="Import" class="btn btn-success">Import Data</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Akhir Modal Import DATA dari EXCEL -->

<!--MODAL EDIT DATA-->
<?php
foreach ($koleksi as $i) :
    $id_koleksi = $i['id_koleksi'];
    $judul = $i['judul'];
    $nim = $i['nim'];
    $isbn = $i['isbn'];
    $penerbit = $i['penerbit'];
    $penulis = $i['penulis'];
    $tahun_terbit = $i['tahun_terbit'];
    $nama_kategori = $i['nama_kategori'];
    ?>
    <div class="modal fade" id="modal_edit<?= $id_koleksi; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
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

    <div class="modal fade" id="modal_hapus<?= $id_koleksi; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form action="<?= base_url() . 'koleksi/hapus_koleksi'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda Yakin mau Menghapus Koleksi dengan judul "<b><?= $judul; ?></b>"</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_koleksi" value="<?= $id_koleksi; ?>">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>