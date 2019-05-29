<?php require_once 'php_action/core.php'; ?>
<?php require_once 'php_action/userCounter.php'; ?>
<!DOCTYPE html>
<html>
  <head>

  	<title>Système de géstion de stock</title>

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
         <a class="navbar-brand" href="http://disputebills.com"><img style="  width: 34px;" src="https://res.cloudinary.com/disputebills/image/upload/v1462474206/blue-mark_cnzgry.png" alt="Dispute Bills"><h4 style="font-family:Snell Roundhand, cursive">&nbsp;L.B.K</h4>
        </a>
        <ul class="nav navbar-nav navbar-right">        

        	<li id="navDashboard"><a href="index.php"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;Accueil</a></li>        
          
          <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-btc"></i>&nbsp;&nbsp;Marque</a></li>        

          <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i>&nbsp;&nbsp;Catégorie</a></li>        

          <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i>&nbsp;&nbsp;Produit </a></li>     

          <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;&nbsp;Commande <span class="caret"></span></a>
            <ul class="dropdown-menu">            
              <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Crée une commande </a></li>            
              <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Liste des commandes</a></li>            
            </ul>
          </li>       
          <li class="dropdown hidden" id="navRestaurant">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
              <i class="glyphicon glyphicon-registration-mark"></i> Restaurant <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">            
                <li id="topNavAddMenu">
                  <a href="restaurant.php?o=addMenu"> <i class="glyphicon glyphicon-plus"></i> Add Menu</a>
                </li>  
                <li id="topNavManageBar">
                  <a href="restaurant.php?o=manBar"> <i class="glyphicon glyphicon-glass"></i> Bar </a>
                </li>
                <li id="topNavManageKitchen">
                  <a href="restaurant.php?o=manKitchen"> <i class="glyphicon glyphicon-cutlery"></i> Kitchen</a>
                </li> 
                <li id="topNavManageOrderReady">
                  <a href="restaurant.php?o=manOrderReady"><i class="glyphicon glyphicon-check"></i> Order Ready </a>
                </li>
            </ul>
          </li>
          <li class="dropdown " id="Analyse">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
              <i class="glyphicon glyphicon glyphicon-send"></i>&nbsp;&nbsp;Analyse <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">            
                <li id="GenererUnRapportDeVente">
                  <a href="report.php"> <i class="glyphicon glyphicon glyphicon-tasks"></i>&nbsp;&nbsp;Générer un rapport de vente</a>
                </li>  
                <li id="GrapheAnalyse">
                  <a href="gainPerMonth.php"> <i class="glyphicon glyphicon glyphicon-blackboard"></i>&nbsp;&nbsp;Graphe d'analyse </a>
                </li>
            </ul>
          </li>
          <li id="barcode">
            <a href="barcode.php"> <i class="glyphicon glyphicon-barcode"></i>&nbsp;&nbsp;Codebar</a></li>
          <li class="dropdown" id="navSetting">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="glyphicon glyphicon-user"></i>
              &nbsp;&nbsp;Bonjour <?php echo $_SESSION['username'];?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">            
              <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i>&nbsp;&nbsp;Paramètre</a></li>            
              <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Déconnectez-vous</a></li>            
            </ul>
          </li>        
                 
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  	</nav>

  	<div class="container">