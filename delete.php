<?php
session_start();
//print_r($_SESSION);
if ( isset($_SESSION['profile_id']))
{
	$id = $_SESSION['profile_id'];

	?>
<script>

	let val = confirm("Are you sure to Delete your account!");
		if ( val ){ 
		 
		<?php 
		 
		$connection =  new mysqli('localhost','root','','hms');
		$sql= "DELETE FROM patient_info WHERE id = '$id'";
		$connection -> query($sql);
		//session_destroy();

		?>
		
		<?php  header('location:login.php');?>

		}
		else {
			//alert('hoi nai');
			<?php  header('location:profile.php');?>
		}

</script>
<?php
session_destroy();
}
else
{
	header('location:login.php');
}





?>