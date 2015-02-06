$(function(){
	if($('#login_error').text()){
		$('#btnlogin').click();
	}

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