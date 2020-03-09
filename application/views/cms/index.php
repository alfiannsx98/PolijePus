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
                        <th scope="col">Judul Postingan</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Isi Postingan</th>
                        <th scope="col">User</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($Kategori as $m) :
                        $id = $m['id_post'];
                        ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['judul']; ?></td>
                            <td><?= $m['kategori']; ?></td>
                            <td><?= $m['isi']; ?></td>
                            <td><?= $m['nama']; ?></td>
                            <td><?= date('d F Y', $m['tanggal']); ?></td>
                            <td><?= $m['slug']; ?></td>
                            <td><img src="<?= base_url('assets/img/post/') . $m['gambar']; ?>" class="img-thumbnail"></td>
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
                <?= form_open_multipart('cms'); ?>
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul">

                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-control">
                        <?php foreach ($getKategori as $kt) : ?>
                            <option value="<?= $kt['id']; ?>"><?= $kt['kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Isi Postingan</label>
                    <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" placeholder="Masukkan Isi"></textarea>
                </div>
                <div class="form-group">
                    <label for="" hidden>User</label>
                    <input type="text" name="id_user" id="id_user" value="<?= $user['id']; ?>" class="form-control" hidden>
                </div>
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="text" class="form-control" value="<?= date('d F Y', time()); ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" value="<?= "&token=" . urlencode(base64_encode(random_bytes(6))); ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="">Pilih Gambar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                        <label for="gambar" class="custom-file-label">Pilih Gambar yang sesuai . . .</label>
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

<!--MODAL EDIT DATA-->
<?php
foreach ($Kategori as $i) :
    $id = $i['id_post'];
    $judul = $i['judul'];
    $kategori = $i['kategori'];
    $isi = $i['isi'];
    $nama = $i['nama'];
    $tanggal = date('m/d/y', $i['tanggal']);
    $slug = $i['slug'];
    $gambar = $i['gambar'];
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