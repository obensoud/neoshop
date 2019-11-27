<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
			<li><a href="dashboard.php?lang=<?php echo $_SESSION['language'] ?>"><?php echo tr("Home")?></a></li>		  
			<li><a href="setting.php?lang=<?php echo $_SESSION['language'] ?>"><?php echo tr("Settings")?></a></li>
			<li class="active"><?php echo tr("User")?></li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i><?php echo tr("User")?></div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i><?php echo tr("Add user")?> </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageProductTable">
					<thead>
						<tr>
							<th style="width:10%;"><?php echo tr("Photo")?></th>							
							<th><?php echo tr("Name of collaborator")?></th>
							<th><?php echo tr("Email")?></th>
							<th><?php echo tr("Profil")?></th>
							<th><?php echo tr("Statut")?></th>
							<th style="width:15%;"><?php echo tr("Options")?></th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/createUser.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i>Ajouter un utilisateur</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>

	      	<div class="form-group">
	        	<label for="productImage" class="col-sm-3 control-label"> Avatar </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					    <!-- the avatar markup -->
							<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage" placeholder="Nom du Product" name="productImage" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
	        </div> <!-- /form-group-->	     	           	       

	        <div class="form-group">
	        	<label for="CollaboratorName" class="col-sm-3 control-label"> Nom du collaborateur </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="CollaboratorName" placeholder="Name of collaborator" name="CollaboratorName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    
			<div class="form-group">
	        	<label for="Email" class="col-sm-3 control-label"> Email </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="Email" placeholder="Email" name="Email" autocomplete="off">
				    </div>
	        </div>  
	        <div class="form-group">
	        	<label for="Password" class="col-sm-3 control-label"> Mot de passe </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="Password" placeholder="Mot de passe" name="Password" autocomplete="off">
				    </div>
	        </div>  
	        <div class="form-group">
	        	<label for="ConfirmYourPassword" class="col-sm-3 control-label"> Confirmez votre mot de passe </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="ConfirmYourPassword" placeholder="Confirmez votre mot de passe  " name="ConfirmYourPassword" autocomplete="off">
				    </div>
	        </div>  	        
	        <div class="form-group">
	        	<label for="Profil" class="col-sm-3 control-label"> Profil </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="Profil" name="Profil">
				      	<option value="">~~Select~~</option>
				      	<?php 
				      	$sql = "SELECT profil_id, profil_name, profil_active, profil_status FROM profil_user WHERE profil_status = 1 AND profil_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="OptionName" class="col-sm-3 control-label"> <?php echo tr("Name of the option")?> </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select type="text" class="form-control" id="OptionName" placeholder="Nom de l'option " name="OptionName" >
				      	<option value="">~~<?php echo tr("Select")?>~~</option>
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
	        	<label for="productStatus" class="col-sm-3 control-label"> <?php echo tr("Statut")?> </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="productStatus" name="productStatus">
				      	<option value="">~~<?php echo tr("Select")?>~~</option>
				      	<option value="1"><?php echo tr("Available")?></option>
				      	<option value="2"><?php echo tr("InAvailable")?></option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> <?php echo tr("Close")?></button>
	        
	        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> <?php echo tr("Save changes")?></button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> <?php echo tr("Edit user")?></h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only"><?php echo tr("Loading...")?></span>
	      	</div>

	      	<div class="div-result">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#photo" aria-controls="home" role="tab" data-toggle="tab"><?php echo tr("Photo")?></a></li>
				    <li role="presentation"><a href="#productInfo" aria-controls="profile" role="tab" data-toggle="tab"><?php echo tr("User Info")?></a></li>    
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				  	
				    <div role="tabpanel" class="tab-pane active" id="photo">
				    	<form action="php_action/editUserImage.php" method="POST" id="updateProductImageForm" class="form-horizontal" enctype="multipart/form-data">

				    	<br />
				    	<div id="edit-productPhoto-messages"></div>

				    	<div class="form-group">
			        	<label for="editProductImage" class="col-sm-3 control-label"><?php echo tr("User picture:")?> </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">							    				   
						      <img src="" id="getProductImage" class="thumbnail" style="width:250px; height:250px;" />
						    </div>
			        </div> <!-- /form-group-->	     	           	       
				    	
			      	<div class="form-group">
			        	<label for="editProductImage" class="col-sm-3 control-label"><?php echo tr("Select Photo:")?> </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
							    <!-- the avatar markup -->
									<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
							    <div class="kv-avatar center-block">					        
							        <input type="file" class="form-control" id="editProductImage" placeholder="Select Photo" name="editProductImage" class="file-loading" style="width:auto;"/>
							    </div>
						      
						    </div>
			        </div> <!-- /form-group-->	     	           	       

			        <div class="modal-footer editProductPhotoFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> <?php echo tr("Close")?></button>
				        
				        <!-- <button type="submit" class="btn btn-success" id="editProductImageBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button> -->
				      </div>
				      <!-- /modal-footer -->
				      </form>
				      <!-- /form -->
				    </div>
				    <!-- product image -->
				    <div role="tabpanel" class="tab-pane" id="productInfo">
				    	<form class="form-horizontal" id="editProductForm" action="php_action/editUser.php" method="POST">				    
				    	<br />

				    	<div id="edit-product-messages"></div>

				    	<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label"><?php echo tr("Name of collaborator")?></label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editProductName" placeholder="Name of collaborator" name="editProductName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->

			        <div class="form-group">
			        	<label for="editQuantity" class="col-sm-3 control-label"><?php echo tr("Email")?> </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editQuantity" placeholder="Email" name="editQuantity" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->   	        

			        <div class="form-group">
			        	<label for="editBrandName" class="col-sm-3 control-label"><?php echo tr("Profile name")?> </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select class="form-control" id="editBrandName" name="editBrandName">
						      	<option value="">~~<?php echo tr("Select")?>~~</option>
						      	<?php 
						      	$sql = "SELECT profil_id, profil_name, profil_active, profil_status FROM profil_user WHERE profil_status = 1 AND profil_active = 1";
										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	

			        <div class="form-group">
			        	<label for="editCategoryName" class="col-sm-3 control-label"><?php echo tr("Name of the option")?> </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select type="text" class="form-control" id="editCategoryName" name="editCategoryName" >
						      	<option value="">~~<?php echo tr("Select")?>~~</option>
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
			        	<label for="editProductStatus" class="col-sm-3 control-label"><?php echo tr("Statut")?> </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select class="form-control" id="editProductStatus" name="editProductStatus">
						      	<option value="">~~<?php echo tr("Select")?>~~</option>
						      	<option value="1"><?php echo tr("Available")?></option>
						      	<option value="2"><?php echo tr("InAvailable")?></option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	         	        

			        <div class="modal-footer editProductFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i><?php echo tr("Close")?></button>
				        
				        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> <?php echo tr("Save changes")?></button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				    </div>    
				    <!-- /product info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->
	      	      
     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> <?php echo tr("remove Product")?></h4>
      </div>
      <div class="modal-body">

      	<div class="removeProductMessages"></div>

        <p><?php echo tr("Do you really want to delete?")?></p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i><?php echo tr("Save changes")?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/user.js"></script>

<?php require_once 'includes/footer.php'; ?>