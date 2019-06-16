  <?php require_once 'includes/header.php'; ?>
  <div id="page">
    <div class="row">
      <div  class="col-md-12">
        <div id ='breadcrumbImp'>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><?php echo tr("Home")?></a></li>     
            <li class="active">Générer le code barre</li>
          </ol>
        </div>
        <div class="panel panel-default">
          <div id ='panelImp'>
            <div class="panel-heading">
              <div class="page-heading"> <i class="glyphicon glyphicon-barcode"></i> Générer le code barre</div>
            </div> <!-- /panel-heading -->
          </div>
          <div class="panel-body" style="padding-right: 0px;padding-left: 0px;">

            <div class="remove-messages"></div>

              <div id="generator">
            
              <div id="picklistImp" class="form-inline  col-md-offset-2">
                <div class="form-group">
                  <label for="email">Choisir le code barre:</label>
                  <select class="form-control" name="productName[]" style= "width:500px;" id="barcodeValue" onchange="hiddenimprimebarcode();">
                      <option value="">~~Select~~</option>
                      <?php
                      $productSql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity != 0 ";
                      $productData = $connect->query($productSql);

                      while($row = $productData->fetch_array()) {                     
                        echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."'>".$row['barcode']."</option>";
                          } // /while 

                          ?>
                    </select>
                </div>
                 <button type="submit" class="btn btn-success" onclick="generateBarcode(); imprimebarcode();"> <i class="glyphicon glyphicon-ok-sign"></i> Générer le code barre</button>
              </div> 

                <div id="config" class="hidden">
                    <div class="config">
                      <div class="title">Type</div>
                      <input type="radio" name="btype" id="ean8" value="ean8" ><label for="ean8">EAN 8</label><br />
                      <input type="radio" name="btype" id="ean13" value="ean13"><label for="ean13">EAN 13</label><br />
                      <input type="radio" name="btype" id="upc" value="upc"><label for="upc">UPC</label><br />
                      <input type="radio" name="btype" id="std25" value="std25"><label for="std25">standard 2 of 5 (industrial)</label><br />
                      <input type="radio" name="btype" id="int25" value="int25"><label for="int25">interleaved 2 of 5</label><br />
                      <input type="radio" name="btype" id="code11" value="code11"><label for="code11">code 11</label><br />
                      <input type="radio" name="btype" id="code39" value="code39"><label for="code39">code 39</label><br />
                      <input type="radio" name="btype" id="code93" value="code93"><label for="code93">code 93</label><br />
                      <input type="radio" name="btype" id="code128" value="code128" checked="checked"><label for="code128">code 128</label><br />
                      <input type="radio" name="btype" id="codabar" value="codabar"><label for="codabar">codabar</label><br />
                      <input type="radio" name="btype" id="msi" value="msi"><label for="msi">MSI</label><br />
                      <input type="radio" name="btype" id="datamatrix" value="datamatrix"><label for="datamatrix">Data Matrix</label><br /><br />
                    </div>

                    <div class="config">
                      <div class="title">Misc</div>
                      Background : <input type="text" id="bgColor" value="#FFFFFF" size="7"><br />
                      "1" Bars : <input type="text" id="color" value="#000000" size="7"><br />
                      <div class="barcode1D">
                        bar width: <input type="text" id="barWidth" value="1" size="3"><br />
                        bar height: <input type="text" id="barHeight" value="50" size="3"><br />
                      </div>
                      <div class="barcode2D">
                        Module Size: <input type="text" id="moduleSize" value="5" size="3"><br />
                        Quiet Zone Modules: <input type="text" id="quietZoneSize" value="1" size="3"><br />
                        Form: <input type="checkbox" name="rectangular" id="rectangular"><label for="rectangular">Rectangular</label><br />
                      </div>
                      <div id="miscCanvas">
                        x : <input type="text" id="posX" value="10" size="3"><br />
                        y : <input type="text" id="posY" value="20" size="3"><br />
                      </div>
                    </div>

                    <div class="config">
                      <div class="title">Format</div>
                      <input type="radio" id="css" name="renderer" value="css" checked="checked" ><label for="css">CSS</label><br />
                      <input type="radio" id="bmp" name="renderer" value="bmp" ><label for="bmp">BMP (not usable in IE)</label><br />
                      <input type="radio" id="svg" name="renderer" value="svg" ><label for="svg">SVG (not usable in IE)</label><br />
                      <input type="radio" id="canvas" name="renderer" value="canvas" ><label for="canvas">Canvas (not usable in IE)</label><br />
                    </div>
                </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">  
                      <div id="barcodeTarget" class="barcodeTarget hidden"></div>
                      <canvas id="canvasTarget" width="150" height="150"></canvas>
                    </div>
                  </div>
                <table id="tablebarcode" class="table table-bordered hidden"  style=" margin-top:6px; height:43cm;text-align:center; table-layout: fixed;  border-collapse: separate;  border-spacing:10px;">
                  <tbody class="0">
                    <tr class="1">
                      <td class="11"  style="padding-top:45px;" ></td>
                      <td class="12"  style="padding-top:45px;" ></td>
                      <td class="13"  style="padding-top:45px;" ></td>
                      <!-- <td class="14"  style="padding-top:45px;" ></td> -->
                    </tr>
                    </tbody>
                </table>
                <a id="backImp"class="hidden" href="javascript:myFunctionBack()">Retour</a>
              </div>  
              </div> <!-- /panel-body -->
            </div> <!-- /panel -->    
          </div> <!-- /col-md-12 -->
        </div> <!-- /row -->
      </div>
      <script type="text/javascript" src="assests/jquery/jquery-1.3.2.min.js"></script>
      <script type="text/javascript" src="assests/jquery/jquery-barcode.js"></script>
      <script type="text/javascript" src="custom/js/barcode.js"></script>
      <?php require_once 'includes/footer.php'; ?>