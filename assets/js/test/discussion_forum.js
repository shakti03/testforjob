$(function(){
    $("#show_discussion").on("click",function(){
	qid= $('input[name=qid]').val();
        $.ajax({
            url:BASE_URL+'/get-discussion-comments/'+qid,
            dataType:'json',
            success: function(response){
                alert(response);
            },
            error: function(response,xhr){
                alert("err:"+response);
                    console.log(response);
            }
        });
    });
});