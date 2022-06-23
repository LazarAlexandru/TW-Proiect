<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'car';

$con = mysqli_connect($host,$user,$password,$db);

if(mysqli_connect_error()){
    exit('Error connecting to the database' . mysqli_connect_error());
}

if (isset($_POST['username'])){
	$username=$_POST['username'];
	$password=$_POST['password'];

	$stmt="select * from "
}