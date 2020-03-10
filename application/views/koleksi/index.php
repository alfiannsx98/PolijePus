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

            <button type="button" data-toggle="modal" data-target="#newModal" class="btn btn-primary mb-3">Tambah Data Baru</button>

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
                <h5 class="modal-title" id="newModal">Buat Postingan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('arsip'); ?>
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan Nim">
                </div>
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul">
                </div>
                <div class="form-group">
                    <label for="">Abstrak</label>
                    <textarea name="abstrak" id="abstrak" cols="15" rows="10" class="form-control" placeholder="Masukkan Abstrak"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Keywords</label>
                    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Masukkan Keywords">
                </div>
                <div class="form-group">
                    <label for="">Kategori Arsip</label>
                    <select name="id_jns_arsip" id="id_jns_arsip" class="form-control">
                        <?php foreach ($getArsipJenis as $kt) : ?>
                            <option value="<?= $kt['id_jns_arsip']; ?>"><?= $kt['jns_arsip']; ?></option>
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

<!--MODAL EDIT DATA-->
<?php
foreach ($arsip as $i) :
    $nim = $i['nim'];
    $judul = $i['judul'];
    $abstrak = $i['abstrak'];
    $keywords = $i['keywords'];
    ?>
    <div class="modal fade" id="modal_edit<?= $nim; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Post</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <?= form_open_multipart('arsip/edit_arsip'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="control-label col-xs-3">NIM</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="nim" value="<?= $nim; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Judul Arsip</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="judul" value="<?= $judul; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Abstrak Arsip</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="abstrak" value="<?= $abstrak; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Keywords Arsip</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="keywords" value="<?= $keywords; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label  col-xs-3">Kategori Arsip</label>
                        <select class="form-control" name="id_jns_arsip" id="id_jns_arsip">
                            <?php foreach ($getArsipJenis as $bc) : ?>
                                <option value="<?= $bc['id_jns_arsip']; ?>"><?= $bc['jns_arsip']; ?></option>
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

    <div class="modal fade" id="modal_hapus<?= $nim; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form action="<?= base_url() . 'arsip/hapus_arsip'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda Yakin mau menghapus Arsip dengan judul "<b><?= $judul; ?></b>"</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="nim" value="<?= $nim; ?>">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>