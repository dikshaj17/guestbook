<?php
session_start();
include_once('process.php');
// if(!$_SESSION['id']){
//   header("location:index.php");
// }
?>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script.js"></script>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
*:focus {
  outline: none;
}

body {
  margin: 0;
  padding: 0;
  background: red;
  font-size: 16px;
  color: #222;
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
}

#login-box {
  position: relative;
  margin: 5% auto;
  width: 600px;
  height: 500px;
  background: #FFF;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
}

.left {
  position: absolute;
  top: 0;
  left: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
}

h1 {
  margin: 0 0 20px 0;
  font-weight: 300;
  font-size: 28px;
}

input[type="text"],
input[type="password"] {
  display: block;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 4px;
  width: 220px;
  height: 32px;
  border: none;
  border-bottom: 1px solid #AAA;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
  font-size: 15px;
  transition: 0.2s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
  border-bottom: 2px solid #16a085;
  color: #16a085;
  transition: 0.2s ease;
}

input[type="submit"] {
  margin-top: 28px;
  width: 120px;
  height: 32px;
  background: #16a085;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  text-transform: uppercase;
  transition: 0.1s ease;
  cursor: pointer;
}

input[type="submit"]:hover,
input[type="submit"]:focus {
  opacity: 0.8;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

input[type="submit"]:active {
  opacity: 1;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

.or {
  position: absolute;
  top: 198px;
  left: 280px;
  width: 40px;
  height: 40px;
  background: #DDD;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  line-height: 40px;
  text-align: center;
}

.right {
  position: absolute;
  top: 0;
  right: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
  background: url('https://goo.gl/YbktSj');
  background-size: cover;
  background-position: center;
  border-radius: 0 2px 2px 0;
}

.right .loginwith {
  display: block;
  margin-bottom: 40px;
  font-size: 28px;
  color: #FFF;
  text-align: center;
}

button.social-signin {
  margin-bottom: 20px;
  width: 220px;
  height: 36px;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  transition: 0.2s ease;
  cursor: pointer;
}

button.social-signin:hover,
button.social-signin:focus {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin:active {
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin.facebook {
  background: #32508E;
}

button.social-signin.twitter {
  background: #55ACEE;
}

button.social-signin.google {
  background: #DD4B39;
}

.form_error span {
  width: 80%;
  height: 35px;
  margin: 3px 10%;
  font-size: 1.1em;
  color: #D83D5A;
}

.form_success span {
  width: 80%;
  height: 35px;
  margin: 3px 10%;
  font-size: 1.1em;
  color: green;
}

</style>
<script type="text/javascript">
function CheckPassword(inputtxt)  
{  
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
if(inputtxt.value.match(passw))  
{  
 $("#passe").text("Password Pattern Success!");
// return true;  
}  
else  
{  
  $("#passe").text('try another password...!');
// alert('try another password...!')  
// return false;  
}  
}
window.onload = function ()
 {
    // document.getElementById("password").onchange = validatePassword;
    document.getElementById("password2").onchange = validatePassword;
 }
function validatePassword()
 {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password2").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            // return false;
        }
        // return true;
    }

function validateMail()
{
   // console.log("validateemail");
    var x = document.forms["registration"]["email"].value;
    var dotpos = x.lastIndexOf(".");
    var atpos = x.indexOf("@");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
      $("#emailerror").text("Not a valid e-mail address");  
    }

    else
    {
      $("#emailerror").text("Valid Email");
    }
  // return true;
}

function IsEmpty() 
{
  if (document.forms['registration'].username.value === "" || username.value.length < 5) 
  {
    $("#usernamee").text("Username should be atleast 5 characters");
    // alert("Username should be atleast 5 characters");
    // return false;
  }else{
    $("#usernamee").text("");
  }

  // return true;
}

function IsEmptyf() 
{
  // console.log("shubh");
  if (document.forms['registration'].firstname.value === "" ) 
  {
    // alert("Fill your Firstname");
    $("#firstnamee").text("Fill your Firstname");
    // return false;
  }

  // return true;
}

function IsEmptyl() 
{
  if (document.forms['registration'].lastname.value === "" ) 
  {
    $("#lastnamee").text("Fill your lastname");
    // alert("Fill your lastname");
    // return false;
  }

  // return true;
}


</script>
</head>
<!-- <body onload='document.registration.password.focus()'> -->
<body>
<form name="registration" id="registration" method="post" onsubmit="validatePassword();">
<div id="login-box">
  <div class="left">
    <h1><b>Sign up</b></h1>
   
    <input type="text" name="firstname" id="firstname" placeholder="Firstname" required/>
    <span id="firstnamee"></span>
    <input type="text" name="lastname" id="lastname" placeholder="Lastname" required/>
    <span id="lastnamee"></span>
    <input type="text" name="username" id="username" onkeyup="IsEmpty();" placeholder="Username" required/>
    <span id="usernamee"></span>
    <input type="text" name="email" id="email" onkeyup ="validateMail();" placeholder="E-mail" required/>
    <span id="emailerror"></span>
    <input type="password" name="password" id="password" placeholder="Password" title="6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter" onblur="CheckPassword(document.registration.password)" required/>
    <span id="passe"></span>
    <input type="password" name="password2" id="password2" placeholder="Confirm Password" required/>
   
   <input type="submit" name="signup_submit" id="signup_submit" value="Sign me up"  />

  </div>
 
  <div class="right">
    <span class="loginwith">Sign in with<br />social network</span>
    <br>
    <button class="social-signin facebook" onclick="window.location.href = 'https://www.facebook.com/';">Log in with facebook</button>
    <button class="social-signin twitter" onclick="window.location.href = 'https://twitter.com/login';">Log in with Twitter</button>
    <button class="social-signin google" onclick="window.location.href = 'https://accounts.google.com/';">Log in with Google+</button>
  </div>
  <div class="or">OR</div>
</div>
</form>
</body>
</html>