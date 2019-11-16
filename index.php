<?php
include_once('connection.php');
if (isset($_POST['submit'])) {
$user =$_POST['username'];
$pass =$_POST['password'];
$sqlQuery ="SELECT * FROM users WHERE username = '".$user."' AND password = '".$pass."'";
$query = mysqli_query($conn,$sqlQuery);
$rows = mysqli_num_rows($query);
$data = mysqli_fetch_array($query,MYSQLI_ASSOC);

if($rows == 1) {
// if($_POST['remember']=='on'){
// }
header("location:dashboard.php");
}
else{
$mes="Invalid User";
echo "<script type='text/javascript'>alert('$mes');</script>";
}
}

?>

<html> 
<head> 
<title>Login Form</title> 
<link rel="stylesheet" href="style.css">
</head> 
<body> 
<form method="POST" action="" class="form1">

<!-- <?php if(isset($_REQUEST['error'])){
echo '<span style="color:red"> <b>Please enter correct details</b></span>';
}
?> -->
<table border="0" align="center">
<thead>  
<h1 class="login" align="center">Welcome To Login Page</h1>
</thead>
<tr>
<td align="center">
<input type="text" class="un " name="username" id="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; }?>" placeholder="Enter your user name"/>
</td>
</tr>
<tr>
<td align="center">
<input type="Password" class="pass" name="password" id="password" value="<?php if(isset($_COOKIE["password"])) { echo base64_decode($_COOKIE["password"]); }?>" placeholder="Enter your Password"/>
</td>
</tr>
<tr>
<td align="center">
<input type="submit" class="submit" name="submit" id="btn" value="LOGIN" />
</td>
</tr>
<tr>
<td>
<p class="forgot"><a href="forgot.php">Forgot Password?</p>
</td>
<td>
<p class="sign" align="right"><a href="registration.php">Sign Up </p>
</td>
</tr>
</table>
</form>
</body>
</html>
