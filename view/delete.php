<?php
require_once '../controller/userC.php';
$user=new userC();
$user->deleteUser($_GET["name"]);
header("Location:test.php");
?>