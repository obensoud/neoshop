<?php 
    require_once 'includes/headerShop.php'; 
?>


	<div class="row">
		<div>
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
		    </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                        <div class="panel-heading "> 
                            <h4>
                                <i class="glyphicon glyphicon glyphicon-hand-down" style="font-size: 20px;"></i>
                                <?php echo tr("Bonjour")?>
                            </h4>
                        </div>
                        <div class="panel-body"> 
                            <h1>
                                <?php 
                                    echo tr("who are we?")
                                ?>
                            </h1>
                            <h3>
                                <?php 
                                    echo tr("Live the unique experience, which defends a Moroccan economy. A real neighborhood bookstore, but with the services of big brands that fits in your smartphone. We advocate a new alternative delivery mode to traditional channels while protecting your time. No shipping costs guaranteed if you remove your book from the bookstore.");
                                ?> 
                            </h3>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="flip-card">
                                            <div class="flip-card-inner">
                                                <div class="flip-card-front">
                                                    <img src="assests/images/shop/fourniture.jfif" alt="Avatar" style="width:300px;height:300px;">
                                                </div>
                                                <div class="flip-card-back">
                                                    <h1>John Doe</h1> 
                                                    <p>Architect & Engineer</p> 
                                                    <p>We love that guy</p>
                                                    <button class="btn btn-success" type="button"  onclick="">
                                                        <i class="glyphicon glyphicon-pencil" style="color:white"> </i>
                                                        <?php echo tr(" Supply")?>
                                                    </button> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="flip-card">
                                            <div class="flip-card-inner">
                                                <div class="flip-card-front">
                                                    <img src="assests/images/shop/boock.png" alt="Avatar" style="width:300px;height:300px;">
                                                </div>
                                                <div class="flip-card-back">
                                                    <h1>John Doe</h1> 
                                                    <p>Architect & Engineer</p> 
                                                    <p>We love that guy</p>
                                                    <button class="btn btn-success" type="button"  onclick="">
                                                        <i class="glyphicon glyphicon-book" style="color:white"> </i>
                                                        <?php echo tr(" Book")?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="flip-card">
                                            <div class="flip-card-inner">
                                                <div class="flip-card-front">
                                                    <img src="assests/images/shop/fastService.png" alt="Avatar" style="width:300px;height:300px;">
                                                </div>
                                                <div class="flip-card-back">
                                                    <h1>John Doe</h1> 
                                                    <p>Architect & Engineer</p> 
                                                    <p>We love that guy</p>
                                                    <button class="btn btn-success" type="button"  onclick="$(location).attr('href', '/servicefast.php');">
                                                        <i class="glyphicon glyphicon-list-alt" style="color:white"> </i>
                                                        <?php echo tr(" Request")?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
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


<?php require_once 'includes/footer.php'; ?>