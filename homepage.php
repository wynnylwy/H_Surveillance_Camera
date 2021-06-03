<?php 
	require_once 'core.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Homepage</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<?php 
	if($_SESSION['position']=='manager'){
		require_once 'homeManager.php'; 
	}
	if($_SESSION['position']=='staff'){
		require_once 'homeStaff.php'; 
	}
?>