<?php require_once 'header.php'; ?>
<?php 
	require_once("db_connect.php");
    $ID = $_GET['ID'];
    $query = " select * from videos where vid='".$ID."'";
    $result = mysqli_query($connect,$query);

	if($result->num_rows == 1) {		
		while($row=mysqli_fetch_assoc($result))
		{
			$ID = $row['vid'];
			$Name = $row['name'];
			$Date = $row['date'];
			$URL = $row['url'];
		}
	}
	else {		
		echo "<script type='text/javascript'>alert('Video ID does not exists! Please insert correctly.');
			window.location='videoList.php';
			</script>";			
	}
?>
<html>
<head>
	<title>View Video Record</title>
</head>
<body>
<!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">
			<span class="spinner-rotate"></span>
        </div>
    </section>
	
	<section id="product">
        <div class="container">
			<div class="section-title">
				<h2>View Video Record</h2>
			</div>
	
			<br>

			<video src="<?php echo $URL; ?>" width="100%" 
				height="100%" controls> 
            </video>

			<br><br>
			<div class="row">
				<div class="form-group row">
					<div class="col-md-4 col-md-offset-5">
						<div class="col-sm-3">							
							<button class="btn btn-primary" onClick="window.location.href='videoHistory.php';">Back</button>
						</div>
						
					</div>
				</div>
			</div>
        </div><!-- container -->	
    </section>  
	
	<!-- SCRIPTS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>