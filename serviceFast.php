<?php 
    require_once 'includes/headerShop.php'; 
?>

<style type="text/css">
    /* Steps Process*/
    .process-step .btn:focus{outline:none}
    .process{display:table;width:100%;position:relative}
    .process-row{display:table-row}
    .process-step button[disabled]{opacity:1 !important;filter: alpha(opacity=100) !important}
    .process-row:before{top:40px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0}
    .process-step{display:table-cell;text-align:center;position:relative}
    .process-step p{margin-top:4px}
    .btn-circle{width:80px;height:80px;text-align:center;font-size:12px;border-radius:50%}

    .imageupload {
        margin: 20px 0;
    }

 
</style>
<script>
    // steps process    
    $(function(){
      $('.btn-circle').on('click',function(){
        $('.btn-circle.btn-success').children().css("color", "#000");
        $('.btn-circle.btn-success').removeClass('btn-success').addClass('btn-default');
        $(this).addClass('btn-success').removeClass('btn-default').blur();
        $('.btn-circle.btn-success').children().css("color", "#ffffff");
      });
      $('.next-step, .prev-step').on('click', function (e){
        var $activeTab = $('.tab-pane.active');
        $('.btn-circle.btn-success').children().removeAttr("style").css("color", "Black");
        $('.btn-circle.btn-success').removeClass('btn-success').addClass('btn-default'); 
        if ( $(e.target).hasClass('next-step') ){
            var nextTab = $activeTab.next('.tab-pane').attr('id');
            $('[href="#'+ nextTab +'"]').addClass('btn-success').removeClass('btn-default');
            $('[href="#'+ nextTab +'"]').tab('show');
        }else{
            var prevTab = $activeTab.prev('.tab-pane').attr('id');
            $('[href="#'+ prevTab +'"]').addClass('btn-success').removeClass('btn-default');
            $('[href="#'+ prevTab +'"]').tab('show');
        }
        $('.btn-circle.btn-success').children().css("color", "#ffffff");
      });
    });     
  
</script>
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
                                <i class="glyphicon glyphicon glyphicon-book" style="font-size: 20px;"></i>
                                <?php echo tr("Service Fast")?>
                            </h4>
                        </div>
                        <div class="panel-body"> 
                            <div class="container">
                                <div class="row">
                                    <div class="process">
                                        <div class="process-row nav nav-tabs">
                                            <div class="process-step">
                                                <button type="button" class="btn btn-success btn-circle" data-toggle="tab" href="#menu1"><i style="color:#ffffff" class="fa fa-info fa-3x"></i></button>
                                                <p><small>Fill<br />information</small></p>
                                            </div>
                                            <div class="process-step">
                                                <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i style="color:#000000" class="fa fa-image fa-3x" ></i></button>
                                                <p><small>Upload<br />request</small></p>
                                            </div>
                                            <div class="process-step">
                                                <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i style="color:#000000" class="fa fa-file-text-o fa-3x" ></i></button>
                                                <p><small>Special <br />demands</small></p>
                                            </div>
                                            <div class="process-step">
                                                <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i style="color:#000000" class="fa fa-shopping-bag fa-3x"></i></button>
                                                <p><small>Service<br />shop</small></p>
                                            </div>
                                            <div class="process-step">
                                                <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i style="color:#000000" class="fa fa-check fa-3x"></i></button>
                                                <p><small>Save<br />result</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div id="menu1" class="tab-pane fade active in">
                                            <h3>Fill information</h3>
                                            <form class=" form-horizontal">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Full Name</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="Full Name" class="form-control" required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Address Line 1</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="addressLine1" name="addressLine1" placeholder="Address Line 1" class="form-control" required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Address Line 2</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="addressLine2" name="addressLine2" placeholder="Address Line 2" class="form-control" required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">City</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="city" name="city" placeholder="City" class="form-control" required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">State/Province/Region</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="state" name="state" placeholder="State/Province/Region" class="form-control" required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Postal Code/ZIP</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="postcode" name="postcode" placeholder="Postal Code/ZIP" class="form-control" required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Country</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                                            <select class="selectpicker form-control">
                                                                <option>A really long option to push the menu over the edget</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Email</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="email" name="email" placeholder="Email" class="form-control" required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Phone Number</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="phoneNumber" name="phoneNumber" placeholder="Phone Number" class="form-control" required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                            <ul class="list-unstyled list-inline pull-right">
                                            <li><button type="button" class="btn btn-success next-step">Next <i style="color:#ffffff" class="fa fa-chevron-right"></i></button></li>
                                            </ul>
                                        </div>
                                        <div id="menu2" class="tab-pane fade">
                                            <!-- bootstrap-imageupload. -->
                                            <div class="imageupload panel panel-default">
                                                <div class="panel-heading clearfix">
                                                    <h3 class="panel-title pull-left">Upload Image</h3>
                                                    <div class="btn-group pull-right">
                                                        <button type="button" class="btn btn-default active">File</button>
                                                        <button type="button" class="btn btn-default">URL</button>
                                                    </div>
                                                </div>
                                                <div class="file-tab panel-body">
                                                    <label class="btn btn-default btn-file">
                                                        <span>Browse</span>
                                                        <!-- The file is stored here. -->
                                                        <input type="file" name="image-file">
                                                    </label>
                                                    <button type="button" class="btn btn-default">Remove</button>
                                                </div>
                                                <div class="url-tab panel-body">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control hasclear" placeholder="Image URL">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-default">Submit</button>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-default">Remove</button>
                                                    <!-- The URL is stored here. -->
                                                    <input type="hidden" name="image-url">
                                                </div>
                                            </div>
                                            <ul class="list-unstyled list-inline pull-right">
                                            <li><button type="button" class="btn btn-default prev-step"><i style="color:#000" class="fa fa-chevron-left"></i> Back</button></li>
                                            <li><button type="button" class="btn btn-success next-step">Next <i style="color:#ffffff" class="fa fa-chevron-right"></i></button></li>
                                            </ul>
                                        </div>
                                        <div id="menu3" class="tab-pane fade">
                                            <h3>Always available to listen to your needs</h3>
                                            <form>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Please fill what you need</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </form>
                                            <ul class="list-unstyled list-inline pull-right">
                                            <li><button type="button" class="btn btn-default prev-step"><i style="color:#000" class="fa fa-chevron-left"></i> Back</button></li>
                                            <li><button type="button" class="btn btn-success next-step">Next <i style="color:#ffffff" class="fa fa-chevron-right"></i></button></li>
                                            </ul>
                                        </div>
                                        <div id="menu4" class="tab-pane fade">
                                            <h3>Choose your type of payement</h3>
                                            <form>
                                                <label> 
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </label>
                                                <label>
                                                <input type="radio" name="test" value="small" checked>
                                                <img src="assests/images/shop/shop.png">
                                                </label>

                                                <label>
                                                <input type="radio" name="test" value="big">
                                                <img src="assests/images/shop/delivery.png" width="320" >
                                                </label>
                                            </form>
                                            <ul class="list-unstyled list-inline pull-right">
                                            <li><button type="button" class="btn btn-default prev-step"><i style="color:#000" class="fa fa-chevron-left"></i> Back</button></li>
                                            <li><button type="button" class="btn btn-success next-step">Next <i style="color:#ffffff" class="fa fa-chevron-right"></i></button></li>
                                            </ul>
                                        </div>
                                        <div id="menu5" class="tab-pane fade">
                                            <h3>Summary</h3>
                                            <p>Dear customer a message will send to confirm your order</p>
                                            <ul class="list-unstyled list-inline pull-right">
                                            <li><button type="button" class="btn btn-default prev-step"><i style="color:#000" class="fa fa-chevron-left"></i> Back</button></li>
                                            <li><button type="button" class="btn btn-success"><i style="color:#ffffff" class="fa fa-check"></i> Done!</button></li>
                                            </ul>
                                        </div>
                                    </div>
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
<script>
     //upload pic
    var $imageupload = $('.imageupload');
    $imageupload.imageupload();
  
</script>
<?php require_once 'includes/footer.php'; ?>