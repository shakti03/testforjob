$(function(){
	$(".various").fancybox();
	$('#videoType').change(function(){
		var rex = new RegExp($(this).val(),'gi');
		$('.videoFile').hide();
		$('.videoFile').filter(function(){
			return rex.test($(this).data('filter'));
		}).show();
	});

	$('.modal').on('hidden.bs.modal', function(){
	$(this).find('form')[0].reset();
	});

	$('[name="video_category_id"]').change(function(){
	  var typeValue = $(this).val();

	  if(typeValue == 'others'){
	    $('input[name="other_type"]').attr('required',true);
	    $('input[name="other_type"]').show();
	  }else{
	    $('input[name="other_type"]').attr('required', false);
	    $('input[name="other_type"]').hide();
	  }
	});
});
