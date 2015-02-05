$(function(){
	activeTestType = null;
	$('.testType').change(function(){
		testType = $(this).data('id');
		activeTestType = testType;
		questionType = $(this).val();
		$('#loader').show();
		if(questionType){
			$.ajax({
				url: BASE_URL+'/get-test-contents/'+testType+"/"+questionType,
				success: function(response){
					if(response){
						response = JSON.parse(response);
						$.each(response,function(k,v){
							if(v){
								$('[data-id='+k+"]").html(null);
								i=0;
								$.each(v,function(k2,v2){
									if(i < 10){ 
										$('[data-id='+k+"]").append("<tr><td><a href='javascript:void(0);' onClick='getTests(\""+k+"\","+k2+",\""+v2+"\")'>"+v2+"</a></td></tr>");
									}
									else{
										$('[data-id='+k+"]").append("<tr class='hide'><td><a href='javascript:void(0);' onClick='getTests(\""+k+"\","+k2+",\""+v2+"\")'>"+v2+"</a></td></tr>");
									}
									i++;
								});
								if(i>10){
									$('[data-id='+k+"]").append("<tr><td><a class='pull-right' href='javascript:void(0)'>View all</a></td></tr>");
								}
							}
							else{
								$('[data-id='+k+"]").html(null);
								$('[data-id='+k+"]").append('<tr><td>no records found</td></tr>');
							}	
						});
					}
					//console.log(response);
					$('#loader').hide();
				}
			});
		}
	});

});

function getTests(testOption,optionId,option){
	
	$('#loader').show();
	$.ajax({
		url: BASE_URL+"/get-tests/"+testOption+"/"+optionId+"/"+activeTestType,
		success: function(response){
			if(response){
				response = JSON.parse(response);
				i=1;
				$('#tests').html(null)
				$.each(response,function(k,v){
					link = BASE_URL+"/start-test/"+v;
					testName = option+" test";
					$('#tests').append("<tr><td><a href='"+link+"'>"+testName+(i++)+"</a></td></tr>");
				});
			}
			$('#loader').hide();
		}
	});
	$('#loader').hide();
	$('#showTests').click();
}