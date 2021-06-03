<?php require_once 'header.php'; ?>
<?php 
	require_once("db_connect.php");
    $AccessoriesID = $_GET['AccessoriesID'];
    $query = " select * from products where pid='".$AccessoriesID."'";
    $result = mysqli_query($connect,$query);

	if($result->num_rows == 1) {		
		while($row=mysqli_fetch_assoc($result))
		{
			$AccessoriesID = $row['pid'];
			$ProductName = $row['productName'];
			$Type = $row['type'];
			$Quantity = $row['quantity'];
			$Price = $row['price'];
			$Image = $row['IMG'];
		}
	}
	else {		
		echo "<script type='text/javascript'>alert('Accessories ID does not exists! Please insert correctly.');
			window.location='searchProduct.php';
			</script>";			
	}
?>
<html>
<head>
	<title>View Accessories</title>
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
				<h2>View CCTV and Security Camera Accessories Details</h2>
			</div>
			<br>
			<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="panel panel-info">
							<div class="panel-body">					  
								<div class="form-group row">
									<label for="productName" class="col-sm-4 col-form-label">Name: </label>
									<div class="col-sm-10">
										<?php echo $ProductName ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="type" class="col-sm-4 col-form-label">Type: </label>
									<div class="col-sm-10" class="form-control">
										<?php echo $Type ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="quantity" class="col-sm-4 col-form-label">Quantity: </label>
									<div class="col-sm-10" class="form-control">
										<?php echo $Quantity ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="price" class="col-sm-4 col-form-label">Price (RM) per item</label>
									<div class="col-sm-10" class="form-control">
										<?php echo $Price ?>
									</div>
								</div>		
							</div>
						</div>
				</div>
				
				<div class="col-md-6 col-sm-12">
					<div class="form-group row">
						<div class="col-sm-10">
							<img style="max-height: 300px;max-width: 300px;"id="imagePrev" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($Image); ?>" />  <br><br>
						</div>
					</div>						
				</div>
			</div><!-- /row -->
			<div class="col-md-6 col-sm-12">
				<br>
				<button class="btn btn-primary" onClick="window.location.href='searchProduct.php';">Back</button>
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