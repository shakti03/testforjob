$(function(){
    $("#show_discussion").on("click",function(){
	qid= $('input[name=hide_qid]').val();
        console.log(qid);
        $.ajax({
            url:BASE_URL+'/get-discussion-comments/'+qid,
            dataType:'json',
            success: function(response){
                $('.show-discussion').show();
                $('input[name=hide_qid]').val(response['qid']);
                $('input[name=hide_uid]').val(response['uid']);                
                console.log(response);
                $.each(response['result'], function(key,value){
                    $('.show-discuss-comments').append('<div class="panel panel-primary"><div class="panel-heading"><h3 class="panel-title">'+ value["first_name"] +'</h3></div><div class="panel-body">'+ value["comment"] +'</div></div>');
                });
            },
            error: function(response,xhr){
                console.log(response);
            }
        });
    });
    
    //Leave a comment
    $("#submit_comment").on("click", function(){
	qid= $('input[name=hide_qid]').val();
	uid= $('input[name=hide_uid]').val();
        comment = $('#txt_comment').val();
        console.log(comment);
        send_data = {'qid': qid, 'uid': uid, 'comment': comment };
        console.log(send_data)
        $.ajax({
            url: BASE_URL+'/add-comment',
            dataType: 'json',
            type: 'post',
            data: send_data,
            success: function(response){
                if (response || response == null) {
                    $('#txt_comment').val('');
                    console.log("res:"+response)
                    $('.show-discuss-comments').append('<div class="panel panel-primary"><div class="panel-heading"><h3 class="panel-title">'+ response +'</h3></div><div class="panel-body">'+ comment +'</div></div>');
                }
            },
            error: function(response, xhr){
                alert("error");
            }
        });
        
    });
});