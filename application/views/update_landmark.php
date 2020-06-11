<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Web GIS</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">
    
        <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, textarea, p { 
      padding: 0;
      margin: 0;
      
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }.
      h1 {
      position: absolute;
      margin: 0;
      font-size: 32px;
      color: #272f33;
      z-index: 2;
      }
      .testbox {
      justify-content: center;
      align-items: center;
      align-self: center;
      height: inherit;
      padding: 20px;
      width: 500px;
      margin:auto;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 10px 0 #cc0052; 
      }
      .banner {
      position: relative;
      height: 210px;    
      background-size: cover;
      background-color: #87b8c9; 
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, input:hover::placeholder {
      color: #cc0052;
      }
      .item input:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #cc0052;
      color: #cc0052;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #cc0052;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #ff0066;
      }
      @media (min-width: 568px) {
      .name-item, .contact-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .contact-item .item {
      width: calc(50% - 8px);
      }
      .name-item input {
      width: calc(50% - 20px);
      }
      .contact-item input {
      width: calc(100% - 12px);
      }
      #mapid { height: 180px; }
      }
    </style>
  </head>
  <body>   
    <?php if ($this->session->flashdata('success')): ?>
		  <div class="alert alert-success" role="alert">
			  <?php echo $this->session->flashdata('success'); ?>
	    </div>
	  <?php endif; ?>

  <div style="background-image: url('https://image.freepik.com/free-photo/abstract-background-cement-wall-shadow-light-concept_53876-31788.jpg'); height:100%; margin:auto;">
    <div class="testbox">
      <form action="<?=base_url()?>index.php/map/updateMarker" method="POST" enctype="multipart/form-data">
        <div class="banner">
          <h1>Landmark Update Form</h1>
        </div>
            <input type="hidden" name="l_id" value="<?php echo $id ?>" />
        <div class="item">
          <p><b>Nama Landmark</b></p>
            <input type="text" name="l_name" value="<?php echo $name ?>" required />
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h5>Choose coordinate</h5> 
              <div id="mapid"></div> 
            </div>
          </div>  
        </div>
        <div class="contact-item">
          <div class="item">
            <p><b>Latitude</b></p>
            <input type="text" name="l_lat" value="<?php echo $lat ?>" id="lat_landmark" required/>
          </div>
          <div class="item">
            <p><b>Longitude</b></p>
            <input type="text" name="l_long" value="<?php echo $long ?>" id="long_landmark" required/>
          </div>
        </div>
        <div class="item">
          <p><b>Detail info</b></p>
          <input type="text" name="l_info" value="<?php echo $info ?>" required/>
        </div>
        <div class="item">
          <p><b>Foto</b></p>
          <input type="file" name="l_foto" value="" required/>
        </div>
        <div class="btn-block">
          <button type="submit" href="/">APPLY</button>
        </div>
      </form>
    </div>
  </div>  
  </body>
  

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
  
  <script type="text/javascript">
    var base_url = "<?=base_url()?>";
    var v_lat = parseFloat(<?php echo $lat ?>);
    var v_long = parseFloat(<?php echo $long ?>);

    var map = L.map('mapid').setView([v_lat, v_long], 13);

    var icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/marker.png',
      iconSize: [30,40]
    });

    var myMarker = L.marker([v_lat, v_long],{title: "MyPoint", alt: "The Big I", draggable: true, icon:icon_bangunan})
		.addTo(map)
		.on('dragend', function() {
			var coord = String(myMarker.getLatLng()).split(',');
			console.log(coord);
			lat = coord[0].split('(');
			console.log(lat);
			lng = coord[1].split(')');
			console.log(lng);
			myMarker.bindPopup("Moved to: " + lat[1] + ", " + lng[0] + ".");
		});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);
    
  </script>

   <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>