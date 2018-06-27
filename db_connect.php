<?php
	header('Content-Type:text/html; charset=utf-8');
	$host = 'localhost';
	$username = 'root';
	$pass = '';
	$db_name = 'gk_test';
	$con = mysqli_connect($host,$username,$pass,$db_name);
	if($con){
		echo "Database Connected";
	}
	else{
		echo "Error connecting Datavase";
	}
?>