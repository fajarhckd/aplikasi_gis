<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://fartechcom.com/">Fartechcom</a>
    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item nav-link active" href="<?= base_url(); ?>pegawai">Pegawai</a>
        <a class="nav-item nav-link" href="<?= base_url(); ?>pegawai/in_tambah">Tambah Pegawai</a>
        <a class="nav-item nav-link" href="<?= base_url(); ?>pegawai/view_map">MAP</a>
        </div>
    </div>
    </nav>
    <!-- akhir header -->

    <div class="jumbotron">
        <ul class="list-group">
        <li class="list-group-item">

        <form action="<?= base_url(); ?>pegawai/tambah_data" method="post">
        <div class="form-group">
            <label for="nama">Nama Pegawai</label>
            <input type="text" id="nama" name="nama" class="form-control"  required="">
        </div>
        <div class="form-group">
            <label for="tl">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tl" class="form-control"  required="">
        </div>
        <div class="form-group">
            <label for="tl1">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tl1" class="form-control"  required="">
        </div>

        <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select id="jk" name="jk" class="form-control" required="">
                <option value="">------ Pilih ------</option>
                <option value="L">L</option>
                <option value="P">P</option>
            </select>
        </div>
        <div class="form-group">
            <label for="cita">Cita-Cita</label>
            <input type="text" id="cita" class="form-control" name="cita"  required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>


        


        </li>
        </ul>
    </div>

</body>
</html>
