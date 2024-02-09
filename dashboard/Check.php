<?
if(isset($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];}
		else if(!isset($_SESSION['user_id'])){
			echo"<script>alert('Please Login');window.location='$site[site_name]/dashboard/index.php';</script>";exit;}
?>