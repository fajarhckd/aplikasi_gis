<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Map</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
    // variabel global marker
    var marker;
    
    function taruhMarker(peta, posisiTitik){
        
        if( marker ){
        // pindahkan marker
        marker.setPosition(posisiTitik);
        } else {
        // buat marker baru
        marker = new google.maps.Marker({
            position: posisiTitik,
            map: peta,
            animation: google.maps.Animation.BOUNCE
        });
        }
    
        // isi nilai koordinat ke form
        document.getElementById("lat").value = posisiTitik.lat();
        document.getElementById("lng").value = posisiTitik.lng();
        
    }
    
    function initialize() {
    var propertiPeta = {
        center:new google.maps.LatLng(-7.018590, 110.409794),
        zoom:16,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    
    var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    
    // even listner ketika peta diklik
    google.maps.event.addListener(peta, 'click', function(event) {
        taruhMarker(this, event.latLng);
    });

    }


    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
    

    </script>
</head>
<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://fartechcom.com/">Fartechcom</a>
    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item nav-link active" href="<?= base_url(); ?>pegawai">Pegawai</a>
        <a class="nav-item nav-link" href="<?= base_url(); ?>pegawai/in_tambah">Tambah Pegawai</a>
        <a class="nav-item nav-link" href="#">MAP</a>
        </div>
    </div>
    </nav>
    <!-- akhir header -->

    <div class="jumbotron">
        <ul class="list-group">
        <li class="list-group-item">

        <div id="googleMap" style="width:100%;height:500px;"></div>			


        </li>
        <li class="list-group-item">
        <form action="<?= base_url(); ?>pegawai/proses_tambah_peta" method="post">
        <input type="hidden" id="id" name="id" value="<?= $id; ?>" required="">
            <input type="text" id="lat" name="lat" value="" required="">
            <input type="text" id="lng" name="lng" value="" required="">

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
        </li>
        
        </ul>
    </div>

</body>
</html>
