	<?php 
	require_once 'includes/header.php'; 


	$sql = "SELECT * FROM product WHERE status = 1";
	$query = $connect->query($sql);
	$countProduct = $query->num_rows;

	$orderSql = "SELECT * FROM orders WHERE order_status = 1";
	$orderQuery = $connect->query($orderSql);
	$countOrder = $orderQuery->num_rows;

	$totalRevenue = "";
	while ($orderResult = $orderQuery->fetch_assoc()) {
		$totalRevenue += $orderResult['paid'];
	}

	$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1";
	$lowStockQuery = $connect->query($lowStockSql);
	$countLowStock = $lowStockQuery->num_rows;

	$connect->close();

	?>


	<style type="text/css">
		.ui-datepicker-calendar {
			display: none;
		}
	</style>

	<!-- fullCalendar 2.2.5-->
	<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


	<div class="row">
		<div>
		<div class="col-md-4 hidden">
			<div class="panel panel-success">
				<div class="panel-heading">
					
					<a href="product.php" style="text-decoration:none;color:black;">
						<?php echo tr("Total products")?>
						<span class="badge pull pull-right"><?php echo $countProduct; ?></span>	
					</a>
					
				</div> <!--/panel-hdeaing-->
			</div> <!--/panel-->
		</div> <!--/col-md-4-->

		<div class="col-md-4 hidden">
			<div class="panel panel-info">
				<div class="panel-heading">
					<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
						<?php echo tr("Total Orders")?>
						<span class="badge pull pull-right"><?php echo $countOrder; ?></span>
					</a>

				</div> <!--/panel-hdeaing-->
			</div> <!--/panel-->
		</div> <!--/col-md-4-->

		<div class="col-md-4 hidden">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<a href="lowStock.php" style="text-decoration:none;color:black;">
						<?php echo tr("Number of product extinction")?>
						<span class="badge pull pull-right"><?php echo $countLowStock; ?></span>	
					</a>
					
				</div> <!--/panel-hdeaing-->
			</div> <!--/panel-->
		</div> <!--/col-md-4-->

		<div class="col-md-4">
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

			<div class="card hidden">
				<div class="cardHeader" style="background-color:#245580;">
					<h1><?php if($totalRevenue) {
						echo $totalRevenue;
					} else {
						echo '0';
					} ?></h1>
				</div>

				<div class="cardContainer">
					<p> <?php echo tr("Total income in "); tr("$")?></p>
				</div>
			</div>
		</div>

		<div class="col-md-8">
			
				<div class="panel panel-default">
					<div class="panel-heading "> 
						<div class="changeButton">
							<button style="float: right;" class="btn btn-danger" type="button" onclick="removeProductAllRow()"><i class="glyphicon glyphicon-trash" style="color:white"> </i>  <?php echo tr("Delete ticket")?></button>
							<div style="float: right;">
								&nbsp;
							</div> 
							<button style="float: right;" class="btn btn-success" type="button"  onclick="saveChange()"><i class="glyphicon glyphicon-ok-sign" style="color:white"> </i> <?php echo tr("Save the ticket")?></button> 
						</div>
						<div class="changeButton2 hidden">
							<button style="float: right;" class="btn btn-default" type="button" onclick="newReciept()"><i class="glyphicon glyphicon-plus" > </i><?php echo tr("New ticket")?></button>
							<div style="float: right;">
								&nbsp;
							</div> 
							<button style="float: right;" class="btn btn-primary" type="button"  onclick="printReceipt()"><i class="glyphicon glyphicon-print" style="color:white"> </i><?php echo tr("Print")?></button> 
						</div>
						<h4><i class="glyphicon glyphicon-shopping-cart" style="font-size: 20px;"></i><?php echo tr("Create a ticket")?></h4>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="barcodeScanner" placeholder="Barcode scanner">
						<div  >
							<br/>
							<table class="table table-condensed" id="tableReceipt"> 
								<thead> 
									<tr> 
										<th><?php echo tr("Product Name")?></th>
										<th><?php echo tr("Quantity")?></th>
										<th><?php echo tr("U.P")?></th> 
										<th><?php echo tr("Total")?></th>
										<th></th> 
									</tr> 
								</thead> 
								<tbody id="ListDesProduit"> 
								</tbody>
								<tfoot> <!-- Pied de tableau -->
									<tr>
										<th></th> 
										<th></th>
										<th><?php echo tr("Total")?></th>
										<th id = "Totalreceipt">0</th>
										<th><?php echo tr("$")?></th>
									</tr>
								</tfoot>
							</table>
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

<!-- fullCalendar 2.2.5 -->
<Script>

	function  getCookie(name){
     if(document.cookie.length == 0)
       return null;

     var regSepCookie = new RegExp('(; )', 'g');
     var cookies = document.cookie.split(regSepCookie);

     for(var i = 0; i < cookies.length; i++){
       var regInfo = new RegExp('=', 'g');
       var infos = cookies[i].split(regInfo);
       if(infos[0] == name){
         return unescape(infos[1]);
       }
     }
     return null;
   }
   if(getCookie('sub')!= null){
   	alert('Bonjour  : ' + getCookie('sub'));
   }
</Script>
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="custom/js/dashbord.js"></script>
<?php require_once 'includes/footer.php'; ?>