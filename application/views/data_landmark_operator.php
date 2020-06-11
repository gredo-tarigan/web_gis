<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Web GIS</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

<link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}
	#map { height: 180px; }
	#mapedit { height: 180px; }
    }	
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
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/page/v_home') ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('index.php/page/data_landmark') ?>">Landmark</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/auth/logout') ?>">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Landmark <b>Data</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addLandmarkModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Landmark</span></a>
						<a href="#deleteLandmarkModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete All</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
			<thead>
                    <tr>
						<th>Id</th>
                        <th>Name</th>
                        <th>Latitude</th>
						<th>Longitude</th>
                        <th>Detail Information</th>
						<th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($landmark as $landmarks): ?>
                    <tr>
						<td>
                            <?php echo $landmarks->bangunan_id?>
						</td>
                        <td><?php echo $landmarks->bangunan_nama?></td>
                        <td><?php echo $landmarks->bangunan_lat?></td>
						<td><?php echo $landmarks->bangunan_long?></td>
                        <td><?php echo $landmarks->keterangan?></td>
						<td><img src='<?=base_url()?>assets/uploads/<?php echo $landmarks->gambar?>' alt='maptime logo gif' width='100px' height='70px'/></td>
                        <td>
                            <a href="#editLandmarkModal" class="edit" data-toggle="modal" onclick="getData('<?php echo $landmarks->bangunan_id?>', '<?php echo $landmarks->bangunan_nama?>', '<?php echo $landmarks->bangunan_lat?>', '<?php echo $landmarks->bangunan_long?>', '<?php echo $landmarks->keterangan?>', '<?php echo $landmarks->gambar?>')"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteLandmarkModalID" class="delete" data-toggle="modal" onclick="getID(<?php echo $landmarks->bangunan_id?>)"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>all</b> data <br><a href="<?php echo base_url() ?>index.php/map/export">Export to Excel</a></div>	
            </div>
        </div>
    </div>
	<!-- ADD Modal HTML -->
	<div id="addLandmarkModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>index.php/map/addMarker1" method="POST" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Add Landmark</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="l_name" required>
						</div>

						<div id="map"></div>

						<div class="form-group">
							<label>Latitude</label>
							<input type="text" class="form-control" name="l_lat" required>
						</div>
						<div class="form-group">
							<label>Longitude</label>
							<input type="text" class="form-control" name="l_long" required>
						</div>
						<div class="form-group">
							<label>Detail Information</label>
							<input type="text" class="form-control" name="l_info" required>
						</div>
						<div class="form-group">
							<label>Photo</label>
							<input type="file" class="form-control" name="l_foto" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" >
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editLandmarkModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>index.php/map/updateMarker1" method="POST" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Landmark</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="deleteMarker()">&times;</button>
					</div>
					<div class="modal-body">
                        <input type="hidden" id="id_landmark1" name="l_id" value=""/>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="l_name" id="name_landmark" value="" required>
                        </div>

						<div id="mapedit"></div>

                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" class="form-control" name="l_lat" id="lat_landmark" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" class="form-control" name="l_long" id="long_landmark" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Detail Information</label>
                             <input type="text" class="form-control" name="l_info" id="info_landmark" value="" required>
                        </div>
						<div class="form-group">
							<label>Photo</label>
							<input type="file" class="form-control" name="l_foto" required>
						</div>										
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" onclick="deleteMarker()"></input>
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteLandmarkModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>index.php/map/deleteAll">
					<div class="modal-header">						
						<h4 class="modal-title">Delete All Landmarks</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete all landmarks?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>

    	<!-- Delete Modal HTML -->
	<div id="deleteLandmarkModalID" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>index.php/map/deleteByID" method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Delete Landmark</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
                        <input type="hidden" id="id_landmark" name="l_id" value=""/>
					<div class="modal-body">					
						<p>Are you sure you want to delete these landmark?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    <!-- Bootstrap core JavaScript -->
	<script src="<?=base_url()?>assets/vendor/jquery/jquery.slim.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
  
  <script type="text/javascript">
    var base_url = "<?=base_url()?>";

    var map = L.map('map').setView([-41.2868811, 174.7723432], 13);
	map.on('click', addMarker);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);

	function addMarker(e){
      // Add marker to map at click location; add popup window
      var latlng = e.latlng.toString();
      var addPopup = latlng;
      var customOptions =
        {
          'maxWidth': '500',
          'className' : 'custom'
        };

      var newMarker = new L.marker(e.latlng).bindPopup(addPopup,customOptions).addTo(map);
    }

	//Map for edit
	var v_long = null;
	var v_lat =  null;
	var myMarker = null;

	var map1 = L.map('mapedit').setView([-41.2868811, 174.7723432], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map1);

	var icon_bangunan = L.icon({
      iconUrl: base_url+'assets/images/marker.png',
      iconSize: [30,40]
    });

	function getID(data){
        document.getElementById("id_landmark").value = data;
    }

	function getData(id, name, lat, long, info){
		v_long = parseFloat(long);
		v_lat = parseFloat(lat);

		myMarker = L.marker([v_lat, v_long],{title: "MyPoint", alt: "The Big I", draggable: true, icon:icon_bangunan})
		.addTo(map1)
		.on('dragend', function() {
			var coord = String(myMarker.getLatLng()).split(',');
			console.log(coord);
			lat = coord[0].split('(');
			console.log(lat);
			lng = coord[1].split(')');
			console.log(lng);
			myMarker.bindPopup("Moved to: " + lat[1] + ", " + lng[0] + ".");
		});

        document.getElementById("id_landmark1").value = id;
        document.getElementById("name_landmark").value = name;
        document.getElementById("lat_landmark").value = lat;
        document.getElementById("long_landmark").value = long;
        document.getElementById("info_landmark").value = info;
		document.getElementById("foto_landmark").value = gambar;
    }

	function deleteMarker(){
		map1.removeLayer(myMarker);
	}	
    
  </script>
</html>                                		                            