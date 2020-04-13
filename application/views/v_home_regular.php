<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Web GIS</title>

  <!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
    <!-- Bootstrap -->
  <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"> -->

  <link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
  .user{
    padding:5px;
    margin-bottom: 5px;
  }
  #mapid { height: 480px; }
</style>
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <img src='https://upload.wikimedia.org/wikipedia/commons/e/e4/Globe.png' alt='maptime logo gif' width='45px' height='40px'/>";
      <a class="navbar-brand" href="<?php echo base_url('index.php/page/v_home') ?>">Web GIS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('index.php/page/v_home') ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/page/profile') ?>">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/auth/logout') ?>">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!--Normale contenuto di pagina-->
  <div class="container">
	  <div class="row">
      <div class="col-md-12">
      <br>
      <br>
        <h3>Map</h3> 
	  	  <div id="mapid"></div> 
      </div>
    </div>  
  </div>
  <!--Normale contenuto di pagina-->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>

  <script type="text/javascript">

    var map = L.map('mapid').setView([-41.2868811, 174.7723432], 13);
    map.on('click', addMarker);

    var base_url = "<?=base_url()?>";

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      maxZoom: 100
    }).addTo(map);
    
    var myFeatureGroup = L.featureGroup().addTo(map);
    var bangunanMarker;

    $.getJSON("<?=base_url()?>index.php/map/bangunan_json", function(result){
      $.each(result, function(i, field){
        var v_lat = parseFloat(result[i].bangunan_lat);
        var v_long = parseFloat(result[i].bangunan_long);

        var icon_bangunan = L.icon({
          iconUrl: base_url+'assets/images/marker.png',
          iconSize: [30,40]
        });

      // create popup contents
      var customPopup = "<center><h5><b>Landmark Information</b></h5></center><br>"+'<h7>Name: </h7>'+result[i].bangunan_nama+"<br/>"+"<img src='<?=base_url()?>assets/uploads/"+result[i].gambar+"' alt='map photo' width='350px'/><br><h7>Detail : </h7>"+result[i].keterangan"";

      // specify popup options 
      var customOptions =
          {
          'maxWidth': '1000',
          'className' : 'custom'
          }

        bangunanMarker = L.marker([v_lat,v_long],{icon:icon_bangunan}).bindPopup(customPopup,customOptions).addTo(myFeatureGroup)

        bangunanMarker.id =  result[i].bangunan_id;
      });
    });

    function addMarker(e){
      // Add marker to map at click location; add popup window
      var latlng = e.latlng.toString();
      lat = latlng.substr(7,10);
      long = latlng.substr(20,15); 
  
      alert(e.latlng);

      var addPopup =  "<h5>Add Landmark</h5><br>"+latlng+"<form action=\"<?=base_url()?>index.php/map/addMarker\" method=\"POST\" enctype=\"multipart/form-data\"> <label for=\"landmark_nama\">Name:</label><br><input type=\"text\" id=\"l_name\" name=\"l_name\" required><br>\ <label for=\"landmark_latitude\">Latitude:</label><br><input type=\"text\" id=\"l_lat\" name=\"l_lat\" required><br><label for=\"landmark_longitude\">Longitude:</label><br><input type=\"text\" id=\"l_long\" name=\"l_long\" required><br><label for=\"landmark_info\">Detail Information:</label><br><input type=\"text\" id=\"l_info\" name=\"l_info\" required><br><label for=\"landmark_foto\">Photo:</label><br><input type=\"file\" id=\"l_foto\" name=\"l_foto\" required><br><br><input type=\"submit\" value=\"Submit\"></form>";
      
      var customOptions =
        {
          'maxWidth': '500',
          'className' : 'custom'
        };

      var newMarker = new L.marker(e.latlng).bindPopup(addPopup,customOptions).addTo(map);
    }
  </script>

    <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>