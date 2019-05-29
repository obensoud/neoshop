<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
			<li><a href="dashboard.php">Accueil</a></li>		  
			<li><a href="setting.php">Paramètres</a></li>
			<li class="active">Groupe d'option pour l'utilisateur</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-stats"></i> Option du profil</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" data-target="#addBrandModel"> <i class="glyphicon glyphicon-plus-sign"></i> Ajouter un groupe d'options </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageBrandTable">
					<thead>
						<tr>							
							<th>Nom du groupe d'option </th>
							<th>Nom de l'option</th>
							<th>Statut</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

		<form class="form-horizontal" id="submitBrandForm" action="php_action/createGroupOption.php" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter un group d'options</h4>
				</div>
				<div class="modal-body">

					<div id="add-brand-messages"></div>

					<div class="form-group">
						<label for="brandName" class="col-sm-3 control-label">Nom du groupe d'option : </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="brandName" placeholder="Nom du groupe d'option " name="brandName" autocomplete="off">
						</div>
					</div> <!-- /form-group-->	
					<div class="form-group">
						<label for="editCategoryName" class="col-sm-3 control-label">Nom d'option </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
							<select type="text" class="form-control" id="editCategoryName" name="editCategoryName" >
								<option value="">~~Sélectionner~~</option>
								<?php 
								$sql = "SELECT option_id, option_name, option_active, option_status FROM option_user WHERE option_status = 1 AND option_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
									} // while
									
									?>
								</select>
							</div>
						</div> <!-- /form-group-->	         	        
						<div class="form-group">
							<label for="brandStatus" class="col-sm-3 control-label">Statut: </label>
							<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
								<select class="form-control" id="brandStatus" name="brandStatus">
									<option value="">~~Sélectionner~~</option>
									<option value="1">Disponible</option>
									<option value="2">Indisponible</option>
								</select>
							</div>
						</div> <!-- /form-group-->	         	        

					</div> <!-- /modal-body -->

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>

						<button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Enregistrer les modifications</button>
					</div>
					<!-- /modal-footer -->
				</form>
				<!-- /.form -->
			</div>
			<!-- /modal-content -->
		</div>
		<!-- /modal-dailog -->
	</div>
	<!-- / add modal -->

	<!-- edit brand -->
	<div class="modal fade" id="editBrandModel" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">

				<form class="form-horizontal" id="editBrandForm" action="php_action/editGroupOption.php" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-edit"></i> Modifier un groupe d'option</h4>
					</div>
					<div class="modal-body">

						<div id="edit-brand-messages"></div>

						<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
							<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
							<span class="sr-only">Chargement...</span>
						</div>

						<div class="edit-brand-result">
							<div class="form-group">
								<label for="editBrandName" class="col-sm-3 control-label">Nom du groupe d'option: </label>
								<label class="col-sm-1 control-label">: </label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="editGroupOptionName" placeholder="Group Option Name" name="editGroupOptionName" autocomplete="off">
								</div>
							</div> <!-- /form-group-->	 
							<div class="form-group">
					        	<label for="editCategoryName" class="col-sm-3 control-label">Nom de l'option</label>
					        	<label class="col-sm-1 control-label">: </label>
								    <div class="col-sm-8">
								      <select type="text" class="form-control" id="editOptionName" name="editOptionName" >
								      	<option value="">~~Sélectionner~~</option>
								      	<?php 
								      	$sql = "SELECT option_id, option_name, option_active, option_status FROM option_user WHERE option_status = 1 AND option_active = 1";
												$result = $connect->query($sql);

												while($row = $result->fetch_array()) {
													echo "<option value='".$row[0]."'>".$row[1]."</option>";
												} // while
												
								      	?>
								      </select>
								    </div>
					        </div> <!-- /form-group-->	         	        
							<div class="form-group">
								<label for="editBrandStatus" class="col-sm-3 control-label">Statut: </label>
								<label class="col-sm-1 control-label">: </label>
								<div class="col-sm-8">
									<select class="form-control" id="editBrandStatus" name="editBrandStatus">
										<option value="">~~Sélectionner~~</option>
										<option value="1">Disponible</option>
										<option value="2">indisponible</option>
									</select>
								</div>
							</div> <!-- /form-group-->	
						</div>         	        
						<!-- /edit brand result -->

					</div> <!-- /modal-body -->

					<div class="modal-footer editBrandFooter">
						<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>

						<button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer les modifications</button>
					</div>
					<!-- /modal-footer -->
				</form>
				<!-- /.form -->
			</div>
			<!-- /modal-content -->
		</div>
		<!-- /modal-dailog -->
	</div>
	<!-- / add modal -->
	<!-- /edit brand -->

	<!-- remove brand -->
	<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer un groupe d'option </h4>
				</div>
				<div class="modal-body">
					<p>Voulez vous vraiment supprimer ?</p>
				</div>
				<div class="modal-footer removeBrandFooter">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer </button>
					<button type="button" class="btn btn-primary" id="removeBrandBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer les modificationss</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /remove brand -->

	<script src="custom/js/groupeOption.js"></script>

	<?php require_once 'includes/footer.php'; ?>