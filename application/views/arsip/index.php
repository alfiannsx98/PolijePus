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
                        <th scope="col">NIM</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Abstrak</th>
                        <th scope="col">Keywords</th>
                        <th scope="col">Jenis Arsip</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($arsip as $m) :
                        $id = $m['nim'];
                        ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['nim'] ?></td>
                            <td><?= $m['judul']; ?></td>
                            <td><?= $m['abstrak']; ?></td>
                            <td><?= $m['keywords']; ?></td>
                            <td><?= $m['jns_arsip']; ?></td>
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
    <div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Post</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <?= form_open_multipart('cms/edit'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="control-label col-xs-3">ID Post</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="id_post" value="<?= $id; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Judul Postingan</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="judul" value="<?= $judul; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label  col-xs-3">Kategori</label>
                        <select class="form-control" name="id_kategori" id="id_kategori">
                            <?php foreach ($getKategori as $bc) : ?>
                                <option value="<?= $bc['id']; ?>"><?= $bc['kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-xs-3">isi</label>
                        <div class="col-xs-8">
                            <textarea name="isi" cols="30" rows="10" class="form-control"><?= $isi; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-xs-3">User</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="id_user" name="id_user" readonly value="<?= $nama; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-xs-3">Tanggal</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="tanggal" value="<?= $tanggal; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control label col-xs-3">Gambar Awal</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/post/') . $i['gambar']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                        <label for="gambar" class="custom-file-label">Pilih Gambar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
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

    <div class="modal fade" id="modal_hapus<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form action="<?= base_url() . 'cms/hapus_post'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda Yakin mau menghapus data ini <b><?= $judul; ?></b></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_post" value="<?= $id; ?>">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>