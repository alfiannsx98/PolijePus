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
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data Koleksi.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Koleksi</h3>
            <?php if (empty($koleksi)) : ?>
                <div class="alert alert-danger" role="alert">
                data tidak ditemukan.
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($koleksi as $kl) : ?>
                <li class="list-group-item">
                    <?= $kl['judul']; ?>
                    <?= $kl['nim']; ?>
                    <?= $kl['isbn']; ?>
                    <?= $kl['penerbit']; ?>
                    <?= $kl['penulis']; ?>
                    <?= $kl['tahun_terbit']; ?>
                    <?= $kl['nama_kategori']; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>