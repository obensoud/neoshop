var urlImage ='';
$(document).ready(function() {
    // manage brand table
    $("#manageTchatTable").DataTable({
        'ajax': 'php_action/fetchUserConnectes.php',
        'order': []     
    });
});

$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '#new_chat', function (e) {
    var size = $( ".chat-window:last-child" ).css("margin-left");
     size_total = parseInt(size) + 400;
    alert(size_total);
    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
    clone.css("margin-left", size_total);
});
$(document).on('click', '.icon_close', function (e) {
    //$(this).parent().parent().parent().parent().remove();
    $( "#chat_window_1" ).remove();
});
function creatTchat(nomUser) {
    var tempNomUser =nomUser.replace(' ','');
    var stringNomUser="sendMessage(\'"+nomUser+"\')";
    $('#tchat').html('<div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">'+
    '<div class="col-xs-12 col-md-12">'+
        '<div class="panel panel-default"  style="margin-bottom: 0px;">'+
            '<div class="panel-heading top-bar">'+
                '<div class="col-md-8 col-xs-8">'+
                    '<h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat '+nomUser+'</h3>'+
                '</div>'+
                '<div class="col-md-4 col-xs-4" style="text-align: right;">'+
                    '<a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>'+
                    '<a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>'+
                '</div>'+
            '</div>'+
            '<div class="panel-body msg_container_base" id="msg_container_base'+tempNomUser+'">'+
            '</div>'+
            '<div class="panel-footer">'+
                '<div class="input-group">'+
                    '<input id="btn-input'+tempNomUser+'" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />'+
                    '<span class="input-group-btn">'+
                    '<button class="btn btn-primary btn-sm" id="btn-chat" onclick= "'+stringNomUser+'" >Envoyer</button>'+
                    '</span>'+
                '</div>'+
            '</div>'+
       '</div>'+
    '</div>'+
'</div>');
}
function sendMessage(nomUser){
    if(urlImage == ''){
        var valueOfBarreCode=$('#barcodeScanner').val();
        valueOfNomUser = nomUser;
        $.ajax({
            url: 'php_action/fetchUserImageUrl.php',
            type: 'post',
            data: {NomUserVal : valueOfNomUser},
            dataType: 'json',
            success:function(response) {
                urlImage=response.user_image;
                urlImage=urlImage.substring(3,urlImage.length);

                var tempNomUser =nomUser.replace(' ','');
                $('#msg_container_base'+tempNomUser).append('<div class="row msg_container base_sent">'+
                            '<div class="col-md-10tchat col-xs-10">'+
                                '<div class="messages msg_sent">'+
                                    '<p>'+$("#btn-input"+tempNomUser).val()+'</p>'+
                                    '<time datetime="2009-11-13T20:00">Timothy • 51 min</time>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-2tchat col-xs-2 avatar">'+
                               '<img src="'+urlImage+'" class=" img-responsive ">'+
                            '</div>'+
                        '</div>');
                $("#btn-input"+tempNomUser).val("");
            }
        })
    }else{
        var tempNomUser =nomUser.replace(' ','');
        $('#msg_container_base'+tempNomUser).append('<div class="row msg_container base_sent">'+
                            '<div class="col-md-10tchat col-xs-10">'+
                                '<div class="messages msg_sent">'+
                                    '<p>'+$("#btn-input"+tempNomUser).val()+'</p>'+
                                    '<time datetime="2009-11-13T20:00">Timothy • 51 min</time>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-2tchat col-xs-2 avatar">'+
                               '<img src="'+urlImage+'" class=" img-responsive ">'+
                            '</div>'+
                        '</div>');
        $("#btn-input"+tempNomUser).val("");
    }
}
