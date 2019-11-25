<?php
session_start();
include_once('connection.php');
if(!$_SESSION['id']){
  header("location:index.php");
}
if (isset($_POST['submit'])) {
$name=$_POST['Name'];
$phone=$_POST['Phone'];
$email=$_POST['Email'];
$sqlQuery ="SELECT * FROM contact WHERE Name = '".$name."'";
$query = mysqli_query($conn,$sqlQuery);
$rows = mysqli_num_rows($query);
$data = mysqli_fetch_array($query,MYSQLI_ASSOC);
if($rows >= 1)
{
$num="This name already exists in your contacts!";
echo "<script type='text/javascript'>alert('$num');</script>";
}
else{
$sql = "INSERT INTO contact (Name, Phone, Email)  VALUES ('$name','$phone', '$email')"; 
// $sql = "INSERT INTO contact (Name, Phone, Email, userid)  VALUES ('$name','$phone', '$email','".$_SESSION['id']."')"; 
if ($conn->query($sql) == TRUE) 
{
    $pos="Successfully Added!";
echo "<script type='text/javascript'>alert('$pos');</script>";

} 
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
?>

<html>
<head>
<style>

body{
  font-family:georgia;
  font-size:15px;
  background-image: url("./img1.jpg");
  padding-top:75px;
  padding-left:30px;
	}

h1{
  font-size:45px;
  text-align:center;
  color:White;
  text-shadow: 5px 5px blue;
  }

.dash{
  font-size:15px;
  text-align:center;
  font-family:georgia;
  font-weight:bold;
  }

.panel{
  padding-top:2em;
  padding-bottom:2em;
  width:92.5%;
  margin:auto;
  max-width:40em;
}

input{
  width:100%;
  font-family:georgia;
  box-sizing:border-box;
  font-size:1em;
  margin-top:0.5em;
  padding:0.5em;
  border: 1.5px solid;
  box-shadow: 5px 10px pink;
}

</style>
<script>
// function phonenumber(inputtxt)  
// {  
// // var p = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
// var p = //
// if(inputtxt.value.match(p))  
// {  
// return true;  
// }  
// else  
// {  
// alert('Invalid Number!')  
// return false;  
// }  
// }
</script>
</head>
<body>
	<form name="addform" id="addform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <div id="contact-panel" class="panel">
        <form id="contact" name="contact" action="#">
            <h1>Edit Contacts</h1>
            <div>
                
                    <input type="text" name="Name" id="name" placeholder="Enter Name"required/>
                
                
                    <input type="number" name="Phone" id="phone" pattern="[0-9]" placeholder="Enter Phone Number" required />
           
                
                    <input type="email" name="Email" id="email"  placeholder="Enter E-Mail" required />
            
            </div>
            <div>
                <input type="submit" name="submit" class="dash" value="Update" />
            </div>
        </form>
    </div>
</form>
</body>
</html>