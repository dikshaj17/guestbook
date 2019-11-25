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
        <title> Filter Mail Domain </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body
 {
  background-image: url("./mail.jpg");
  background-size: cover;
  padding-top:75px;
  padding-left:30px;
 }

*{
  box-sizing: border-box;
 }


h2{
  font-size:45px;
  text-align:center;
  color:blue;
  text-shadow: 5px 5px white;
  padding-right:0.5em;
  }

th,td{
  text-align:center;
  font-family:georgia;
  font-color:white;
 }

.buttons
{
/*overflow:auto;*/
text-align: center;
font-size: 1em;
/*font-weight: bold;*/
line-height: 90%;
border-radius: 8px;
color:black;
font-family:georgia;
align-self: center;
margin-top:15px;
margin-left:20px;
margin-right:20px;
/*margin-bottom:10px;*/
background-color: lightblue;
border-color:black;
width:50%;
}
 
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>            
</head>
<body>
<div class="row">
<div class="col-4">
<table align="left" border="1px" id="result">
<tr>
<th colspan="3"><h2>Registered with gmail.com</h2></th>
</tr>
<?php
include_once('connection.php');
$sqlQuery="SELECT COUNT(*) FROM users WHERE email LIKE '%gmail.com'";
$Query = MySQLi_query($conn, $sqlQuery);
$row = MySQLi_fetch_array($Query);
echo "<tr>";
echo "<th colspan='3'>" . $row['COUNT(*)'] ." "."Users". "</th>";
echo "</tr>";
?>
<tr>
<th> ID </th>
<th> username </th>
<th> Email </th>
</tr>
<?php
include_once('connection.php');
$sql="SELECT Id, username, email FROM users WHERE email LIKE '%gmail.com'";
$Query = MySQLi_query($conn, $sql);
while ($row = MySQLi_fetch_array($Query))
 {
    
    echo "<tr>";
    echo "<td>" . $row['Id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";
  
 }
    echo "</table>"; 
?> 
</div>
<div class="col-4">
<table align="center" border="1px" id="result">
      <tr>
        <th colspan="3"><h2>Registered with yahoo.in</h2></th>
        </tr>
        
<?php
include_once('connection.php');
$sqllQuery="SELECT COUNT(*) FROM users WHERE email LIKE '%yahoo.in'";
$Queryy = MySQLi_query($conn, $sqllQuery);
$rows = MySQLi_fetch_array($Queryy);
echo "<tr>";
echo "<th colspan='3'>" . $rows['COUNT(*)'] ." "."Users". "</th>";
echo "</tr>";
?>
<tr>
<th> ID </th>
<th> username </th>
<th> Email </th>
</tr>
<?php
include_once('connection.php');
$sql="SELECT Id, username, email FROM users WHERE email LIKE '%yahoo.in'";
$Query = MySQLi_query($conn, $sql);
while ($row = MySQLi_fetch_array($Query))
 {
    
    echo "<tr>";
    echo "<td>" . $row['Id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";
  
 }
    echo "</table>"; 
?> 
</div>
<div class="col-4">
<table align="right" border="1px" id="result">
<tr>
<th colspan="3"><h2>Registered with yahoo.com</h2></th>
</tr>
<?php
include_once('connection.php');
$sqlQuery="SELECT COUNT(*) FROM users WHERE email LIKE '%yahoo.com'";
$Query = MySQLi_query($conn, $sqlQuery);
$row = MySQLi_fetch_array($Query);
echo "<tr>";
echo "<th colspan='3'>" . $row['COUNT(*)'] ." "."Users". "</th>";
echo "</tr>";
?>
<tr>
<th> ID </th>
<th> username </th>
<th> Email </th>
</tr>
<?php
include_once('connection.php');
$sql="SELECT Id, username, email FROM users WHERE email LIKE '%yahoo.com'";
$Query = MySQLi_query($conn, $sql);
while ($row = MySQLi_fetch_array($Query))
 {
    
    echo "<tr>";
    echo "<td>" . $row['Id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";
  
 }
    echo "</table>"; 
?>
</div> 
</div>
</body>
</html>