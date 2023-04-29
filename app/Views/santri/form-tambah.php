<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-3 w-50">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Santri</h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('santri')?>" method="POST">
                <?php csrf_field(); ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </li>
                    <li class="list-group-item">
                        <label for="tempat_asal">Tempat Asal:</label>
                        <input type="text" name="tempat_asal" id="tempat_asal" class="form-control" required>
                    </li>
                    <li class="list-group-item">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                    </li>
                    <li class="list-group-item">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </li>
                </ul>
                <hr>
                <a href="<?= base_url('santri') ?>" class="btn btn-primary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
