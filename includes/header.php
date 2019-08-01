<?php 
  require_once 'php_action/core.php'; 
  require 'php_action/userCounter.php'; 
  require_once 'php_action/localisation.php';
?>
<!DOCTYPE html>
<html>
  <head>
  	<title><?php echo tr("Management System")?></title>
  	
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
    
    <!-- pick list -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>

    <!--table to Excel -->
    <script lang="javascript" src="custom/js/xlsx.full.min.js"></script>
    <script lang="javascript" src="custom/js/FileSaver.js"></script>

    <style type="text/css">
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
  <body>
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
         <a class="navbar-brand" href="/dashboard.php?lang=<?php echo $_SESSION['language'] ?>"><img style="  width: 34px;" src="https://res.cloudinary.com/disputebills/image/upload/v1462474206/blue-mark_cnzgry.png" alt="Dispute Bills"><h4 style="font-family:Snell Roundhand, cursive">&nbsp;L.B.K</h4>
        </a>
        <ul class="nav navbar-nav navbar-right">        
        	<li id="navDashboard"><a href="dashboard.php?lang=<?php echo $_SESSION['language'] ?>"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;<?php echo tr("Home")?></a></li>
          <li id="navBrand"><a href="brand.php?lang=<?php echo $_SESSION['language'] ?>"><i class="glyphicon glyphicon-btc"></i>&nbsp;&nbsp;<?php echo tr("Brand")?></a></li>    
          <li id="navCategories"><a href="categories.php?lang=<?php echo $_SESSION['language'] ?>"> <i class="glyphicon glyphicon-th-list"></i>&nbsp;&nbsp;<?php echo tr("Category")?></a></li>        
          <li id="navProduct"><a href="product.php?lang=<?php echo $_SESSION['language'] ?>"> <i class="glyphicon glyphicon-ruble"></i>&nbsp;&nbsp;<?php echo tr("Product")?> </a></li>     
          <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;&nbsp;<?php echo tr("Order")?> <span class="caret"></span></a>
            <ul class="dropdown-menu">            
              <li id="topNavAddOrder"><a href="orders.php?lang=<?php echo $_SESSION['language'] ?>&o=add"> <i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;<?php echo tr("New Order")?> </a></li>            
              <li id="topNavManageOrder"><a href="orders.php?lang=<?php echo $_SESSION['language'] ?>&o=manord"> <i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;<?php echo tr("Ordered list")?></a></li>            
            </ul>
          </li>       
          <li class="dropdown hidden" id="navRestaurant">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
              <i class="glyphicon glyphicon-registration-mark"></i> <?php echo tr("Restaurant")?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">            
                <li id="topNavAddMenu">
                  <a href="restaurant.php?lang=<?php echo $_SESSION['language'] ?>&o=addMenu"> <i class="glyphicon glyphicon-plus"></i><?php echo tr("Add Menu")?></a>
                </li>  
                <li id="topNavManageBar">
                  <a href="restaurant.php?lang=<?php echo $_SESSION['language'] ?>&o=manBar"> <i class="glyphicon glyphicon-glass"></i><?php echo tr("Bar")?> </a>
                </li>
                <li id="topNavManageKitchen">
                  <a href="restaurant.php?lang=<?php echo $_SESSION['language'] ?>&o=manKitchen"> <i class="glyphicon glyphicon-cutlery"></i><?php echo tr("Kitchen")?></a>
                </li> 
                <li id="topNavManageOrderReady">
                  <a href="restaurant.php?lang=<?php echo $_SESSION['language'] ?>&o=manOrderReady"><i class="glyphicon glyphicon-check"></i><?php echo tr("Order Ready")?> </a>
                </li>
            </ul>
          </li>
          <li class="dropdown " id="Analyse">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
              <i class="glyphicon glyphicon glyphicon-send"></i>&nbsp;&nbsp;<?php echo tr("Analysis")?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">            
                <li id="GenererUnRapportDeVente">
                  <a href="report.php?lang=<?php echo $_SESSION['language'] ?>"> <i class="glyphicon glyphicon glyphicon-tasks"></i>&nbsp;&nbsp;<?php echo tr("Sales report")?></a>
                </li>  
                <li id="GrapheAnalyse">
                  <a href="gainPerMonth.php?lang=<?php echo $_SESSION['language'] ?>"> <i class="glyphicon glyphicon glyphicon-blackboard"></i>&nbsp;&nbsp;<?php echo tr("Analysis with graph")?> </a>
                </li>
            </ul>
          </li>
          <li id="barcode">
            <a href="barcode.php?lang=<?php echo $_SESSION['language'] ?>"> <i class="glyphicon glyphicon-barcode"></i>&nbsp;&nbsp;<?php echo tr("Bar code")?></a></li>
          <li class="dropdown" id="navSetting">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="glyphicon glyphicon-user"></i>
              &nbsp;&nbsp;<?php echo tr("Hello")?> <?php echo $_SESSION['username']?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">            
              <li id="topNavSetting"><a href="setting.php?lang=<?php echo $_SESSION['language'] ?>"> <i class="glyphicon glyphicon-wrench"></i>&nbsp;&nbsp;<?php echo tr("Parameter")?></a></li>            
              <li id="topNavLogout"><a href="logout.php?lang=<?php echo $_SESSION['language'] ?>"> <i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;<?php echo tr("Logout")?></a></li>            
            </ul>
          </li>              
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  	</nav>
  	<div class="container">