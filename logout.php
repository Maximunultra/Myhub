<?php
 session_start();    
 unset($_SESSION['Username']);
 unset($_SESSION['ID']);
 session_destroy();

 header("Location: log.php");

?>