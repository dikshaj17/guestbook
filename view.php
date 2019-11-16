<?php 
include_once('connection.php');
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title> View Contacts </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body
 {
  background-image: url("./img2.jpg");
  padding-top:75px;
  padding-left:30px;
 }

*{
  box-sizing: border-box;
 }

form.example input[type=text]
 {
  padding: 10px;
  font-size: 17px;
  font-family:georgia;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
 }

form.example button
 {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
 }

form.example button:hover
 {
  background: #0b7dda;
 }
form.example::after
 {
  content: "";
  clear: both;
  display: table;
 }
h2{
  font-size:45px;
  text-align:center;
  color:White;
  text-shadow: 5px 5px blue;
  padding-right:0.5em;
  }

td{
  text-align:center;
  font-family:georgia;
 }
 
</style>
</head>
<body>
<form class="example" method="post">
<input type="text" placeholder="Search.." name="search">
<button type="submit"><i class="fa fa-search"></i></button>
</form><br>
    <table align="center" border="1px" style="width:600px; line-height:40px;">
        <tr>
            <th colspan="3"><h2>My Contacts</h2></th>
        </tr>
        <tr>
            <th> Name </th>
            <th> Phone </th>
            <th> Email </th>
        </tr>

<?php
if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
}

$sql="select name, phone, email from contact";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
		
 While($rows = $result->fetch_assoc())
  {
      
  	echo "<tr>";
  	echo "<td>" . $rows['name'] . "</td>";
  	echo "<td>" . $rows['phone'] . "</td>";
  	echo "<td>" . $rows['email'] . "</td>";
  	echo "</tr>";
  }
  	echo "</table>";
}
?>

</body>
</html>
