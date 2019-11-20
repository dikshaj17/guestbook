<?php
session_start();
echo '<a href="logout.php"> Logout </a> ' ;
session_destroy();
?>


<!DOCTYPE html>
<html>
<head>
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Georgia;
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
  <h2 class="dash">Welcome To Dashboard!</h2>
  <p align ="center">You have been successfully logged in..</p>
</div>
</body>
</html>
