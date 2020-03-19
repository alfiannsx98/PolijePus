<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-12">
        <h3>Daftar Koleksi</h3>
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data Koleksi Buku / Skripsi / Tugas Akhir.." name="keyword" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">

            <h5><b>Hasil : <?= $total_rows; ?></b></h5>
            <ul class="list-group">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">NIM</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php if (empty($koleksi)) : ?>
                    <tr>
                        <td colspan="9">
                            <div class="alert alert-danger" role="alert">
                            data tidak ditemukan.
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                <?php foreach ($koleksi as $kl) : ?>
                <?php $id = $kl['id_koleksi']; ?>
                <tr>
                <li class="list-group-item">
                <th scope="row"><?= ++$start ?></th>
                    <td><?= $kl['judul']; ?></td>
                    <td><?= $kl['nim']; ?></td>
                    <td><?= $kl['isbn']; ?></td>
                    <td><?= $kl['penerbit']; ?></td>
                    <td><?= $kl['penulis']; ?></td>
                    <td><?= $kl['tahun_terbit']; ?></td>
                    <td><?= $kl['nama_kategori']; ?></td>
                    <td><button class="badge badge-primary float-right" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">detail</button></td>
                </li>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </ul>
        </div>
    </div>


    <!-- Modal Detail -->

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
                    <h3 class="modal-title" id="myModalLabel">Detail Data Koleksi</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <?= form_open_multipart('koleksi/edit_koleksi'); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header"></div>
                            <div class="card-body">
                                <h5 class="card-title">Judul Buku = "<?= $i['judul']; ?>"</h5>
                                <h6 class="card-text">Pengarang Buku = "<?= $i['nim']; ?>"</h6>
                                <h6 class="card-text"><?= $i['isbn']; ?></h6>
                                <h6 class="card-text"><?= $i['penerbit']; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <br>
        <?= $this->pagination->create_links();?>
</div>