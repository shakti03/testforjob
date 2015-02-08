$(document).ready(function () {

    //Display live chat window
    $(".live-chat-btn").on('click', function(e){    
        $('.live-chat').show();
        $(".live-chat-btn").hide();
    });
    
    $(".close-initial-chat").on('click', function(e){
        $(this).parent().parent().parent().hide();
        $(".live-chat-btn").show();
    });
    
    // Close Chat window
    $(".live-chat-window").on('click', '.close-chat', function(e){
        $(this).parent().parent().parent().remove();
        $(".live-chat-btn").show();
    });
    
    // Submit Chat username and start chat
    $('#chat_submit').click(function(){
        var chat_uname = $('#chat_uname').val();
        var send_data = {'chat_uname':chat_uname};
        $.ajax({
            url:  base_url+'/chat/create',
            type: 'post',
            data: send_data,
            dataType: 'json',
            success: function(data){
                //console.log(data);
                $('.live-chat').hide();
                $('.live-chat-window').show();
                if (data) {
                    $('.live-chat-window').append("<div class='chat_div'></div>");
                    $('.chat_div').append('<div>Live Chat<a><img class="img-circle float close-chat" width="25px;" src="images/icon_close.png"/></a></div>');
                    $('.chat_div').append("<div id='div_chat_"+ data['fid'] +"'><input type=\"hidden\" id=\"hide_" + data['fid'] + "\" value='"+JSON.stringify(data)+"'/>");
                    $('#div_chat_'+ data['fid']).append("<div style='overflow-x:auto; height:70%;' id=\"chat_" + data['fid'] + "\"></div><br>");
                    $('#div_chat_'+ data['fid']).append("<input class=\"msg\" id=\"msg_" + data['fid'] + "\" type=\"text\" /></div>");
                }
            },
            error: function(xhr, status, error) {
                //var err = eval("(" + xhr.responseText + ")");
                //console.log(xhr.responseText);
            }
        });
    });
    
    // Start Chat Code
    
            setInterval(function() {
                //var sender = $("#cuser").val();
                //var send_data = {"sender":sender , "reciever":reciever, "msg":msg, "status": 0};
                $.ajax({
                    url:  base_url+'/chat/receivechat',
                    type: 'post',
                    dataType: 'json',
                    success: function(data){
                        //console.log("receiving...");
                        //console.log(data);                        
                        if (data) {
                            keys = Object.keys(data);
                            //console.log(keys);
                            if (((keys[0].split('_'))[0]) == 'activechat') {
                                //console.log("create new block");
                                $.each(data, function(k, v){
                                    //$create_div = "<div id='chat_div'></div>";
                                    temp = JSON.stringify(v);
                                    //console.log(temp);
                                    //console.log(v);
                                    $('.live-chat-window').append("<div class='chat_div'></div>");
                                    $('.chat_div').append('<div>Live Chat<a><img class="img-circle float close-chat" width="25px;" src="images/icon_close.png"/></a></div>');
                                    $('.chat_div').append("<div id='div_chat_"+ (k.split('_')[1]) +"'><input id='hide_"+ (k.split('_')[1]) +"' type='hidden' value='"+ JSON.stringify(v) + "' />");
                                    $('#div_chat_'+(k.split('_')[1])).append("<div style='overflow-x:auto; height:70%;'  id='chat_"+ (k.split('_')[1]) +"'></div>");
                                    $('#div_chat_'+ (k.split('_')[1])).append("<input class='msg' id='msg_"+ (k.split('_')[1]) +"' type='text' /><br></div>");
                                });
                            }
                            else {
                                //console.log("else");
                                //console.log(data);
                                $.each(data, function(k,v){
                                    if ( $('.live-chat-window').children().length == 0 ) {
                                        var rev_data = {}
                                        rev_data['fid'] = v['fid']
                                        rev_data['sender'] = v['receiver']
                                        rev_data['receiver'] = v['sender']
                                        $('.live-chat-window').append("<div class='chat_div'></div>");
                                        $('.chat_div').append('<div>Live Chat<a><img class="img-circle float close-chat" width="25px;" src="images/icon_close.png"/></a></div>');
                                        $('.chat_div').append("<div id='div_chat_"+ v['fid'] +"'><input id='hide_"+ v['fid'] +"' type='hidden' value='"+ JSON.stringify(rev_data) + "' />");
                                        $('#div_chat_'+ v['fid']).append("<div style='overflow-x:auto; height:70%;'  id='chat_"+ v['fid'] +"'></div>");
                                        $('#div_chat_'+ v['fid']).append("<input class='msg' id='msg_"+ v['fid'] +"' type='text' /><br></div>");
                                    }
                                    //console.log("appending...");
                                    $("#chat_"+v['fid']).append(v['sender'] +": " +  v['msg'] + "<br>");
                                });
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        //var err = eval("(" + xhr.responseText + ")");
                        //console.log(xhr.responseText);
                    }
                });
            }, 1000);
        
            $(".live-chat-window").on('keyup', '.msg', function(e){
                if (e.which== 13) {
                var msg_id = $((this.id).split('_'))[1];
                var msg = $(this).val();
                var active_chat = $("#hide_"+msg_id).val();
                //console.log("msg");
                active_chat = JSON.parse(active_chat);
                ////console.log(typeof(active_chat) + active_chat);
                //if (active_chat != "[object Object]") {
                //    active_chat = JSON.parse(active_chat);
                //}
                //else {
                //    active_chat = JSON.stringify(active_chat);
                //    
                //}
                ////console.log(active_chat['fid']);
                var send_data = {"active_chat":active_chat , "msg":msg, "status": 0};
                //console.log(send_data);
                $.ajax({
                            url:  base_url+'/chat/sendchat',
                            type: 'post',
                            data: send_data,
                            dataType: 'json',
                            success: function (data) {
                            //console.log("sending..."+data);
                            //console.log(data);
                            $(this.id).val('');
                            $('#chat_'+msg_id).append(data['active_chat']['sender'] +": " +  data['msg']  + "<br>");
                            },
                            error: function(xhr, status, error) {
                                //var err = eval("(" + xhr.responseText + ")");
                                //console.log(xhr.responseText);
                            }
                    });
                }
            });
});