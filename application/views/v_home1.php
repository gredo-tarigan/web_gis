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
  <link href="<?=base_url()?>assets/css/simplesidebar.css" rel="stylesheet">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

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
  <div id="my-sidebar-context" class="widget-sidebar-context">
      <header id="this-header" class="navbar justify-content-start align-items-center navbar-dark bg-dark page-header">

          <a class="navbar-brand" href="#">
              WEB GIS
          </a>


          <a href="#" class="navbar-toggler widget-sidebar-toggler">
              <i class="fas fa-bars"></i>
          </a>

      </header>

    <div class="page-body">

      <!-- Sidebar <a href="https://www.jqueryscript.net/tags.php?/Navigation/">Navigation</a> -->
      <nav class="widget-sidebar">
        <ul>
          <li class="active">
            <a href="<?php echo base_url('index.php/page/v_home') ?>">
              <i class="fas fa-bars"></i><span> Map </span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-pencil-alt"></i><span> APA </span>
            </a>
          </li>
          <li>
            <a href="#sidebar-link-mycomponents" data-toggle="collapse"
               aria-expanded="true"
               class="dropdown-toggle">
                <i class="fas fa-shapes"></i><span> Akun </span>
            </a>
            <ul class="collapse show"
                id="sidebar-link-mycomponents">
                <li>
                  <a href="<?php echo base_url('index.php/page/profile') ?>">Info Akun</a>
                </li>
                <li>
                  <a href="<?php echo base_url('index.php/page/data_landmark') ?>">List Marker</a>
                </li>
                <li>
                  <a href="<?php echo base_url('index.php/page/data_user') ?>">List User</a>
                </li>
                <li>
                  <a href="<?php echo base_url('index.php/auth/logout') ?>">Logout</a>
                </li>
            </ul>
          </li>
        </ul>
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


    var map = L.map('mapid').setView([-6.5995503, 106.7992722], 15);
    map.on('click', addMarker);




    var base_url = "<?=base_url()?>";

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      maxZoom: 100
    }).addTo(map);

    var myFeatureGroup = L.featureGroup().addTo(map);
    var bangunanMarker;
    var long = "aaa";
    var lat = "";

    $.getJSON("<?=base_url()?>index.php/map/bangunan_json", function(result){
      $.each(result, function(i, field){
        var v_lat = parseFloat(result[i].bangunan_lat);
        var v_long = parseFloat(result[i].bangunan_long);

        var icon_bangunan = L.icon({
          iconUrl: base_url+'assets/images/marker.png',
          iconSize: [30,40]
        });

      // create popup contents
      var customPopup = "<center><h5><b>Landmark Information</b></h5></center>"+'<h7>Name: </h7>'+result[i].bangunan_nama+"<br/>"+"<img src='<?=base_url()?>assets/uploads/"+result[i].gambar+"' alt='map photo' width='350px'/><br><h7>Detail : </h7>"+result[i].keterangan+"<br/><a href='<?=base_url()?>index.php/map/deleteMarker/"+result[i].bangunan_id+"'>Delete</a>&nbsp;&nbsp;&nbsp;<a href='<?=base_url()?>index.php/page/update_landmark/"+result[i].bangunan_id+"'>Update</a>";

      // specify popup options
      var customOptions =
          {
          'maxWidth': '500',
          'maxHeight': '1000',
          'className' : 'custom'
          }

        bangunanMarker = L.marker([v_lat,v_long],{icon:icon_bangunan}).bindPopup(customPopup,customOptions).addTo(myFeatureGroup)
        littleton = L.marker([39.61, -105.02],{icon:icon_bangunan}).bindPopup(customPopup,customOptions).addTo(myFeatureGroup)
        denver = L.marker([39.74, -104.99],{icon:icon_bangunan}).bindPopup(customPopup,customOptions).addTo(myFeatureGroup)
        aurora = L.marker([39.73, -104.8],{icon:icon_bangunan}).bindPopup(customPopup,customOptions).addTo(myFeatureGroup)
        golden = L.marker([39.77, -105.23],{icon:icon_bangunan}).bindPopup(customPopup,customOptions).addTo(myFeatureGroup)

        var cities = L.layerGroup([littleton, denver]);
        var cities1 = L.layerGroup([aurora, golden]);


        var overlayMaps = {
            "Cities": cities,
            "apa": cities1
        };

        var overlayMaps1 = {
            "Cities": bangunanMarker
        };

        L.control.layers(overlayMaps1,overlayMaps).addTo(map);


        bangunanMarker.id =  result[i].bangunan_id;
      });
    });

    function addMarker(e){
      // Add marker to map at click location; add popup window
      var latlng = e.latlng.toString();

      alert(e.latlng);

      var addPopup =  "<h5>Add Landmark</h5><br>"+latlng+"<form action=\"<?=base_url()?>index.php/map/addMarker\" method=\"POST\" enctype=\"multipart/form-data\"> <label for=\"landmark_nama\">Name:</label><br><input type=\"text\" id=\"l_name\" name=\"l_name\" required><br>\ <label for=\"landmark_latitude\">Latitude:</label><br><input type=\"text\" id=\"l_lat\" name=\"l_lat\" required><br><label for=\"landmark_longitude\">Longitude:</label><br><input type=\"text\" id=\"l_long\" name=\"l_long\" required><br><label for=\"landmark_info\">Detail Information:</label><br><input type=\"text\" id=\"l_info\" name=\"l_info\" required><br><label for=\"landmark_foto\">Photo:</label><br><input type=\"file\" id=\"l_foto\" name=\"l_foto\" required><br><br><input type=\"submit\" value=\"Submit\"></form>";

      var customOptions =
        {
          'maxWidth': '500',
          'className' : 'custom'
        };

      var newMarker = new L.marker(e.latlng).bindPopup(addPopup,customOptions).addTo(map);
    }

    $(function(){
  $("#my-sidebar-context").simpleSidebar();
});




  </script>

    <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>assets/css/simplesidebar.js"></script>
  </div>
</body>
</html>
