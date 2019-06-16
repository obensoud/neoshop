	<?php require_once 'includes/header.php'; ?>

	<?php 

	$sql = "SELECT * FROM product WHERE status = 1";
	$query = $connect->query($sql);
	$countProduct = $query->num_rows;

	// revnu de la journée 
	$today = date("Y-n-j");  
	$orderJours = "SELECT * FROM orders WHERE order_status = 1 and order_date = '$today'";
	$orderQueryJours = $connect->query($orderJours);
	$countOrderJours = $orderQueryJours->num_rows;

	$totalRevenueJours = "";
	while ($orderResultJours = $orderQueryJours->fetch_assoc()) {
	 	$totalRevenueJours += $orderResultJours['paid'];
	}
	// revnu du mois 
	$today = date("Y-n-j");  
	$orderMois = "SELECT *  FROM orders WHERE  order_date >= '2017-12-%'";
	$orderQueryMois = $connect->query($orderMois);
	$countOrderMois = $orderQueryMois->num_rows;

	$totalRevenueMois = "";
	while ($orderResultMois = $orderQueryMois->fetch_assoc()) {
	 	$totalRevenueMois += $orderResultMois['paid'];
	}
	// revnu de l'année
	$orderSql = "SELECT * FROM orders WHERE order_date >= '2017-%-%'";
	$orderQuery = $connect->query($orderSql);
	$countOrder = $orderQuery->num_rows;

	$totalRevenue = "";
	while ($orderResult = $orderQuery->fetch_assoc()) {
		$totalRevenue += $orderResult['paid'];
	}

	$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1"; // Low stock
	$lowStockQuery = $connect->query($lowStockSql);
	$countLowStock = $lowStockQuery->num_rows;

	$connect->close();

	?>


	<!-- fullCalendar 2.2.5-->
	<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


	<div class="row">
		<div>
		<div class="col-md-4">
			<div class="panel panel-success">
				<div class="panel-heading">
					
					<a href="product.php" style="text-decoration:none;color:black;">
						Totale des Products
						<span class="badge pull pull-right"><?php echo $countProduct; ?></span>	
					</a>
					
				</div> <!--/panel-hdeaing-->
			</div> <!--/panel-->
		</div> <!--/col-md-4-->

		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
						Totale des Commandes
						<span class="badge pull pull-right"><?php echo $countOrder; ?></span>
					</a>

				</div> <!--/panel-hdeaing-->
			</div> <!--/panel-->
		</div> <!--/col-md-4-->

		<div class="col-md-4">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<a href="lowStock.php" style="text-decoration:none;color:black;">
						Nombre d'extinction de Product
						<span class="badge pull pull-right"><?php echo $countLowStock; ?></span>	
					</a>
					
				</div> <!--/panel-hdeaing-->
			</div> <!--/panel-->
		</div> <!--/col-md-4-->

		<div class="col-md-4">
			<div style="text-align: center;">
				<h2 style="font-family:Snell Roundhand, cursive">Date du jour</h2>
			</div>
			<br/>
			<div class="card">
				<div class="cardHeader">
					<h1><?php echo date('d'); ?></h1>
				</div>

				<div class="cardContainer">
					<p><?php 
						$date1 = date('Y-m-d'); // Date du jour
						setlocale(LC_TIME, "fr_FR");
						echo strftime("%A %d %B %G", strtotime($date1));
						 ?></p>
				</div>
			</div> 
			<br/>
			<div style="text-align: center;">
				<h2 style="font-family:Snell Roundhand, cursive">Totale des revenue en cours (Dh)</h2>
			</div>
			<br/>
			<div class="card">
				<div class="cardHeader" style="background-color:#4d91cd;">
					<h1><?php if($totalRevenueJours) {
						echo $totalRevenueJours;
					} else {
						echo '0';
					} ?></h1>
				</div>

				<div class="cardContainer">
					<p><b>Jour</b></p>
				</div>
			</div>
			<br/>
			<div class="card">
				<div class="cardHeader" style="background-color:#d3619d;">
					<h1><?php if($totalRevenue) {
						echo $totalRevenueMois;
					} else {
						echo '0';
					} ?></h1>
				</div>

				<div class="cardContainer">
					<p><b>Mois</b></p>
				</div>
			</div>
 			<br/>
			<div class="card">
				<div class="cardHeader" style="background-color:#a475d9;">
					<h1><?php if($totalRevenue) {
						echo $totalRevenue;
					} else {
						echo '0';
					} ?></h1>
				</div>

				<div class="cardContainer">
					<p><b>Année</b></p>
				</div>
			</div>
		</div>

		<div class="col-md-8">	
			<div class="panel">
				<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check"></i>	Configuration des dates d'intervalles
			</div>
			<div class="panel-body">
					<div class="form-horizontal"  >
					  <div class="form-group">
					    <label for="startDate" class="col-sm-2 control-label">Date de début</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Date de début" />
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="endDate" class="col-sm-2 control-label">Date de fin</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="Date de fin" />
					    </div>
					  </div>
					  <div class="form-group">
					    	<div class="col-sm-offset-2 col-sm-10">
					      		<button type="submit" onclick="generateStatistic()" class="btn btn-success" id="generateStatisticBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Générer des statistiques</button>
					    	</div>
					  	</div>
					</div>
				</div>
			</div>
            </div> 
      		<div class="container">
      			<h2 style="font-family:Snell Roundhand, cursive">Recette & Dépense :</h2>
				<div class="panel-body">
					<canvas id="myChart" width="400" height="400"></canvas>                        
				</div>
			</div>
			<div class="container">
				<h2 style="font-family:Snell Roundhand, cursive">Les gains :</h2>
			  	<div>
			    	<canvas id="myChart1"></canvas>
			  	</div>
			</div>
		</div>

		</div> <!--/row-->
		</div>
	</div>
	<!-- /modal-content -->
</div>
<!-- /modal-dailog -->
</div>
<!-- /categories brand -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="custom/js/gainPerMonth.js"></script>

<?php require_once 'includes/footer.php'; ?>