<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
p{
	text-align:center;
	font-weight:bold;
	font-size:20px;
}


td{
  text-align:center;
  font-family:georgia;
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
</head>
<body>
<table align="center" border="1px" style="width:600px; line-height:40px;" id="result">
        <tr>
            <th colspan="4"><h2>All Contacts</h2></th>
        </tr>
        <tr>
        	<th> ID </th>
            <th> Name </th>
            <th> Phone </th>
            <th> Email </th>
            
        </tr>



<?php 
session_start();
include_once('connection.php');
if(isset($_POST['search'])){
	
	$sql="Select ID, name, phone, email from contact where ID like '%".$_POST['search']."%' or name like '%".$_POST['search']."%' or phone like '%".$_POST['search']."%' or email like '%".$_POST['search']."%'";
	$result = mysqli_query($conn, $sql);

$found=mysqli_num_rows($result);
 
 if($found>0)
 {
 	// echo "<table>";
 	while($row=mysqli_fetch_array($result))
 	{
 	
   	echo "<tr>";
   	echo "<td>" . $row['ID'] . "</td>";
  	echo "<td>" . $row['name'] . "</td>";
  	echo "<td>" . $row['phone'] . "</td>";
  	echo "<td>" . $row['email'] . "</td>";
  	echo "</tr>";
    } 
    echo"</table>";  
 }
 else
 {
 	echo "<p> No Match Found!!!! </p>";
 }
}
 // ajax search
?>
</body>
</html>
