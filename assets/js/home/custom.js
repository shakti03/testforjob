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
	
	$('.social-icons-fb').hover(
		function(){
		this.src = 'assets/images/icon_fb_bw.png';
		//$(this.src ).animate({top: '-=100px'}, 2000);
		},
		function(){
		this.src = 'assets/images/icon_fb.png';
		//$(this.src).animate({top: '+=100px'}, 2000);
	});
	
	$('.social-icons-twitter').hover(
		function(){
		this.src = 'assets/images/icon_twitter_bw.png';
		},
		function(){
		this.src = 'assets/images/icon_twitter.png';
	});
	
	$('.social-icons-google').hover(
		function(){
		this.src = 'assets/images/icon_googleplus_bw.png';
		},
		function(){
		this.src = 'assets/images/icon_googleplus.png';
	});
	
	$('.social-icons-linkedin').hover(
		function(){
		this.src = 'assets/images/icon_linkedin_bw.png';
		},
		function(){
		this.src = 'assets/images/icon_linkedin.png';
	});

});