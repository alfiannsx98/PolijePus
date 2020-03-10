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
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Pengarang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $m) :
                        $id = $m['kode_buku'];
                        ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['judul']; ?></td>
                            <td><?= $m['kategori']; ?></td>
                            <td><?= $m['penerbit']; ?></td>
                            <td><?= $m['pengarang']; ?></td>
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
                <h5 class="modal-title" id="newModal">Tambah Data Buku</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('buku'); ?>
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
                    <label for="">Penerbit</label>
                    <textarea name="penerbit" id="penerbit" cols="30" rows="10" class="form-control" placeholder="Masukkan Penerbit"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Pengarang</label>
                    <textarea name="pengarang" id="pengarang" cols="30" rows="10" class="form-control" placeholder="Masukkan Pengarang"></textarea>
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
foreach ($buku as $i) :
    $id = $i['kode_buku'];
    $judul = $i['judul'];
    $kategori = $i['kategori'];
    $penerbit = $i['penerbit'];
    $pengarang = $i['pengarang'];
    ?>
    <div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Buku</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <?= form_open_multipart('buku/edit'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="control-label col-xs-3">Kode Buku</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="kode_buku" value="<?= $id; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Judul Buku</label>
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
                        <label for="" class="control-label col-xs-3">Penerbit</label>
                        <div class="col-xs-8">
                            <textarea name="isi" cols="30" rows="10" class="form-control"><?= $penerbit; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-xs-3">Pengarang</label>
                        <div class="col-xs-8">
                            <textarea name="isi" cols="30" rows="10" class="form-control"><?= $pengarang; ?></textarea>
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
                <form action="<?= base_url() . 'buku/hapus_buku'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda Yakin mau menghapus data ini <b><?= $judul; ?></b></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="kode_buku" value="<?= $id; ?>">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>