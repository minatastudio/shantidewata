<?php
if(!isset($_SESSION['loggedin']) && !isset($_SESSION['name'])){
header("Location: index.php");
exit(); }
?>
