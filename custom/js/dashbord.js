var nemberOfRow=1;
var nemberOfALLRow=1;
$('#barcodeScanner').keyup(function(e) {    
   if(e.keyCode == 13) { // KeyCode de la touche entrée
   	var valueOfBarreCode=$('#barcodeScanner').val();
    //console.log('valueOfBarreCode: '+valueOfBarreCode);
		$.ajax({
			url: 'php_action/fetchCodeBarreProduct.php',
			type: 'post',
			data: {barCodeScannerVal : valueOfBarreCode},
			dataType: 'json',
			success:function(response) {
          //console.log('response: '+response);
          $('#ListDesProduit').append("<tr id=\"row"+nemberOfRow+"\"> </th> <td class=\"product_name\" style=\"font-size:14px\;\" > "+response.product_name+" </td> <td><input id=\"number"+nemberOfRow+"\" type=\"number\" step=\"1\"  onchange=\"myCalcule()\" class= \"form-control price\" value = \"1\" min=\"1\" max=\"99\"></td>  <td id=\"rate"+nemberOfRow+"\" class=\"rate\">"+response.salePrice+"</td> <td class=\"totalrate\" id=\"total"+nemberOfRow+"\">"+response.rate+"</td> <td> <button class=\"btn btn-default removeProductRowBtn removeProductRowBtntable\" type=\"button\" id=\"removeProductRowBtn\" onclick=\"removeProductRow("+nemberOfRow+")\"><i class=\"glyphicon glyphicon-trash\"> </i> </button> </td> </tr>");
          ++nemberOfRow;
          ++nemberOfALLRow;
          myCalcule();
        }
			 })
          $('#barcodeScanner').val('');
 }
});
$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


    });
function myCalcule() {
  var Totalreceipt = 0; 
  var i;
  for (i = 1; i<nemberOfALLRow; i++){
    if(parseFloat($('#rate'+i).html()) != 'NaN'){
      var temp = parseFloat($('#rate'+i).html())* parseFloat($('#number'+i).val());
      $('#total'+i).html(temp);
      if($('#total'+i).html() != null){
        if(parseFloat($('#total'+i).html()) != 'NaN'){
          Totalreceipt += parseFloat($('#total'+i).html());
        }
      }
    } 
  }
  Totalreceipt =Totalreceipt.toFixed(2);
  //Totalreceipt = Totalreceipt + Totalreceipt * 0.2; //Calcule de TVA
  $('#Totalreceipt').html(Totalreceipt);
}

function removeProductRow(row = null) {
  if(row) {
    $("#row"+row).remove();
    --nemberOfRow;
     myCalcule();
  } else {
    alert('error! Refresh the page again');
  }
}

function removeProductAllRow(){
  var i;
  var temp = nemberOfRow;
  for (i = 1; i<temp; i++){
    removeProductRow(i);
  }
  $('#Totalreceipt').html(0);
}
function saveChange(){
  var i ;
  var myArrayProdactName = new Array();
  var myArrayQuanty = new Array();
  var myArrayPrice = new Array();
  var myArrayTotal = new Array();
  $(".changeButton").addClass('hidden');
  $(".changeButton2").removeClass('hidden');
  for (i=0;i<$('.totalrate').size();i++){
    var temp = $('.product_name').get(i).innerHTML;
    temp = temp.substring(1,temp.length-1);
    myArrayProdactName.push(temp);
    myArrayQuanty.push($('.price').get(i).value);
    myArrayPrice.push($('.rate').get(i).innerHTML);
    myArrayTotal.push($('.totalrate').get(i).innerHTML);
  }
  var myJSONProdactName = JSON.stringify(myArrayProdactName);
  var myJSONQuanty = JSON.stringify(myArrayQuanty);
  var myJSONPrice = JSON.stringify(myArrayPrice);
  var myJSONTotal = JSON.stringify(myArrayTotal);
  $.ajax({
      url: 'php_action/createReceipt.php',
      type: 'post',
      data: {Totalreceipt : $('#Totalreceipt').html(), NemberOfRow : nemberOfRow, myJSONProdactName : myJSONProdactName, myJSONQuanty : myJSONQuanty, myJSONPrice : myJSONPrice, myJSONTotal : myJSONTotal},
      dataType: 'json',
      success:function(response) {
        }
       })
}
function newReciept(){
  $(".changeButton2").addClass('hidden');
  $(".changeButton").removeClass('hidden');
  removeProductAllRow();
}
// print receipt function
function printReceipt() {
  
  $(".removeProductRowBtntable").attr('style','display: none;');
  $(".price").attr('readonly','');
  var temp = $('#tableReceipt').html(); 
  if(imprimer_bloc('', 'tableReceipt')){
    console.log('kk');
  }
  $(".removeProductRowBtntable").removeAttr('style');
  $(".price").removeAttr('readonly');
  removeProductAllRow();
  // la suite stokee ça dans la base de donée et soustrere du stocke 
} 

function imprimer_bloc(titre, objet) {
  var days = ["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];
  var d = new Date();
  var FullTime =days[d.getDay()]+" "+d.getDate()+" "+d.getFullYear()+" "+ d.getHours()+":"+d.getMinutes()+":"+ d.getSeconds();
  // Définition de la zone à imprimer
  var zone = document.getElementById(objet).innerHTML;
  var hRecipt = "<H1> Bienvenue à la librairie  </H1>";
  var hRecipt2 ="<H1> ------Bensouda-----</H1> <br />" ;
  zone = hRecipt+hRecipt2 + FullTime +zone;
  // Ouverture du popup
  var fen = window.open("", "", "height=500, width=600,toolbar=0, menubar=0, scrollbars=1, resizable=1,status=0, location=0, left=10, top=10"); 
  // style du popup
  fen.document.body.style.color = '#000000';
  fen.document.body.style.backgroundColor = '#FFFFFF';
  fen.document.body.style.padding = "20px";
  // Ajout des données a imprimer
  fen.document.title = titre;
  fen.document.body.innerHTML += " <table>" + zone + "</table> ";
  // Impression du popup
  fen.window.print();
  //Fermeture du popup
  fen.window.close();
  return true;
}


/////////////////////////////////////////////////////////////::::///////////////////////////
//$('.totalrate').get(1).innerHTML
//$('.totalrate').size();
