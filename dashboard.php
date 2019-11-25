<?php
session_start();
include_once('connection.php');
if(!$_SESSION['id']){
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Georgia;
  background-image: url("./book3.jpg");
}

p{
  font-size:25px;
}
.dash{
  font-size: 40px;
  text-align:center;
  }

.topnav {
  overflow: hidden;
  background-color: Yellow;
}

.topnav a {
  //float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 15px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

a{
	font-size:25px;
	font-family:georgia;
	font-weight:bold;
	/*font-color:black;*/
	/*background-color:yellow;*/
	margin-bottom:20px;
	align-self: right;
	text-align: right;
}


.submit {
         cursor: pointer;
         border-radius: 5em;
         color: #fff;
         background: linear-gradient(to right, #9C27B0, #E040FB);
         border: 0;
         padding-left: 25px;
         padding-right: 20px;
         padding-bottom: 10px;
         padding-top: 10px;
         font-family: 'Ubuntu', georgia;
         margin-left: 25%;
         font-size: 13px;
         box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
         letter-spacing: 1px;
         text-align: center;
         margin-left: 48%;
         margin-right: 50%
        }

.log{
  padding-top: 10px;
  /*background-color: #8B008B;*/
  padding-bottom: 10px;
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="add.php">Add Contacts</a>
  <a href="view.php">View Contacts</a>
  <!-- <a href="logout.php">Logout</a> -->

</div>

<div style="padding-left:16px">
  <h2 class="dash"><b> <I>Welcome To Dashboard!</I></b></h2>
  <p align ="center">You have been successfully logged in..</p>
</div>
<br><br>
<a href="logout.php"><input type="submit" class="submit" name="submit" id="btn" value="Logout" /></a>

</body>
</html>