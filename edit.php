<?php
session_start();
include_once('connection.php');
if(!$_SESSION['id'])
{
  header("location:index.php");
}

if (isset($_POST['submit']))
{
$name=$_POST['Name'];
$phone=$_POST['Phone'];
$email=$_POST['Email'];
$sqlQuery ="SELECT * FROM contact WHERE Name = '".$name."'";
$query = mysqli_query($conn,$sqlQuery);
$rows = mysqli_num_rows($query);
$data = mysqli_fetch_row($query);
if($rows >= 1 && $data[0] != $_SESSION['editid'])
{
$num="This name already exists in your contacts!";
echo "<script type='text/javascript'>alert('$num');</script>";
}
else
{
$sql = "UPDATE contact SET name='$name', phone='$phone', email='$email' where id='".$_SESSION['editid']."';"; 
if($conn->query($sql) == TRUE){
  $pos="Successfully Updated!";
echo "<script type='text/javascript'>alert('$pos');</script>";
}
}
// elseif ($conn->query($sql) == TRUE) 
// {
// $pos="Successfully Updated!";
// echo "<script type='text/javascript'>alert('$pos');</script>";
// } 
// else 
// {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
}

else if(isset($_GET['id']))
{
  $_SESSION['editid'] = $_GET['id'];
  $sqlQuery ="SELECT * FROM contact WHERE id = '".$_GET['id']."';";
  $query = mysqli_query($conn,$sqlQuery);
  $data = mysqli_fetch_row($query);
  $n = $data[1];
  $p = $data[2];
  $e = $data[3];
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
                
                    <input type="text" name="Name" id="name" value = "<?php echo (isset($n) ? htmlspecialchars($n) : ''); ?>" placeholder="Enter Name"required/>
                
                
                    <input type="number" name="Phone" id="phone" value = "<?php echo (isset($p) ? htmlspecialchars($p) : ''); ?>" pattern="[0-9]" placeholder="Enter Phone Number" required />
           
                
                    <input type="email" name="Email" id="email" value = "<?php echo (isset($e) ? htmlspecialchars($e) : ''); ?>"  placeholder="Enter E-Mail" required />
            
            </div>
            <div>
                <input type="submit" name="submit" class="dash" value="Update" />
            </div>
        </form>
    </div>
</form>
</body>
</html>