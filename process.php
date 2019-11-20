<?php
include_once('connection.php');
if (isset($_POST['username_check'])) {
  	$user = $_POST['username'];
  	$sql = "SELECT * FROM users WHERE username='$user'";
  	$results = mysqli_query($conn, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "taken";	
  	}else{
  	  echo 'not_taken';
  	}
  	exit();
  }

if (isset($_POST['email_check'])) {
  	$email = $_POST['email'];
  	$sql = "SELECT * FROM users WHERE email='$email'";
  	$results = mysqli_query($conn, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "taken";	
  	}else{
  	  echo 'not_taken';
  	}
  	exit();
  }

if (isset($_POST['save'])) {
  	$firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $user=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
  	$sql = "SELECT * FROM users WHERE username='$user' or email = '$email'" ;
  	$results = mysqli_query($conn, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "exists";	
  	  exit();
  	}
    
  	else{
  	  $query = "INSERT INTO users (firstname, lastname, username, email , password)  VALUES ('$firstname','$lastname','$user','$email', '$pass')";
  	  $results = mysqli_query($conn, $query);
  	  echo 'Saved!';
  	  exit();
  	}
  }
?>

