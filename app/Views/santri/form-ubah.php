<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-3 w-50">
    <div class="card">
        <div class="card-header">
            <h3>Ubah Data Santri</h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('santri/'.$santri['id'])?>" method="POST">
                <?php csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="name" value="<?= $santri['name'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Tempat Asal</td>
                        <td><input type="text" name="tempat_asal" value="<?= $santri['tempat_asal'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td><input type="text" name="tanggal_lahir" value="<?= $santri['tanggal_lahir'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" value="<?= $santri['email'] ?>" required></td>
                    </tr>
                </table>
                <hr>
                <a href="<?= base_url('santri') ?>" class="btn btn-primary">Kembali</a>
                <input type="submit" value="ubah data" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
