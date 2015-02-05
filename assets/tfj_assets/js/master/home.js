// JavaScript Document
isFbinit = false;

jQuery(function($) {

$('#backgroundpopup').click(function(){
    //$('#loginwindow').css('display','none');
    $('#loginwindow').hide();
    $('div#quickSignUpWindow').hide();
    $('#registerwindow').css('display','none');
    $('#backgroundpopup').fadeOut(0001);
});

$("span#quickSignUp").click(function(){
    $('#backgroundpopup').fadeIn(0001);
    $('#loginwindow').hide();
    $('div#quickSignUpWindow').show(); 
});

// Display pop up for login button
$('span#login').click(function(){
   $('div#quickSignUpWindow').hide();         
   $('#backgroundpopup').fadeIn(0001);
   $('#loginwindow').show();
});

//Display pop up for sign up
$('span#register').click(function(){
    $('#backgroundpopup').fadeIn(0001);
   $('#registerwindow').css('display','block');
});

// Login Function details
$('input#login').click(function(){
    var username = $('#username').val();
    var password = $('#password').val();
    var loggedin = $('#loggedin').val();
    
    msg = '<center> Loading... </center>';
    $('span#status_text').html(msg)
    $('div#status_window').show();
   
    $.ajax({
        url:SITE_URL+"/ajax/login",
        type:"POST",        
        cache:false,
        
        //dataType:"json",
        data:{"username":username, "password":password},
        success:function(result){
        //    alert(result);
            if(result === 'success'){
                window.location = SITE_URL+'/index/';
            }
            else{
                $('#login_error').html(result);
                //alert(result);
            }
        },
        error:function(xhr,status,err) {
            alert(xhr.responseText);
        }
    });

});

// Sign up function details
$('input#register').click(function(){
   var username = $('#reg_email').val();
   var password = $('#reg_password').val();
   var repassword = $('#reg_repassword').val();
   
   $.ajax({
       url : SITE_URL+"/ajax/register",
       type:"POST",
       cache:false,
       data:{"username":username, "password":password, "repassword":repassword},
       success:function(result) {
        alert(result);exit;
        if(result == 'success') {            
            window.location = SITE_URL+'/index/';
        }
       },
       error:function(xhr,status,err) {
            alert(xhr.responseText);
       }
   });
});

$('input#quick_register').click(function(){
   $('#quick_signup_error').html('');   
   email = $('input#quick_reg_email').val();
//   alert(email);
   if(!email){
      $('#quick_signup_error').html('Please enter your email id.');
      return false;
   }
   else{
       if(!RegExp("^([a-zA-Z0-9_\\.\\-])+\\@(([a-zA-Z0-9\\-])+\\.)+([a-zA-Z]{2,4})+$").exec(email))
        {
            $('#quick_signup_error').html('Please enter a valid Email Id');
            return false;
        }
   }
   password1 = $('input#quick_reg_password').val();
   if(!password1){
      $('#quick_signup_error').html('Please enter password.'); 
      return false;
   }
   password2 = $('input#quick_reg_confirm_password').val();
   if(!password2){
      $('#quick_signup_error').html('Please enter confirm password.'); 
      return false;
   }

    if(password1 != password2){
       $('#quick_signup_error').html('Password not matched');
       return false;
   }

   $.ajax({
        url:SITE_URL+"/ajax/quick-register",
        type:"POST",        
        cache:false,
        //dataType:"json",
        async: false,
        data:{"email":email,"password":password1},
        beforeSend: function(){
            msg = '<center> Please Wait... </center>';
                $('span#status_text').html(msg)
                $('div#status_window').show();
                $('#quick_signup_error').html('');
            },
        success:function(result){
            if(result == 'success'){
                msg = 'A Verification link is sent to your mail address. Please Check your mail and follow the link to complete the sign up process.';
                $('span#status_text').html(msg)
                $('div#status_window').show();
                window.location = SITE_URL+'/index/';
            }
            else{
                alert(result);
            }
        },
        error: function(xhr,status,err) {
            alert(xhr.responseText);
//                var err = eval("("+xhr.responseText+")");
//                alert(err.Message);
            },
        complete: function(){
            $('span#status_text').html('');
            $('div#status_window').hide();
        }    
    });
   
//   setTimeout(function(){
//       $('span#status_text').html(msg)
//       $('div#status_window').hide();
//   },10000);

});

});

//<!-- Facebook Login Code Starts -->
function FBLogout(){
	FB.logout(function(response) {
		window.location.href = SITE_URL+"/index.php";
	});
}

function FBLogin(){
        //check fb is initialized or not. if initialized then no need to callinit method
        if(!isFbinit){

        // facebook code
            window.fbAsyncInit = function() {
                        FB.init({
                        appId      : '264293620434673', // replace your app id here
                        channelUrl : '',
                        status     : true,
                        cookie     : true,
                        xfbml      : true
                        });
                };

            (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=264293620434673";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        // end facebook code
            isFbinit = true;
        }
        FB.login(function(response){
		if(response.authResponse){
                    console.log('hi');
			window.location.href = SITE_URL+"/index/actionfb?action=fblogin";
		}
	}, {scope: 'email,user_likes'});
}
//<!-- Facebook Login Code Ends -->

