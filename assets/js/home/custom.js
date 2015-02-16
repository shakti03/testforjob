$(function(){
	if($('#login_error').text()){
		$('#btnlogin').click();
	}

	$('#reminderForm').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$('#recoverSubmit').text('please wait...');
		$.post($(this).attr('action'), data, function(result){
			var result = JSON.parse(result);
			$('#reminderFormMsg').find('.msg').text(result.mail);
			$('#reminderFormMsg').show();
			$('#recoverSubmit').text('Recover');
		});

	});

	$('#recoverSubmit').click(function(){
		
	});


	$('#btnlogin').click(function(){
		$('#login_error').hide();
		
	});

	$('.err_msg').each(function(){
		if($(this).text()){
			$('#btnSignup').click();		
		}
	});

	$('#signupLogin').click(function(){
		$('#signup').find('.close').click();
	});

	$('#btnforget').click(function(){
		$('#login').find('.close').click();
	});

	$('#loginSignup').click(function(){
		$('#login').find('.close').click();
	});

	$('#backToLogin').click(function(){
		$('#forgetpassword').find('.close').click();
	});

	$('#loginSignup').click(function(){
		$('#login').find('.close').click();
	});

});