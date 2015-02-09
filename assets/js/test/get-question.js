$(function(){
	$(".modal-wide").on("show.bs.modal", function() {
	  var height = $(window).height() - 200;
	  $(this).find(".modal-body").css("max-height", height);
	});

	$('#study').click(function(){
		qid= $('input[name=qid]').val();
		solution = $('#solutionImg').attr('src');
		if(!solution){
			$.ajax({
				url: BASE_URL+'/get-solution/'+qid,
				dataType: 'json',
				success: function(response){
					$('#solutionImg').attr('src',response.srcImg);
					$('#btnShowSolution').click();
				},
				error: function(response,xhr){
					console.log(response);
				}
			});
		}
		else{
			$('#btnShowSolution').click();
		}
	});
	
	// $(window).onunload(function(){
	//   alert("Goodbye!");
	// }); 
});
