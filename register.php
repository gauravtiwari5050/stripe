<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter an email address.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user_data WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This email is already taken.";
                } else{
                    $username = trim($_POST["email"]);
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }else{
            echo "Debugging...";
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user_data (email, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                // echo $param_username." ".$param_password; 
                header("location: welcome.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="theme-color" content="#3ed2a7">

<link rel="shortcut icon" href="./favicon.png" />

<title>Khyaal</title>

   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,700" rel="stylesheet">

<link rel="stylesheet" href="assets/vendors/liquid-icon/liquid-icon.min.css" />
<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" href="assets/css/theme-vendors.min.css" />
<link rel="stylesheet" href="assets/css/theme.min.css" />
<link rel="stylesheet" href="assets/css/themes/digital-creative-stripe.css" />
<link rel="stylesheet" type="text/css" href="assets/css/themes/hover-box.css">
<link rel="stylesheet" type="text/css" href="assets/css/themes/hover.css">

<!-- Head Libs -->
<script async src="assets/vendors/modernizr.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-173911382-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-173911382-1');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MBK6WQS');</script>
<!-- End Google Tag Manager -->


</head>

<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="minimal" data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">

  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MBK6WQS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
  window.__lc = window.__lc || {};
  window.__lc.license = 12036405;
  (function() {
    var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
    lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
  })();
</script>
<noscript>
<a class="ahref" href="https://www.livechatinc.com/chat-with/12036405/" rel="nofollow">Chat with us</a>,
powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a>
</noscript>
<!-- End of LiveChat code -->



<div id="wrap">

<header class="main-header main-header-overlay bb-fade-white-015 headc" data-sticky-header="true" data-sticky-options='{ "stickyTrigger": "first-section" }'>

<div class="mainbar-wrap">
<div class="megamenu-hover-bg"></div><!-- /.megamenu-hover-bg -->
<div class="container-fluid mainbar-container">
<div class="mainbar">
<div class="row mainbar-row align-items-lg-stretch px-4">

<div class="col pr-5">
<div class="navbar-header navcss">
<a class="navbar-brand pt-20 pb-20" href="index.html" rel="home">
<span class="navbar-brand-inner">
<img class="logo-sticky logocss1" src="./assets/img/logo/logo-11.png" alt="Khyaal">
<img class="mobile-logo-default logomob" src="./assets/img/logo/logo-11.png" alt="Khyaal">
<img class="logo-default logocss1" src="./assets/img/logo/logo-11.png" alt="Khyaal">
</span>
</a>
<button type="button" class="navbar-toggle collapsed nav-trigger style-mobile" data-toggle="collapse" data-target="#main-header-collapse" aria-expanded="false" data-changeclassnames='{ "html": "mobile-nav-activated overflow-hidden" }'>
<span class="sr-only">Toggle navigation</span>
<span class="bars">
<span class="bar"></span>
<span class="bar"></span>
<span class="bar"></span>
</span>
</button>
</div><!-- /.navbar-header -->
</div><!-- /.col -->

<div class="col">

<div class="collapse navbar-collapse" id="main-header-collapse">

<ul id="primary-nav" class="main-nav nav align-items-lg-stretch justify-content-lg-center maincss" data-submenu-options='{ "toggleType":"fade", "handler":"mouse-in-out" }' data-localscroll="true">

<li class="active">
<a href="index.html#care" class="scroll">
<span class="link-icon"></span>
<span class="link-txt">
<span class="link-ext"></span>
<span class="txt">Care Guide</span>
</span>
</a>
</li>
<li>
<a href="index.html#services" class="scroll">
<span class="link-icon"></span>
<span class="link-txt">
<span class="link-ext"></span>
<span class="txt">Services</span>
</span>
</a>
</li>
<li>
<a href="index.html#about" class="scroll">
<span class="link-icon"></span>
<span class="link-txt">
<span class="link-ext"></span>
<span class="txt">About</span>
</span>
</a>
</li>
<li>
<a href="index.html#connect" class="scroll">
<span class="link-icon"></span>
<span class="link-txt">
<span class="link-ext"></span>
<span class="txt">Connect</span>
</span>
</a>
</li>
<li>
<a href="careers.html" class="scroll">
<span class="link-icon"></span>
<span class="link-txt">
<span class="link-ext"></span>
<span class="txt">Careers</span>
</span>
</a>
</li>

</ul><!-- /#primary-nav  -->

</div><!-- /#main-header-collapse -->

</div><!-- /.col -->
<div class="col text-right">

<div class="header-module">
<ul class="social-icon social-icon-sm scheme-white font-size-16 ulcss">
<li>
<a href="https://www.facebook.com/KhyaalCare" target="_blank" class="headcss"><i class="fa fa-facebook"></i></a>
</li>
 <li>
<a href="https://twitter.com/KhyaalFamily" target="_blank" class="headcss"><i class="fa fa-twitter"></i></a>
</li>
<li>
<a href="https://www.linkedin.com/company/khyaal" target="_blank" class="headcss"><i style="font-size: 18px;" class="fa fa-linkedin"></i></a>
</li>
<li>
<a href="https://www.instagram.com/khyaalcare" target="_blank" class="headcss"><i class="fa fa-instagram"></i></a>
</li>
</ul>
</div><!-- /.header-module -->

</div>


</div><!-- /.mainbar-row -->
</div><!-- /.mainbar -->
</div><!-- /.mainbar-container -->
</div><!-- /.mainbar-wrap -->

</header><!-- /.main-header -->

<section class="vc_row pt-130 pb-60">
<div class="containerprics">
<div class="row divpdtop">
  <div class="col-md-4"></div>
  <div class="col-md-4">
      <h4 class="plh1">Sign Up</h4>
      <p class="plgn">Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label class="plgn">Email:</label>
                <input type="email" name="email" class="form-control loginfm" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label class="plgn">Password:</label>
                <input type="password" name="password" class="form-control loginfm" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label class="plgn">Confirm Password:</label>
                <input type="password" name="confirm_password" class="form-control loginfm" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn-primary loginbtn1" value="Submit">
                <input type="reset" class="btn-default loginbtn" value="Reset">
            </div>
            <p class="plgn">Already have an account? <a href="login.php" style="color: #3b2314;font-weight: 400;">Login here</a></p>
        </form>
  </div>
  <div class="col-md-4"></div>
</div>

</div>
</section>

</main>

<footer class="main-footer pt-20 pb-20" style="background: #3b2314;">
      
      <section>
        <div class="container">
          <div class="row d-md-flex flex-wrap align-items-center">

            <div class="lqd-column col-md-2 col-xs-6 focss">

              <h3 class="widget-title"><a href="#care" style="color: #8bc53f;">Care Guide</a></h3>
              
            </div><!-- /.col-md-2 -->

            <div class="lqd-column col-md-2 col-xs-6 floatcss">
                <h3 class="widget-title"><a href="#services" style="color: #8bc53f;">Services</a></h3>
                
            </div><!-- /.col-md-2 -->

            <div class="lqd-column col-md-2 col-xs-6 abtftcss">

              <h3 class="widget-title"><a href="#about" style="color: #8bc53f;">About</a></h3>

            </div><!-- /.col-md-2 -->

            <div class="lqd-column col-md-2 col-xs-6 floatcss">

              <h3 class="widget-title"><a href="#connect" style="color: #8bc53f;">Connect</a></h3>

            </div><!-- /.col-md-2 -->

            <div class="lqd-column col-md-2 col-xs-6 floatcss">

              <h3 class="widget-title"><a href="careers.html" style="color: #8bc53f;">Careers</a></h3>

            </div><!-- /.col-md-2 -->

            <div class="lqd-column col-md-2 col-xs-6 floatcss">

              <h3 class="widget-title"><a href="privacy-policy.html" style="color: #8bc53f;">Privacy Policy</a></h3>

            </div><!-- /.col-md-2 -->

          </div><!-- /.row -->
          <div class="row">
            <div class="col-md-12 copycss" style="font-size: 14px; color: #8bc53f;">© 2020 Taisho Ventures Pvt. Ltd.</div>
          </div>
        </div><!-- /.container -->
      </section>
      
    </footer><!-- /.main-footer -->

</div><!-- /#wrap -->

<script src="./assets/vendors/jquery.min.js"></script>
<script src="./assets/js/theme-vendors.js"></script>
<script src="./assets/js/theme.min.js"></script>
<!-- <script src="./assets/js/liquidAjaxMailchimp.min.js"></script> -->

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8258502.js"></script>
<!-- End of HubSpot Embed Code -->

</body>
</html>