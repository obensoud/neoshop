    $('#barcode').addClass('active');

    var temp = $(".0").html();  
    function imprimebarcode(){
      $(".0").html(temp);
      $(".11").html($(".barcodeTarget").html());
      $(".12").html($(".barcodeTarget").html());
      $(".13").html($(".barcodeTarget").html());
      //$(".14").html($(".barcodeTarget").html());
      var pas;
      var htmlbarcode='';
      for (pas = 0; pas < 10; pas++) {
        htmlbarcode+=$(".0").html();
      }
      $(".0").html(htmlbarcode);
      $("#tablebarcode").removeClass('hidden');
      $("#backImp").removeClass('hidden');
      $("#breadcrumbImp").addClass('hidden');
      $("#panelImp").addClass('hidden');
      $("#picklistImp").addClass('hidden');
      $("#btnImp").addClass('hidden');
      setTimeout(myFunctionImp, 1000);
    }
    function myFunctionImp() {
      window.print();
    }
    function myFunctionBack() {
      $("#tablebarcode").addClass('hidden');
      $("#backImp").addClass('hidden');
      $("#breadcrumbImp").removeClass('hidden');
      $("#panelImp").removeClass('hidden');
      $("#picklistImp").removeClass('hidden');
      $("#btnImp").removeClass('hidden');
    }
    function hiddenimprimebarcode(){
      $("#tablebarcode").removeClass('hidden');
      $("#tablebarcode").addClass('hidden');
    }
    function generateBarcode(){
      var value = $('#barcodeValue option:selected').text();
      var btype = $("input[name=btype]:checked").val();
      var renderer = $("input[name=renderer]:checked").val();

      var quietZone = false;
      if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
        quietZone = true;
      }

      var settings = {
        output:renderer,
        bgColor: $("#bgColor").val(),
        color: $("#color").val(),
        barWidth: $("#barWidth").val(),
        barHeight: $("#barHeight").val(),
        moduleSize: $("#moduleSize").val(),
        posX: $("#posX").val(),
        posY: $("#posY").val(),
        addQuietZone: $("#quietZoneSize").val()
      };
      if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
        value = {code:value, rect: true};
      }
      if (renderer == 'canvas'){
        clearCanvas();
        $("#barcodeTarget").hide();
        $("#canvasTarget").show().barcode(value, btype, settings);
      } else {
        $("#canvasTarget").hide();
        $("#barcodeTarget").html("").show().barcode(value, btype, settings);
        $("#canvasTarget1").hide();
        $("#barcodeTarget1").html("").show().barcode(value, btype, settings);
      }
    }

    function showConfig1D(){
      $('.config .barcode1D').show();
      $('.config .barcode2D').hide();
    }

    function showConfig2D(){
      $('.config .barcode1D').hide();
      $('.config .barcode2D').show();
    }

    function clearCanvas(){
      var canvas = $('#canvasTarget').get(0);
      var ctx = canvas.getContext('2d');
      ctx.lineWidth = 1;
      ctx.lineCap = 'butt';
      ctx.fillStyle = '#FFFFFF';
      ctx.strokeStyle  = '#000000';
      ctx.clearRect (0, 0, canvas.width, canvas.height);
      ctx.strokeRect (0, 0, canvas.width, canvas.height);
    }

    $(function(){
      $('input[name=btype]').click(function(){
        if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
      });
      $('input[name=renderer]').click(function(){
        if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
      });
      generateBarcode();
    });

