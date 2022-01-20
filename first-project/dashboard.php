<?php 

	require "dbwork.php";
	$obj->is_logged_in();
		
?>

<!DOCTYPE html>
<html lang="en">
<?php 
	require("head.php");
?>
<body>
	<div class="wrapper">
		<!-- Navbar Header -->
		<?php require("navbar.php"); ?>
	
		<!-- Sidebar -->
		<?php require("sidebar.php"); ?>

		<?php require "dashboard_content.php"; ?>
		
	</div>
</div>

<?php require "foot_script.php"; ?>

</body>
</html>