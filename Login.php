<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin Console</title>
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" >
<link href="css/font-awesome.min.css" rel="stylesheet" >
<link href="css/style.css" rel="stylesheet">
<link href="css/nav.css" rel="stylesheet">
<link href="css/global.css" rel="stylesheet">
<link href="css/authentication.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>
</head>
<body>


<section id="aulog">
 <div class="aulog_m">
  <div class="container-fluid ">
  <div class="row">
   <div class="col-lg-5 col-xl-4 col-md-6 p-0">
    <div class="aulog_l bg-white" style="padding:40px;">
    	<center>	  <h5 class="mb-0"><img src="img/logo1.webp" width="100px"> <a class="text-black" href="index.html"> <br> <br>LOGIN SISTEMA</a></h5> <br> <br>
</center>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <!-- Inklui kódigu CSS, JavaScript ne'ebé presiza -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>




    <h1>Login Form</h1>
    <form action="auth.php" method="POST" onsubmit="return validateForm()">
        <!-- Elementu sira seluk iha formuláriu -->
        <h6 class="mt-4">Email address</h6>
        <input class="form-control" placeholder="Enter email" type="text" name="username">
        <small><p>Favor prense Username ho Email atu bele asesu ba ita nia konta.</p></small>
        <h6 class="mt-4">Password <span class="font_12 pull-right"><a class="col_3" href="#">Sei hein sira nia senha? Senha</a></span></h6>
        <input class="form-control" placeholder="Enter password" type="password" name="password" id="password">
        <span id="passwordError" class="text-danger"></span> <!-- Hatama mensajen erro -->
		<br>
        <!-- ReCAPTCHA -->
		<div class="g-recaptcha" data-sitekey="6LeIJTkoAAAAANOKEs4x7gFENYukeQrGWZg1QP3t	"></div>

        <!-- Botão de submissão -->
        <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-sign-in"></i> Login </button>
    </form>
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            // Validasaun ba mínimu karakter 4
            if (password.length < 4) {
                document.getElementById("passwordError").innerHTML = "Senha tenki iha pelo menus karakter 4.";
                return false; // Formuláriu la sei halo submisaun
            } else if (password.length > 5) {
                alert("Senha suksesu!"); // Alerta bilaik senha liur husi 5
                return true; // Formuláriu sei halo submisaun
            } else {
                document.getElementById("passwordError").innerHTML = ""; // Hamenus mensajen erro bilaik senha validu
                return true; // Formuláriu sei halo submisaun
            }
        }
    </script>
</body>
</html>
<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        // Validasaun ba mínimu karakter 4
        if (password.length < 4) {
            document.getElementById("passwordError").innerHTML = "Senha tenki iha pelo menus karakter 4.";
            return false; // Formuláriu la sei halo submisaun
        } else if (password.length > 5) {
            alert("Senha suksesu!"); // Alerta bilaik senha liur husi 5
            return true; // Formuláriu sei halo submisaun
        } else {
            document.getElementById("passwordError").innerHTML = ""; // Hamenus mensajen erro bilaik senha validu
            return true; // Formuláriu sei halo submisaun
        }
    }
</script>
	  <div class="aulog_li mt-4 text-center">
	   <p class="col_3">Sign in with</p>
	   <ul class="social-network social-circle">
					<li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
					<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
	  </ul>
		<p>Don't have an account? <a href="#">Sign Up</a></p>
	  </div>
	</div>
   </div>
   <div class="col-xl-8 col-lg-7  col-md-6 p-0">  
    <div class=" text-center">
	  <h4 class="text-light mt-5"> SISTEMA INFORMASAUN REGISTU BAINAKA IHA MINISTERIU FINANSAS BAUCAU</h4>
	  <h4 class="text-light">BAZEADU WEBSITE</h4>
	</div>
   </div>
  </div>
 </div>
 </div>
</section>
<script src="js/bootstrap.bundle.min.js" ></script>
</script><script src="js/global.js"></script>
</body></html>