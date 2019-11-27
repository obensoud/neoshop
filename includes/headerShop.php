<?php 
  require_once 'php_action/core.php'; 
  require_once 'php_action/userCounter.php'; 
  require_once 'php_action/localisation.php';
?>
<!DOCTYPE html>
<html>
  <head>
  	<title><?php echo tr("eshop")?></title>
  	
    <!-- bootstrap -->
  	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
  	
    <!-- bootstrap theme-->
  	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
  	
    <!-- font awesome -->
  	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
    
    <!-- custom css -->
    <link rel="stylesheet" href="custom/css/custom.css">
    <link rel="stylesheet" href="custom/css/barcode.css">
  	
    <!-- DataTables -->
    <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

    <!-- file input -->
    <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

    <!-- jquery -->
  	<script src="assests/jquery/jquery.min.js"></script>
    
    <!-- jquery ui -->  
    <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
    <script src="assests/jquery-ui/jquery-ui.min.js"></script>

    <!-- bootstrap js -->
  	<script src="assests/bootstrap/js/bootstrap.min.js"></script>

    <!-- tchat -->
    <link rel="stylesheet" href="custom/css/tchat.css"> 
    <script src="custom/js/tchat.js"></script>
   
    <!-- language css -->
    <link rel="stylesheet" href="custom/css/language.css">
    <script src="custom/js/language.js"></script>

    <!-- Card Flip -->
    <link rel="stylesheet" href="custom/css/cardFlip.css">
    
    <!--dynamique background -->
    <script src="custom/js/particles.js"></script>

    <!--upload pic -->
    <link href="custom/css/bootstrap-imageupload.css" rel="stylesheet">
    <script src="custom/js/bootstrap-imageupload.js"></script>
    <style type="text/css">
      /* Backgroud*/
      html,body {
        margin: 0;
        padding: 0;
      }
      .background {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        z-index: 0;
      }
      canvas { 
        padding: 15px;
      } 
      .container {
        width: 80%;
        margin: 15px auto;
      }
      /* EXAMPLE 5 - Logo with Text*/
      .navbar-brand {
        display: flex;
        align-items: center;
      }
      .navbar-brand>img {
        padding: 3.5px 7px;
      }
    </style>
    <link rel="icon" type="image/gif" href="https://res.cloudinary.com/disputebills/image/upload/v1462474206/blue-mark_cnzgry.png" />
  </head>
  <script>
    // Dynamique backgroud
    window.onload = function() {
        var particles = Particles.init({
            selector: '.background',
            maxParticles:200,
            color: ['#DA0463', '#404B69', '#DBEDF3'],
            connectParticles: true
        });
    };    
  </script>
  <body>
    <canvas class="background"></canvas>
  	<nav class="navbar navbar-default navbar-static-top">
  		<div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="#">Brand</a> -->
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <a class="navbar-brand" href="/dashboardClient.php?lang=<?php echo $_SESSION['language'] ?>"><img style="  width: 34px;" src="https://res.cloudinary.com/disputebills/image/upload/v1462474206/blue-mark_cnzgry.png" alt="Dispute Bills"><h4 style="font-family:Snell Roundhand, cursive">&nbsp;L.B.K</h4>
          </a>
          <ul class="nav navbar-nav navbar-right">        
              <li id="navDashboard">
                  <a href="dashboardClient.php?lang=<?php echo $_SESSION['language'] ?>">
                      <i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;<?php echo tr("Home")?>
                  </a>
              </li>
              <li id="navDashboard">
                  <a href="productClient.php?lang=<?php echo $_SESSION['language'] ?>">
                      <i class="glyphicon glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;<?php echo tr("Product")?>
                  </a>
              </li>
              <li id="navDashboard">
                  <a href="dashboardClient.php?lang=<?php echo $_SESSION['language'] ?>">
                      <i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;&nbsp;<?php echo tr("Shop [0]")?>
                  </a>
              </li>   
              <li id="navDashboard">
                  <a href="dashboardClient.php?lang=<?php echo $_SESSION['language'] ?>">
                      <i class="glyphicon  glyphicon-envelope"></i>&nbsp;&nbsp;<?php echo tr("Contact-Us")?>
                  </a>
              </li>    
              <li class="dropdown" id="navSetting">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <i class="glyphicon glyphicon-user"></i>
                      &nbsp;&nbsp;<?php echo tr("Hello")?> <?php echo $_SESSION['username']?>
                      <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">            
                      <li id="topNavSetting">
                          <a href="setting.php?lang=<?php echo $_SESSION['language'] ?>"> 
                              <i class="glyphicon glyphicon-wrench"></i>&nbsp;&nbsp;<?php echo tr("Parameter")?>
                          </a>
                      </li>            
                      <li id="topNavLogout"><a href="logout.php?lang=<?php echo $_SESSION['language'] ?>"> 
                          <i class="glyphicon glyphicon-log-out"></i>
                              &nbsp;&nbsp;<?php echo tr("Logout")?>
                          </a>
                      </li>            
                  </ul>
              </li>              
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  	</nav>
  	<div class="container">