<?php
	session_start();
	include 'DAO/FunctionDAO.php';
	$id=$_POST['id'];
	$action	= new FunctionDAO();
	$action ->userdelete($id);

?>