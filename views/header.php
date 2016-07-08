<!doctype html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Smartexpos</title>
<meta name="keywords" content="">
<meta name="description" content="">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="shortcut icon" href="<?php echo Url::imagesFolderPath();?>favicon.ico" />
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<?php

//if(strpos($data["home_paghome_page_linke_link"], $_SERVER['SERVER_NAME']) !==false) {

	Assets::css(array(
			Url::cssFolderPath() . 'reset.css',
			Url::cssFolderPath() . 'jquery.mmenu.css',
			Url::cssFolderPath() . 'Global.css',
                       // Url::cssFolderPath() . 'index.css',
                        Url::cssFolderPath() . $data['landing'].'.css',
	));
        
        Assets::js(array(
            Url::jsFolderPath().'jquery.mmenu.min.all.js',
            Url::jsFolderPath().'Chart.js',
             Url::jsFolderPath().'preload.js',
        ));
//}
?>
<!--
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mmenu.css" />
<link rel="stylesheet" type="text/css" href="css/Global.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
-->

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,700italic,400italic' rel='stylesheet' type='text/css'>


<!--
<script type="text/javascript" src="js/jquery.mmenu.min.all.js"></script>
<script type="text/javascript" src="js/Chart.js"></script>
-->
<script type="text/javascript">
	$(function() { $('nav#mobileMenu').mmenu(); });
</script>


</head>

<body id="TC">
<!-- mobile menu -->
<nav id="mobileMenu" class="mm-menu mm-offcanvas">
	<div class="mm-panel mm-opened mm-current" id="mm-1">
    	<ul class="mm-listview mm-first mm-last">
            <li class="SRow">
            	<nav class="SearchRow">       
                    <div class="InputBoxDiv">
                        <input type="text" placeholder="請輸入關鍵字" class="InputBox">
                    </div>
                    <a href="#"><div class="icon-search-1"></div></a>
                </nav>
            </li>
            <li class="Row1">
            	<a class="mm-next mm-fullsubopen" href="#mm-2" data-target="#mm-2"></a>
                <span>Login  /  Sign Up</span>
            </li>
            <li id="LangMenu_Mobile">
            	<a class="mm-next mm-fullsubopen" href="#mm-3" data-target="#mm-3"></a>
                <span>Language : English</span>
            </li>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?page=events">Events</a></li>
            <li><a href="index.php?page=oversea_properties">Investment Insight</a></li>
            <li><a href="#">Profiles</a></li>
    	</ul>
	</div>
    <div class="mm-panel mm-hasheader mm-highest" id="mm-1">
    	<div class="mm-header">
        	<a class="mm-btn mm-prev" href="#mm-0" data-target="#mm-0"></a>
            <a class="mm-title">About us</a></div>
            <ul class="mm-listview mm-first mm-last">
                <li><a href="#about/history">History</a></li>
                <li><a class="mm-next" href="#mm-2" data-target="#mm-2"></a><a href="#about/team">The team</a></li>
                <li><a href="#about/address">Our address</a></li>
            </ul>
         </div>
     </div>
</nav>
<!-- mobile menu /-->

<div class="mm-page mm-slideout"><!-- This div for mobile menu user -->

<div class="CurtainBanner GlobalGreyBg">
	<div class="curtain"></div>
    <div class="SuperBanner">
       <div><img></div>
    </div>
</div>

<div id="TopDiv">
	<div class="bodyWidth">
            <div class="Cols1"><img src="<?php echo Url::imagesFolderPath();?>logo.svg"></div>
        <div class="Cols2">
        	<div class="TopMenu">
            	<span class="login fltLft">
                	<div class="icon icon-user fltLft"></div><a href="#">Login</a> / <a href="#">Signup</a>
                </span>
                <span class="fltLft">Follow us on  :</span>
            	<span class="icon">
                	<a href="#"><div class="icon icon-fb2 fltLft"></div></a>
                	<a href="#"><div class="icon icon-youtube fltLft"></div></a>  
                    <a href="#"><div class="icon icon-twitter fltLft"></div></a>  
                </span>
            </div>
            <div class="clearFix"></div>
            <div class="SuperBanner">
            	<div><img src="<?php echo Url::imagesFolderPath();?>banner_728_90.jpg"></div>
            </div>
        </div>
        <div class="clearFix"></div>
    </div>
</div>

<div id="MainMenu">
	<div class="bodyWidth">
        <a href="index.php"><div class="Tab <?php if(!isset($_GET['page'])){ echo 'Now';}?>">Home</div></a>
        <a href="index.php?page=events"><div class="Tab <?php if(isset($_GET['page']) && $_GET['page']=='events'){ echo 'Now';}?>">Events</div></a>
        <a href="index.php?page=oversea_properties"><div class="Tab <?php if(isset($_GET['page']) && $_GET['page']=='oversea_properties'){ echo 'Now';}?>">Investment Insight</div></a>
        <a href="#"><div class="Tab <?php if(isset($_GET['page']) && $_GET['page']=='profiles'){ echo 'Now';}?>">Profiles</div></a>
    </div>
</div>

<!-- mobile header -->
<div class="mobile-header">
    <div class="row2">
    	<a href="#mobileMenu">
        	<div class="icon-android-menu"></div>
        </a>
        <div class="logo">
            <a href="#"><img src="<?php echo Url::imagesFolderPath();?>smartExpo_logo_horizontal_white.svg" alt=""></a>
        </div>
        <div id="LangMenu">
            <a href="#">繁</a>
            <a href="#">简</a>
            <a href="#">ENG</a>
        </div>
    </div>
</div>
<!-- mobile header / -->