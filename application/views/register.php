<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Web GIS </title>

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">

    <!-- Font Icon -->
    <link rel="stylesheet" href="../../assets/login_register_assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../../assets/login_register_assets/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="<?php echo base_url('index.php/auth/register') ?>" novalidate="novalidate" onSubmit="return validasi()">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username" required=""/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required=""/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="submit" required=""/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../../assets/login_register_assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="<?php echo base_url('index.php/auth') ?>" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        function validasi() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var name = document.getElementById("name").value;
            var address = document.getElementById("address").value; 
            var phone = document.getElementById("phone").value;  		
            if (username != "" && password!="" && name != "" && address !="" && phone != null) {
                return true;
            }else{
                alert('All form must be filled!');
                return false;
            }
        }    
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>