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

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

  <style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Lato:400,700);
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
      width: 100%;
      margin: 10px 0;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
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
                <a class="nav-link" href="<?php echo base_url('index.php/page/profile') ?>">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('index.php/auth/logout') ?>">Logout</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>

<div style="background-image: url('https://image.freepik.com/free-photo/abstract-background-cement-wall-shadow-light-concept_53876-31788.jpg'); height:100%; margin:auto;">
    <div class="testbox">
      <form>
        <div class="banner">
          <h1>Profile Page</h1>
        </div>
            <input type="hidden" name="l_id" value="<?php echo $id ?>" />
        <div class="item">
          <p><b>Name : <?php echo $name ?></b></p>
        </div>
        <br>
        <div class="item">
          <p><b>Username : <?php echo $username ?></b></p>
        </div>
        <br>
        <div class="item">
          <p><b>Password : <?php echo $password ?></b></p>
        </div>
        <br>
        <div class="item">
          <p><b>Level : <?php echo $level ?></b></p>
        </div>
 
      </form>
        <div class="btn-block">
          <a class="btn btn-success" href="#editUserModal" data-toggle="modal">Update</a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>  
  </div>

  	<!-- Edit Modal HTML -->
	<div id="editUserModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?=base_url()?>index.php/user/updateUser" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Edit User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
                        <input type="hidden" id="id_User1" name="u_id" value="<?php echo $id ?>"/>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="u_name" id="name_User" value="<?php echo $name ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="u_username" id="username_User" value="<?php echo $username ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="u_password" id="password_User" value="<?php echo $password ?>" required>
                        </div>
                            <input type="hidden" class="form-control" name="u_level" id="level_User" value="<?php echo $level ?>" required>										
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>


    <!-- Bootstrap core JavaScript -->
    <script src="<?=base_url()?>assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</body>
</html>