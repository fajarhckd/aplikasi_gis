<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Map</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--script google map-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js');?>"></script>
    <!--script google map-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script>
    $(document).on('click','#viewmarkerpegawai',viewmarkerpegawai);
        var map;
        var markers = [];

        function initialize() {
            var mapOptions = {
            zoom: 16,
            // Center di kantor kabupaten kudus
            center: new google.maps.LatLng(-7.018590, 110.409794)
            };

            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            // Add a listener for the click event
            google.maps.event.addListener(map, 'rightclick', addLatLng);
            google.maps.event.addListener(map, "rightclick", function(event) {
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();		  
            $('#latitude').val(lat);
            $('#longitude').val(lng);
            //alert(lat +" dan "+lng);
            });
        }

        /**
        * Handles click events on a map, and adds a new point to the marker.
        * @param {google.maps.MouseEvent} event
        */
        function addLatLng(event) {
            var marker = new google.maps.Marker({
            position: event.latLng,
            title: 'Simple GIS',
            map: map
            });
            markers.push(marker);
        }
        //membersihkan peta dari marker
        function clearmap(e){
            e.preventDefault();
            $('#latitude').val('');
            $('#longitude').val('');
            setMapOnAll(null);
        }
        //buat hapus marker
        function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
        markers = [];
        }
        //end buat hapus marker
        function viewmarkerpegawai(e){
            e.preventDefault();
            var datakoordinat = {'id':$(this).data('idpegawai')};
            $.ajax({
                url : '<?php echo site_url("pegawai/viewmarkerpegawai") ?>',
                data : datakoordinat,
                dataType : 'json',
                type : 'POST',
                success : function(data,status){
                    if (data.status!='error') {
                        clearmap(e);
                        //load marker
                        $.each(data.msg,function(m,n){
                            var myLatLng = {lat: parseFloat(n["latitude"]), lng: parseFloat(n["longitude"])};
                            console.log(m,n);
                            $.each(data.data_pegawai,function(k,v){
                                addMarker(v['nama'],myLatLng);
                            })
                            return false;
                        })
                        //end load marker
                    }else{
                        alert(data.msg);
                    }
                }
            })
        }
        // Menampilkan marker lokasi jembatan
        function addMarker(nama,location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                animation: google.maps.Animation.BOUNCE,
                title : nama
            });
            markers.push(marker);
        }

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
        <a class="nav-item nav-link" href="<?= base_url(); ?>pegawai/view_map">MAP</a>
        </div>
    </div>
    </nav>
    <!-- akhir header -->

    <div class="jumbotron">
        <ul class="list-group">
        <li class="list-group-item">
            <div class="panel-body" style="height:400px;" id="map-canvas">		
        </li>
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
                    <td><button class="btn-info btn btn-sm" id="viewmarkerpegawai" data-idpegawai="<?= $a['id'] ?>"><span class="glyphicon-globe glyphicon"></span> View marker</button></td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
        </li>
        
        </ul>
    </div>

</body>
</html>
