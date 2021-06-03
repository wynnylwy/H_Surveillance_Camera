<?php 
	require_once 'core.php'; 
?>

<?php 
	if($_SESSION['package']=='1'){
		echo "<script type='text/javascript'>
			window.location='showLiveCam.php';
			</script>";	
	}
	if($_SESSION['package']=='2'){
		echo "<script type='text/javascript'>
			window.location='showLiveCam2.php';
			</script>";	
	}
	
?>