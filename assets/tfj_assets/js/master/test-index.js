    
function setCompany(val,testfor){
    company = null;
    subject = null;
    testType = $('select#testtype').val();
    questionType = $('select#questiontype').val();
    if(testfor == 'company')
    {
         company = val;
         $("input#company").val(val);
         $("input#subject").val('');
    }   
    if(testfor == 'subject')
    {
        subject = val;
        $("input#company").val('');
        $("input#subject").val(val);
    }
    
    ajax_fetch_testList(testType, questionType, company, subject);
    
}

function setSubject(val){
//    $('#subject').val(val);
//    $('#submit').click();
//    return false;
}

function ajax_fetch_test(testType,questionType){

    $.ajax({
        type:"post",
        url: SITE_URL+"/user/ajax/get-test",
        data: {'testType':testType,
                'questionType':questionType},
        cache: false,
        beforeSend: loader(),
        dataType: "json",
        success: function(data){
            str='';
            for(i=0;i<data.companies.length;i++){
                str += '<a href="javascript:void(0);" onclick="setCompany($(this).text(),\'company\')" >';
                str += data.companies[i]+'</a><br/>';
            }

            $("div#companyDiv").html(str);

            str='';
            for(i=0;i<data.subjects.length;i++){
                str += '<a href="javascript:void(0);" onclick="setCompany($(this).text(),\'subject\')" >';
                str += data.subjects[i]+'</a><br/>';
            }
            $("div#subjectDiv").html(str);
            $("div#selectTest").show();
            closeLoader();
        },
        error: function(xhr){

            $("div#ajaxResponse").html(xhr.responseText);
            closeLoader();
        }
    });
}

function ajax_fetch_testList(testtype,questiontype,company,subject){
    
    $.ajax({
        type:"post",
        url: SITE_URL+"/user/ajax/get-test-list",
        data: {'testType':testtype,
                'questionType':questiontype,
                'subject':subject,'company':company
            },
        cache: false,
        beforeSend: loader(),
        dataType: "json",
        success: function(data){
            str='';
            for(i=0;i<data.length;i++){
                str += '<a href="javascript:void(0);" onClick="setTest('+data[i]+')" >';
                str += 'Test '+(i+1)+'</a><br/>';
            }

            $("div#testlistDiv").html(str);            
            closeLoader();
        },
        error: function(xhr){

            $("div#ajaxResponse").html(xhr.responseText);
            closeLoader();
        }
    });
}

function loader(){ 
$('div#backgroundpopup').show();
$('div#loader').show();
}

function closeLoader(){
    $('div#backgroundpopup').hide();
    $('div#loader').hide();
}

$(document).ready(function(){

    $('#submit').click(function(){
        $('#testtype').attr('disabled',false);
        $('#questiontype').attr('disabled',false);
    });
    
    $("select#aptitudeSelect").change(function(){
        $("select#testtype").val(1);
        $("select#questiontype").val($(this).val());
        ajax_fetch_test(1,$(this).val());
    });

    $("select#technicalSelect").change(function(){
        $("select#testtype").val(2);
        $("select#questiontype").val($(this).val());
        ajax_fetch_test(2,$(this).val());
    });

    $("select#hrSelect").change(function(){
        $("select#testtype").val(3);
        $("select#questiontype").val($(this).val());
        ajax_fetch_test(3,$(this).val());
    });
});

function setTest(testid){
    test_id = testid;
    $('form#frmTest').append('<input type="hidden" value="'+testid+'" />');    
    $('#submit').click();
}