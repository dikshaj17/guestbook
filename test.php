<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guestbook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$user=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['password'];
$sqlquery = $conn->query("select * from users where username='$user' ");
if($sqlquery->num_rows>=1){
echo "duplicate";
}
else{
 $sql = "INSERT INTO users (firstname, lastname, username, email , password)  VALUES ('$firstname','$lastname','$user','$email', '$pass')";
if ($conn->query($sql) === TRUE) {
    echo "Ok";


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//header("Location: http://localhost/guestbook/index.php"); 
}
exit();
$conn->close();
?>