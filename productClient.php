<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/headerShop.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboardClient.php?lang=<?php echo $_SESSION['language'] ?>"><?php echo tr("Home")?></a></li>		  
		  <li class="active"><?php echo tr("Product")?></li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i><?php echo tr("Choose your Product")?></div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>
				<table class="table" id="manageProductTable">
					<thead>
						<tr>
							<th style="width:10%;"><?php echo tr("Photo")?></th>							
							<th><?php echo tr("Name of product")?></th>
							<th><?php echo tr("Barcode")?></th>
							<th><?php echo tr("Price")?></th>							
							<th><?php echo tr("Quantity")?></th>
							<th><?php echo tr("Brand")?></th>
							<th><?php echo tr("Category")?></th>
							<th><?php echo tr("Statut")?></th>
							<th style="width:15%;"><?php echo tr("Add to cart")?></th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<script src="custom/js/productClient.js"></script>

<?php require_once 'includes/footer.php'; ?>