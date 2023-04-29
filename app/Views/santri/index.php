<!-- views/index.php -->

<!-- Extends layout/template -->
<?= $this->extend("layouts/template"); ?>

<!-- Define content section -->
<?= $this->section("content"); ?>

<div class="container">
    <div class="card my-3">
        <div class="card-header">
            <h3>Data Santri</h3>
        </div>
        <div class="card-body">
            <a href="<?= base_url('santri/new') ?>">Tambah Data Santri</a>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>Nama</th>
                    <th>Tempat Asal</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                </tr>
                <!-- Loop through santri data from controller -->
                <?php foreach ($santri as $s) : ?>
                    <tr>
                        <td><?= $s['name'] ?></td>
                        <td><?= $s['tempat_asal'] ?></td>
                        <td><?= $s['tanggal_lahir'] ?></td>
                        <td><?= $s['email'] ?></td>
                        <td>
                            <ul class="nav">
                                <a href="<?= base_url('santri/'.$s['id']) ?>" class="btn btn-success mr-2">Show</a>
                                <a href="<?= base_url('santri/'.$s['id'].'/edit') ?>" class="btn btn-secondary mr-2">Edit</a>
                                <form action="<?= base_url('santri/' . $s['id']) ?>" method="POST">
                                    <?php csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-warning mr-2" onclick="confirm('Hapus data?')">Delete</button>
                                </form>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<!-- End content section -->
<?= $this->endSection(); ?>
