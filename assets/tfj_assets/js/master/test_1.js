//Java script code for ojective-test.phtml, subjective.phtml
//Description: timer logic, ajax request for getting next question, ajax request for submit question

function setRequest(me){
    page= $(me).attr('value');
    $('input#save').show();
    $('button#study').hide();
    $.ajax(
        {
            type: 'GET',
            url: SITE_URL+'/user/ajax/get-question',
            data: "page="+page,
            cache: false,
            dataType: "json",
            beforeSend: loader(),
            success: function(data)
            {
                if(data)
                {
                    if(data.moveprevious){
                        $('a#moveprevious').attr('value',data.moveprevious);
                        $('a#moveprevious').attr('onClick','setRequest(this)');
                    }
                    else{
                        $('a#moveprevious').attr('onClick','javascript:void(0)');
                    }
                    if(data.movenext){
                        $('a#movenext').attr('value',data.movenext);
                        $('a#movenext').attr('onClick','setRequest(this)');
                    }
                    else{
                        $('a#movenext').attr('onClick','javascript:void(0)');
                    }
                    
                    $('span#question-group').text(data.question.group);
                    $('span#question-chapter').text(data.question.chapter);
                    $('span#question-questionno').text(data.page);
                    $('span#question-question').text(data.question.question);
                    $('span#question-optiona').text(data.question.optiona);
                    $('span#question-optionb').text(data.question.optionb);
                    $('span#question-optionc').text(data.question.optionc);
                    $('span#question-optiond').text(data.question.optiond);

                    $('span#a_error').html('');
                    $('span#b_error').html('');
                    $('span#c_error').html('');
                    $('span#d_error').html('');
                    
                    if(data.question.useranswer != null){
                        $('span.option_error').attr('style','color:#ff0000');
                        $('#a_error').html('Wrong');
                        $('#b_error').html('Wrong');
                        $('#c_error').html('Wrong');
                        $('#d_error').html('Wrong');
                        $('#'+data.question.answer+'_error').html('Correct');
                        $('#'+data.question.answer+'_error').attr('style','color:#339900');
//                        alert(data.question.useranswer);
                        $('#opt'+data.question.useranswer).prop('checked',true);
                        $('[name="option"]').attr('disabled',true);
                        $('input#save').hide();
                        $('button#study').show();
                    }
                    else{
                        $('[name="option"]').attr('disabled',false);
                        $('[name="option"]').prop('checked',false);
                    }
                    
                    closeLoader();
                }

            },
            error: function(xhr,status,err) {
                    alert(xhr.responseText);
                    $('div#loader').hide();   
           
            }
        });

}
    
$(document).ready(function(){
    hours = $("span#hours").attr('value');
    minutes = $("span#minutes").attr('value');
    seconds = $("span#seconds").attr('value');   
    

    $('#timer').html(hours+':'+minutes+':'+seconds);
    timeid = setInterval(function(){
                if(hours == 0 && minutes == 0 && seconds == 0){
                    alert('Time Over');
                    clearInterval(timeid);
                }
                else{
                    if( minutes == 0 && hours !=0){
                        hours--;
                        minutes = 60;
                    }
                    if( seconds == 0){
                        minutes--;
                        seconds = 60;
                    }
                    $('#timer').html(hours+':'+minutes+':'+--seconds);
                }
            }, 1000);
    
    $('#showresult').click(function(){
        $('#backgroundpopup').show();
        $('#resultDiv').slideDown(600); 
    });

    $('#closeresult').click(function(){
        $('#backgroundpopup').hide();
        $('#resultDiv').slideUp(500); 
    });
    
    $('#frmTest').submit(function(){
        if($("input[type=submit]:submit").attr('id') == 'save'){
            if(!$('[name="option"]:checked').val()){
                alert('Please select an option');
                return false;
            }
        }
        $('input#save').show();
        $('button#study').hide();
        $.ajax(
        {
            type: "POST",
            url: SITE_URL+"/user/ajax/submit-question",
            catche: false,
            dataType: "json",
            data: {"page": $('span#question-questionno').html(),
                   "option":$('[name="option"]:checked').val(),
                   "time_elapsed": "10"},
            beforeSend: loader(),
            success: function(data)
            {
                if(data.useranswer != null){
                     $('span.option_error').attr('style','color:#ff0000');
                        $('#a_error').html('Wrong');
                        $('#b_error').html('Wrong');
                        $('#c_error').html('Wrong');
                        $('#d_error').html('Wrong');
                        $('#'+data.answer+'_error').html('Correct');
                        $('#'+data.answer+'_error').attr('style','color:#339900');
                        $('#opt'+data.useranswer).attr('checked','true');
                        $('[name="option"]').attr('disabled','true');
                        
                        $('span#testdata-answered').text(data.answered);
                        $('span#testdata-unanswered').text(data.unanswered);
                        $('span#testdata-correctAnswered').text(data.correct);
                        $('span#testdata-wrongAnswered').text(eval(data.answered-data.correct));
                        $('span#score').text(eval(data.correct * $('span#markPerQuestion').text()));
                        
                        $('input#save').hide();
                        $('button#study').show();
                }
                closeLoader();
            },
            error: function(xhr,status,err) {
                alert(xhr.responseText);
            }   
        });
        
        return false;
    });
    
    
       
   
});

function showStudySolution(){
    $('div#StudySolution').slideDown(500);
    return false;
}

function closeStudySolution(){
    $('div#StudySolution').slideUp(500);
}

function loader(){ 
    $('div#backgroundpopup').show();
    $('div#loader').show();
}

function closeLoader(){
    $('div#backgroundpopup').hide();
    $('div#loader').hide();
}