<?php require_once 'includes/header.php'; ?>

<?php 
$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM users WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();
$userId = $_SESSION['userId'];
$sql = "SELECT profil_id FROM users WHERE user_id = '$userId'";
$resultProfil = $connect->query($sql);
$rowProfil = $resultProfil->fetch_array();
$profilShow;
if($rowProfil[0] == 13 || $rowProfil[0] == 14 ){
	$profilShow = True;
}else{
	$profilShow = False;
}
$connect->close();
?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="dashboard.php?lang=<?php echo $_SESSION['language'] ?>"><?php echo tr("Home")?></a></li>		  
			<li class="active">Paramètres</li>
		</ol>

		<div class="panel panel-default" >
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> <?php echo tr("Setting")?></div>
			</div> <!-- /panel-heading -->
			</br>	
			<div class="row" style="padding-right: 15px;padding-left: 15px;">
				<div class="col-md-4  <?php if(!$profilShow){echo 'hidden';}?> "  >
					<div class="panel panel-success">
						<div class="panel-heading">
							<a href="profiluser.php?lang=<?php echo $_SESSION['language'] ?>" style="text-decoration:none;color:black;">
								<span class="glyphicon glyphicon-tower"></span> 
								<?php echo tr("New profil")?>
							</a>
						</div> <!--/panel-hdeaing-->
					</div> <!--/panel-->
				</div> <!--/col-md-4-->
				<div class="col-md-4 <?php if(!$profilShow){echo 'hidden';}?>">
					<div class="panel panel-info">
						<div class="panel-heading">
							<a href="optionuser.php?lang=<?php echo $_SESSION['language'] ?>" style="text-decoration:none;color:black;">
								<span class="glyphicon glyphicon-stats"></span> 
								<?php echo tr("New option")?>
							</a>
						</div> <!--/panel-hdeaing-->
					</div> <!--/panel-->
				</div> <!--/col-md-4-->
				<div class="col-md-4 <?php if(!$profilShow){echo 'hidden';}?>">
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="groupOptionUser.php?lang=<?php echo $_SESSION['language'] ?>" style="text-decoration:none;color:black;">
								<span class="glyphicon glyphicon-folder-open"></span> 
								<?php echo tr("New group of option")?>
							</a>
						</div> <!--/panel-hdeaing-->
					</div> <!--/panel-->
				</div> <!--/col-md-4-->
				<div class="col-md-4 <?php if(!$profilShow){echo 'hidden';}?>">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<a href="user.php?lang=<?php echo $_SESSION['language'] ?>" style="text-decoration:none;color:black;">
								<span class="glyphicon glyphicon-user"></span> 
								<?php echo tr("All users")?>
							</a>
						</div> <!--/panel-hdeaing-->
					</div> <!--/panel-->
				</div> <!--/col-md-4-->
				<div class="col-md-4">
					<div class="panel panel-warning">
						<div class="panel-heading">
							<a href="myInf.php?lang=<?php echo $_SESSION['language'] ?>" style="text-decoration:none;color:black;">
								<span class="glyphicon glyphicon-info-sign"></span> 
								<?php echo tr("My information")?>

							</a>
						</div> <!--/panel-hdeaing-->
					</div> <!--/panel-->
				</div> <!--/col-md-4-->
			</div>	
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->	
</div> <!-- /row-->


<script src="custom/js/setting.js"></script>
<?php require_once 'includes/footer.php'; ?>