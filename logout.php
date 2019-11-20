<?php
 session_start();
 // setcookie(session_id(),time()-1);
 session_destroy();
 header("location:index.php");
 
?>