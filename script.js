$('document').ready(function(){
 var username_state = false;
 var email_state = false;

 $('#username').on('blur', function(){

  var username = $('#username').val();
  // console.log(username);
  if (username == '') {
  	username_state = false;
  	return;
  }
  $.ajax({
    url: 'process.php',
    type: 'post',
    data: {
    	'username_check' : 1,
    	'username' : username,
    },
    success: function(response){
      if (response == 'taken' ) {
        // console.log(response);
      	username_state = false;
      	$('#username').parent().removeClass();
      	$('#username').parent().addClass("form_error");
      	$('#username').siblings("span").text('Sorry... Username already taken');
      }else if (response == 'not_taken') {
      	username_state = true;
      	$('#username').parent().removeClass();
      	$('#username').parent().addClass("form_success");
      	$('#username').siblings("span").text('Username available');
      }
    }
  });
 });		
  $('#email').on('blur', function(){
 	var email = $('#email').val();
 	if (email == '') {
 		email_state = false;
 		return;
 	}
 	$.ajax({
      url: 'process.php',
      type: 'post',
      data: {
      	'email_check' : 1,
      	'email' : email,
      },
      success: function(response){
      	if (response == 'taken' ) {
          email_state = false;
          // $('#email').parent().removeClass();
          // $('#email').parent().addClass("form_error");
          $('#email').siblings("span").text('Sorry... Email already taken');
      	}else if (response == 'not_taken') {
      	  email_state = true;
      	  // $('#email').parent().removeClass();
      	  // $('#email').parent().addClass("form_success");
      	  $('#email').siblings("span").text('Email available');
      	}
      }
 	});
 });

 $('#signup_submit').on('click', function(){
 	var firstname = $('#firstname').val();
 	var lastname = $('#lastname').val();
 	var username = $('#username').val();
  var email = $('#email').val();
  var password = $('#password').val();
  
 	if (username_state == false || email_state == false ) {
	  // $('#login-box').text('Fix the errors in the form first');
    alert('user denied');
	}
  
  else{
      // proceed with form submission
      $.ajax({
      	url: 'process.php',
      	type: 'post',
      	data: {
      		'save' : 1,
          'firstname' : firstname,
          'lastname' : lastname,
      		'username' : username,
          'email' : email,
      		'password' : password,
      	},
      	success: function(response){
      		alert('user saved');
          $('#firstname').val('');
          $('#lastname').val('');
      		$('#username').val('');
      		$('#email').val('');
      		$('#password').val('');
      	}
      });
 	}
 });
});