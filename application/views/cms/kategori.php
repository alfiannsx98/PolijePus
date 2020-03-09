<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('kategori', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <button type="button" data-toggle="modal" data-target="#newModal" class="btn btn-primary mb-3">Tambah Data Baru</button>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kategori as $m) :
                        $id = $m['id'];
                        ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['kategori']; ?></td>
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

</div>
<!-- End of Main Content -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newModal">Buat Data Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('cms/kategori'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
foreach ($kategori as $m) :
    $id = $m['id'];
    $kategori = $m['kategori'];
    ?>

    <div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Kategori</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form action="<?= base_url() . 'cms/edit_kategori'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="control-label col-xs-3">ID Kategori</label>
                            <div class="col-xs-8">
                                <input type="text" name="id" value="<?php echo $id; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label col-xs-3">Kategori</label>
                            <div class="col-xs-8">
                                <input type="text" name="kategori" value="<?php echo $kategori; ?>" class="form-control" required>
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
                    <h3 class="modal-title" id="myModalLabel">Hapus Kategori</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form action="<?= base_url() . 'cms/hapus_kategori'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda yakin mau menghapus data ini? <b><?= $kategori; ?></b></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>