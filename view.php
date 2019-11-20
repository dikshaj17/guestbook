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
        <script type="text/javascript">
            $(document).ready(function(){
                 
                    $('#search').keyup(function(e) {
                  	$("#result").find("tr:gt(0)").remove();
                  	 var title=$("#search").val();
 
                      if(title!=""){
                        // $("#result").html("<img alt="ajax search" src=''/>");
                         $.ajax({
                            type:"post",
                            url:"search.php",
                            data:"search="+title,
                            success:function(data){
                                $("#result").html(data);
                                //$("#search").val("");
                             }
                          });
                      }else{
                      	$.ajax({
                            type:"post",
                            url:"search.php",
                            data:"search="+'%',
                            success:function(data){
                                $("#result").html(data);
                                //$("#search").val("");
                             }
                          });
                      }
                      
                  });
            });

$(document).on('click', 'button.buttons', function () {
     $(this).closest('tr').remove();
     return false;
 });

</script>
</head>
<body>
<form class="example" method="post" action="">
<input type="text" id="search" placeholder="Search.." name="search">
<button type="submit" id="button"><i class="fa fa-search"></i></button>
</form><br>
    
    <table align="center" border="1px" style="width:600px; line-height:40px;" id="result">
        <tr>
            <th colspan="6"><h2>My Contacts</h2></th>
        </tr>
        <tr>
        	<th> ID </th>
            <th> Name </th>
            <th> Phone </th>
            <th> Email </th>
            <th colspan="2"> Action </th>
        </tr>


<?php
session_start();
include_once('connection.php');
$sql="select ID, name, phone, email from contact";
$Query = MySQLi_query($conn, $sql);

while ($row = MySQLi_fetch_array($Query))
 {
    
  	echo "<tr>";
  	echo "<td>" . $row['ID'] . "</td>";
  	echo "<td>" . $row['name'] . "</td>";
  	echo "<td>" . $row['phone'] . "</td>";
  	echo "<td>" . $row['email'] . "</td>";
  	echo '<td><a href="edit.php?action=edit&id='.$row['ID'].'" class="buttons">Edit</a></td>';
  	echo '<td><button type="button" class="buttons" name="delete"> Delete </button> </td>';
    //echo '<td><button type="button" class="buttons" name="delete"> Delete </button> </td>';
  	echo "</tr>";
  
 }
  	echo "</table>"; 

?> 

</body>
</html>