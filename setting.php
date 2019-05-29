<?php require_once 'includes/header.php'; ?>

<?php 
$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM users WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();
?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="dashboard.php">Accueil</a></li>		  
			<li class="active">Paramètres</li>
		</ol>

		<div class="panel panel-default" >
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> Paramètres</div>
			</div> <!-- /panel-heading -->
			</br>	
			<div class="row" style="padding-right: 15px;padding-left: 15px;">
				<div class="col-md-4"  >
					<div class="panel panel-success">
						<div class="panel-heading">
							<a href="profiluser.php" style="text-decoration:none;color:black;">
								<span class="glyphicon glyphicon-tower"></span> 
								Créer un profil
							</a>
						</div> <!--/panel-hdeaing-->
					</div> <!--/panel-->
				</div> <!--/col-md-4-->

				<div class="col-md-4">
					<div class="panel panel-info">
						<div class="panel-heading">
							<a href="optionuser.php" style="text-decoration:none;color:black;">
								<span class="glyphicon glyphicon-stats"></span> 
								Créer des options
							</a>
						</div> <!--/panel-hdeaing-->
					</div> <!--/panel-->
				</div> <!--/col-md-4-->
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="groupOptionUser.php" style="text-decoration:none;color:black;">
								<span class="glyphicon glyphicon-folder-open"></span> 
								Créer un groupe d'options
							</a>
						</div> <!--/panel-hdeaing-->
					</div> <!--/panel-->
				</div> <!--/col-md-4-->
				<div class="col-md-4">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<a href="user.php" style="text-decoration:none;color:black;">
								<span class="glyphicon glyphicon-user"></span> 
								Tous les utilisateurs
							</a>
						</div> <!--/panel-hdeaing-->
					</div> <!--/panel-->
				</div> <!--/col-md-4-->

				<div class="col-md-4">
					<div class="panel panel-warning">
						<div class="panel-heading">
							<a href="myInf.php" style="text-decoration:none;color:black;">
								<span class="glyphicon glyphicon-info-sign"></span> 
								Mes informations

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