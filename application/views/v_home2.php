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

  <title>Sistem Informasi Geografis</title>

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
      <!--<header id="this-header" class="navbar justify-content-start align-items-center navbar-dark bg-dark page-header">

          <a class="navbar-brand" href="#">
              WEB GIS
          </a>


          <a href="#" class="navbar-toggler widget-sidebar-toggler">
              <i class="fas fa-bars"></i>
          </a>

      </header>-->
    <!--Navbar atas-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <!--<img src='https://upload.wikimedia.org/wikipedia/commons/e/e4/Globe.png' alt='maptime logo gif' width='45px' height='40px'/>
        <a class="navbar-brand" href="<?php echo base_url('index.php/page/v_home') ?>">Web GIS</a>-->
        <img src="<?php echo base_url('assets/images/logo_pbd.png'); ?>" alt='maptime logo gif' width='45px' height='40px'/>
        <a class="navbar-brand" href="<?php echo base_url('index.php/page/v_home') ?>">&nbsp; Sistem Informasi Geografis</a>
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
              <a class="nav-link" href="<?php echo base_url('index.php/page/data_landmark') ?>">List Marker</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/page/data_user') ?>">List User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/auth/logout') ?>">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Navbar atas-->

    <div class="page-body">
      <!-- Sidebar <a href="https://www.jqueryscript.net/tags.php?/Navigation/">Navigation</a> -->
      <!--<nav class="widget-sidebar">
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
      </nav>-->

  <!--Container Map-->
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
  <!--Container Map-->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
  <script src="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.js"></script>
  <script src="<?=base_url()?>assets/leaflet-kml-master/L.KML.js"></script>

  <!--Map Script-->
  <script type="text/javascript">


    var map = L.map('mapid').setView([-6.5995503, 106.7992722], 15);
    map.on('click', addMarker);




    var base_url = "<?=base_url()?>";

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      maxZoom: 100
    }).addTo(map);

    // Load kml file
fetch('<?=base_url()?>assets/kml-file/Semua-Kecamatan-di-Kabupaten-Klaten.kml')
.then(res => res.text())
.then(kmltext => {
    // Create new kml overlay
    const parser = new DOMParser();
    const kml = parser.parseFromString(kmltext, 'text/xml');
    const track = new L.KML(kml);
    map.addLayer(track);

    // Adjust map to show the kml
    const bounds = track.getBounds();
    map.fitBounds(bounds);
});

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
      var customPopup = "<center><h5><b>Informasi Marker</b></h5></center>"+'<h7>Name: </h7>'+result[i].bangunan_nama+"<br/>"+"<img src='<?=base_url()?>assets/uploads/"+result[i].gambar+"' alt='map photo' width='350px'/><br><h7>Detail : </h7>"+result[i].keterangan+"<br/><a href='<?=base_url()?>index.php/map/deleteMarker/"+result[i].bangunan_id+"'>Delete</a>&nbsp;&nbsp;&nbsp;<a href='<?=base_url()?>index.php/page/update_landmark/"+result[i].bangunan_id+"'>Update</a>";

      // specify popup options
      var customOptions =
          {
          'maxWidth': '500',
          'maxHeight': '1000',
          'className' : 'custom'
          }

        bangunanMarker = L.marker([v_lat,v_long],{icon:icon_bangunan}).bindPopup(customPopup,customOptions).addTo(myFeatureGroup)
        bangunanMarker.id =  result[i].bangunan_id;

        $.getJSON("<?=base_url()?>index.php/mappolygon/getPolygon", function(result){
    $.each(result, function(i, field){
      var coordinates =  JSON.parse(result[i].coordinates)
          for(var x=0; x<coordinates.length; x++){
              coordinates[x] = [coordinates[x][1], coordinates[x][0]]
          }

          // create popup contents
          var customPopup = "<center><h3><b>Landmark Information</b></h3></center>"+'<h7>Name: </h7>'+result[i].name_polygon+"<br/>"+"<img src='<?=base_url()?>assets/uploads/"+result[i].photo+"' alt='map photo' width='350px'/><br><h7>Detail : </h7>"+result[i].information+"<br/><a href='<?=base_url()?>index.php/mappolygon/deletePolygon/"+result[i].id_polygon+"'>Delete</a>&nbsp;&nbsp;&nbsp;<a href='<?=base_url()?>index.php/page/update_landmark_polygon/"+result[i].id_polygon+"'>Update</a>";

          // specify popup options
          var customOptions =
              {
              'maxWidth': '500',
              'maxHeight': '1000',
              'className' : 'custom'
              }

          var polygon = L.polygon(coordinates).bindPopup(customPopup,customOptions).addTo(map);
      });
    });



    //Add function to Polygon or Marker
    // Initialise the FeatureGroup to store editable layers
    var editableLayers = new L.FeatureGroup();
    map.addLayer(editableLayers);

    var drawPluginOptions = {
    position: 'topright',
    draw: {
        polygon: {
        allowIntersection: false, // Restricts shapes to simple polygons
        drawError: {
            color: '#e1e100', // Color the shape will turn when intersects
            message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
        },
        shapeOptions: {
            color: '#97009c'
        }
        },
        // disable toolbar item by setting it to false
        polyline: false,
        circle: false, // Turns off this drawing tool
        circlemarker: false,
        rectangle: false,
        marker: true,
        },
    edit: {
        featureGroup: editableLayers, //REQUIRED!!
        remove: false
    }
    };

    // Initialise the draw control and pass it the FeatureGroup of editable layers
    var drawControl = new L.Control.Draw(drawPluginOptions);
    map.addControl(drawControl);

    var editableLayers = new L.FeatureGroup();
    map.addLayer(editableLayers);
    //editableLayers.on('click', addMarker);

    var polygon = null;
    //Function to send coordinates to Database
    map.on('draw:created', function(e) {

    var type = e.layerType,
        layer = e.layer;

    polygon = layer.toGeoJSON()
    var coordMarkerLat = JSON.stringify(polygon.geometry.coordinates[1]);
    var coordMarkerLong = JSON.stringify(polygon.geometry.coordinates[0]);
    var coordPolygon = JSON.stringify(polygon.geometry.coordinates[0]);

    if(type === 'marker'){
        var addPopup =  `<h3>Add Landmark</h3>`+coordMarkerLat+", "+coordMarkerLong+
        `<form action="<?=base_url()?>index.php/map/addMarker" method="POST" enctype="multipart/form-data">
            <label for="landmark_nama">Name:</label><br>
                <input type="text" id="l_name" name="l_name" required><br>
            <label for="landmark_latitude">Latitude:</label><br>
                <input type="text" id="l_lat" name="l_lat" required><br>
            <label for="landmark_longitude">Longitude:</label><br>
                <input type="text" id="l_long" name="l_long" required><br>
            <label for="landmark_info">Detail Information:</label><br>
                <input type="text" id="l_info" name="l_info" required><br>
            <label for="landmark_foto">Photo:</label><br>
                <input type="file" id="l_foto" name="l_foto" required><br><br>
                <input type="submit" value="Submit">
        </form>`;

        var customOptions =
            {
            'maxWidth': '500',
            'className' : 'custom'
            };
        layer.bindPopup(addPopup,customOptions);
    }
    else if(type === 'polygon'){
    var addPopup =  `<h3>Add Landmark</h3>`+coordPolygon+`
      <form action="<?=base_url()?>index.php/mappolygon/addPolygon" method="POST" enctype="multipart/form-data">
          <label for="landmark_nama">Name:</label><br>
              <input type="text" id="l_name" name="l_name" required><br>
          <label for="landmark_coordinates">Coordinates:</label><br>
              <input type="text" id="l_coord" name="coordinates" required><br>
          <label for="landmark_info">Detail Information:</label><br>
              <input type="text" id="l_info" name="l_info" required><br>
          <label for="landmark_foto">Photo:</label><br>
              <input type="file" id="l_foto" name="l_foto" required><br><br>
          <input type="submit" value="Submit">
      </form>`;

    var customOptions =
        {
        'maxWidth': '500',
        'className' : 'custom'
        };

        layer.bindPopup(addPopup,customOptions);
    }

    editableLayers.addLayer(layer);
    });

  </script>
  <!--Map Script-->

    <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>assets/css/simplesidebar.js"></script>
  </div>
</body>
</html>
