<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>

            <button type="button" data-toggle="modal" data-target="#newSubMenuModal" class="btn btn-primary mb-3">Tambah Data Baru</button>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Aktif</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) :
                        $id = $sm['id'];
                        ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td><?= $sm['is_active']; ?></td>
                            <td>
                                <button class="badge badge-pill badge-info" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Edit</button>
                                <button class="badge badge-pill badge-warning" data-toggle="modal" data-target="#modal_hapus<?= $id; ?>">Delete</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!--MODAL DIALOG UNTUK CREATE DATA!-->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModal">Data Baru Sub Menu Manajemen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul">
                    </div>
                    <div class="form-group">
                        <label for="">Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <?php foreach ($menu as $mn) : ?>
                                <option value="<?= $mn['id']; ?>"><?= $mn['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Url</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Masukkan URL">
                    </div>
                    <div class="form-group">
                        <label for="">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Masukkan Icon">
                    </div>
                    <div class="form-group">
                        <label for="">Aktivasi</label>
                        <input type="text" class="form-control" value="1" id="is_active" name="is_active" hidden>
                        <input type="text" class="form-control" value="Aktif" disabled>
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

<!--MODAL UNTUK EDIT SUBMENU-->
<?php
foreach ($subMenu as $i) :
    $id = $i['id'];
    $menu_id = $i['menu_id'];
    $title = $i['title'];
    $url = $i['url'];
    $icon = $i['icon'];
    $is_active = $i['is_active'];
    ?>
    <div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Menu</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form action="<?= base_url() . 'menu/edit_submenu'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3">ID SubMenu</label>
                            <div class="col-xs-8">
                                <input name="id" value="<?php echo $id; ?>" class="form-control" type="text" placeholder="ID SubMenu" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Judul</label>
                            <div class="col-xs-8">
                                <input name="title" value="<?php echo $title; ?>" class="form-control" type="text" placeholder="Nama Judul">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Menu</label>
                            <select name="menu_id" id="menu_id" class="form-control">
                                <?php foreach ($menu as $sb) : ?>
                                    <option value="<?= $sb['id']; ?>"><?= $sb['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Url</label>
                            <div class="col-xs-8">
                                <input name="url" value="<?= $url; ?>" placeholder="URL" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Icon</label>
                            <div class="col-xs-8">
                                <input name="icon" value="<?= $icon; ?>" placeholder="Icon" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Aktif</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
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

    <!--MODAL HAPUS DATA!-->
    <div class="modal fade" id="modal_hapus<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form action="<?= base_url() . 'index.php/menu/hapus_submenu'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda yakin mau menghapus data ini? <b><?= $title; ?></b></p>
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