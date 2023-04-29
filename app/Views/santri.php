<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>table {
  border-collapse: collapse;
  width: 75%;
}

td, th {
  padding: 4px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

td:first-child {
  padding-right: 15px;
}

</style>
</head>
<body>

   <!-- navbar -->
   <nav class="navbar navbar-expand bg-success">
    <ul class="nav">
        <li>
            <a href="<?= base_url('home') ?>" class="nav-link text-dark"><h5><em>Home</em></h5></a>
        </li>
        <li>
            <a href="<?= base_url('data-santri') ?>" class="nav-link text-dark"><h5><em>Data Santri</em></h5></a>
        </li>
        <li>
        <a href="<?= base_url('info-kegiatan') ?>" class="nav-link text-dark"><h5><em>Info Kegiatan</em></h5></a>
        </li>
        <li>
        <a href="<?= base_url('santri') ?>" class="nav-link text-dark"><h5><em>Santri</em></h5></a>
        </li>
    </ul>
        <!-- tombol login/register -->
     <ul class="navbar-nav ml-auto">
            <li class="nav-link">
                <a href="<?= base_url('login') ?>" class="btn btn-outline-dark">Login</a>
            </li>
            <li class="nav-link">
                <a href="<?= base_url('registrasi') ?>" class="btn btn-outline-dark">Registrasi</a>
            </li>
        </ul>
</nav>
<?php if (session()->get('role') === 'admin') : ?>
<h3>Data Santri</h3>
<table class="table-bordered table-striped" style="padding: 10px;">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tempat Asal</th>
            <th>Tanggal Lahir</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Putra Septiadi Pratama</td>
            <td>Bogor</td>
            <td>15-09-06</td>
        </tr>
        <tr>
            <td>Wilhan Ramadhan</td>
            <td>Depok</td>
            <td>29-09-06</td>
        </tr>
        <tr>
            <td>Afrizal Ibrahim</td>
            <td>Kalimantan Tengah</td>
            <td>18-04-06</td>
        </tr>
    </tbody>
</table>
<?php else : ?>
    <div class="alert alert-danger" role="alert">
        Anda tidak memiliki akses untuk melihat data
    </div>
<?php endif; ?>


<footer class="fixed-bottom bg-success text-white">
        <div class="text-center">
            Daarussholihin
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>