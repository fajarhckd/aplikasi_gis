<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://fartechcom.com/">Fartechcom</a>
    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#">Pegawai</a>
        <a class="nav-item nav-link" href="<?= base_url(); ?>pegawai/in_tambah">Tambah Pegawai</a>
        <a class="nav-item nav-link" href="<?= base_url(); ?>pegawai/view_map">MAP</a>
        </div>
    </div>
    </nav>
    <!-- akhir header -->

    <div class="jumbotron">
        <ul class="list-group">
        <li class="list-group-item">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">TTL</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Cita-Cita</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($data as $a){ ?>
            <tr>
            <th scope="row"><?= $no++; ?></th>
                <td><?= $a['nama']; ?></td>
                <td><?= $a['tempat_lahir']; ?>, <?= $a['tanggal_lahir']; ?></td>
                <td><?= $a['jk']; ?></td>
                <td><?= $a['cita_cita']; ?></td>
                <td><a href="<?= base_url(); ?>pegawai/tambah_map/<?= $a['id']; ?>">Tambah map</a></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
        </li>
        </ul>
    </div>

</body>
</html>
