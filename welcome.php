<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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

<section class="vc_row pt-130 pb-130">
<div class="containerprics">
<div class="row divpdtop">
  <div class="col-md-2"></div>
  <div class="col-md-8">
      <div class="page-header">
        <h4>Hi, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b></h4>
    </div>
    <p>
                <form method="POST" class="" action="create_customer_portal_session.php">
                    <button type="submit" class="btn-primary loginbtn11">Customer Portal</button>
                </form><br>
        <a href="reset-password.php" class="btn-primary loginbtn11" value="Reset">Reset Your Password</a>
        <a href="logout.php" class="bbtn-primary loginbtn11" value="Signout">Sign Out of Your Account</a>
    </p>
  </div>
  <div class="col-md-2"></div>
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