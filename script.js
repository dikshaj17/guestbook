$('document').ready(function(){
 var username_state = false;
 var email_state = false;

 $('#username').on('blur', function(){

  var username = $('#username').val();
  // console.log(username);
  if (username == '') {
    $('#usernamee').text('Username should not be empty');
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
        username_state = false;
      	$('#usernamee').text('Sorry... Username already taken');
      }
      else if (response == 'not_taken') {
      	username_state = true;
      	$('#usernamee').text('Username available');
      }
    }
  });
 });		

  $('#email').on('blur', function(){
 	var email = $('#email').val();
 	if (email == '' ){
  $('#emailerror').text('Email should not be empty');
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
          $('#emailerror').text('Sorry... Email already taken');
        }
        else if (response == 'not_taken') {
          email_state = true;
          $('#emailerror').text('Email available');
         }
      }
  });
});


 $('#signup_submit').on('click', function(){
  // e.preventDefault();
 	var firstname = $('#firstname').val();
 	var lastname = $('#lastname').val();
 	var username = $('#username').val();
  var email = $('#email').val();
  var password = $('#password').val();
  
 	if (username_state == false || email_state == false ) {
	  // $('#login-box').text('Fix the errors in the form first');
    alert('user denied');
    return;
	}

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
        dataType: 'text',
      	success: function(response){
          if (response == 'Saved!' ){
      		alert('Saved!');
        }
          $('#firstname').val('');
          $('#lastname').val('');
      		$('#username').val('');
      		$('#email').val('');
      		$('#password').val('');
      	}
      });
  });
});