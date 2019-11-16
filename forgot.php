<?php
include_once('connection.php');
if (isset($_POST['forgot-password'])) {
$email =$_POST['email'];
$sqlQuery ="SELECT password FROM users WHERE email = '".$email."'";
$query = mysqli_query($conn,$sqlQuery);
$rows = mysqli_num_rows($query);
$data = mysqli_fetch_array($query,MYSQLI_ASSOC);

if($rows == 1)
{
$em="Your Password is"." ".$data['password'];	
echo "<script type='text/javascript'>alert('$em');</script>";
}
else
{
$message="email does not exists";
echo "<script type='text/javascript'>alert('$message');</script>";
}

}

?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Forgot Password</title>
	<style>
    
    body {
	background: #3b5998;
	font-size: 1.1em;
	font-family: sans-serif;
}

form {
	width: 35%;
	margin: 70px auto;
	background: white;
	padding: 20px;
	border-radius: 8px;
}
h2.form-title {
	text-align: center;
    padding-top:1px;
    padding-bottom:5px;
  
}
input {
	display: block;
	box-sizing: border-box;
	width: 100%;
	padding: 8px;
}
form .form-group {
	margin: 10px auto;    
    font-weight:bold;
    
}
form button {
	width: 100%;
	border: none;
	color: white;
	background: #3b5998;
	padding: 15px;
	border-radius: 5px;
}
.msg {
	margin: 5px auto;
	border-radius: 5px;
	border: 1px solid red;
	background: pink;
	text-align: center;
	color: brown;
	padding: 10px;
}

</style>
<script>
function validateMail()
{
   
    var x = document.forms["forgot"]["email"].value;
    var dotpos = x.lastIndexOf(".");
    var atpos = x.indexOf("@");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
        alert("Not a valid e-mail address");
        return false;
       
    }
  return true;
}
</script>
</head>
<body>
	<form class="login-form" name="forgot" action="" method="post">
		<h2 class="form-title">Forgot Password?</h2>
		<!-- form validation messages -->
		
		<div class="form-group">
			<label>Enter Your E-mail: </label>
			<input type="email" name="email" >
		</div>
		<div class="form-group">
			<button type="submit" name="forgot-password" class="login-btn" onclick="validateMail();">Submit</button>
		</div>
	</form>
</body>
</html>