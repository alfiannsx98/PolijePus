<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('user/edit_password'); ?>" method="post">
                <div class="form-group">
                    <label for="passwordSkrg">Password Lama</label>
                    <input type="password" id="passwordSkrg" name="passwordSkrg" class="form-control">
                    <?= form_error('passwordSkrg', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="passwordBaru1">Password Baru</label>
                    <input type="password" id="passwordBaru1" name="passwordBaru1" class="form-control">
                    <?= form_error('passwordBaru1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="passwordBaru2">Ulangi Password Baru</label>
                    <input type="password" id="passwordBaru2" name="passwordBaru2" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>