<?php
   session_start();

	include "DAO/FunctionDAO.php";
	
    $username=$_SESSION['username'];
    $id=$_POST['id'];
	$action = new FunctionDAO();
	$action -> likes_count($id,$username);

?>
