<?php
session_start();
//print_r($_SESSION);
if ( isset($_SESSION['profile_id']))
{
	$id = $_SESSION['profile_id'];


		 
		$connection =  new mysqli('localhost','root','','hms');
		$sql= "UPDATE patient_info SET status='inactive' WHERE id = '$id'";
        //echo $sql;
		$connection -> query($sql);
		//session_destroy();


		
        header('location:profile.php');
 }
else
{
    header("location:profile.php");

}








