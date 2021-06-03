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
	<title>Edit Accessories</title>
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
				<h2>Edit CCTV and Security Camera Accessories Details</h2>
			</div>
			<br>
			<div class="row">
				<form class="form-horizontal" action="updateproduct.php?ID=<?php echo $AccessoriesID ?>" method="POST" enctype="multipart/form-data">
					<div class="col-md-6 col-sm-12">
						<div class="panel panel-info">
							<div class="panel-body">
								<div class="form-group row">
									<label for="accImage" class="col-sm-4 col-form-label">Image: </label>
									<div class="col-sm-10">
										<img style="max-height: 200px;max-width: 200px;"id="imagePrev" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($Image); ?>" />  <br><br>
										<input type="file" id="img" name="img" onchange="document.getElementById('imagePrev').src = window.URL.createObjectURL(this.files[0])" required>
									</div>
                              	</div>						  
								<div class="form-group row">
									<label for="productName" class="col-sm-4 col-form-label">Name: </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="productName" placeholder=" Enter Accessories Name " name="productName" value="<?php echo $ProductName ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="type" class="col-sm-4 col-form-label">Type: </label>
									<div class="col-sm-10">
										<select name="type" class="form-control">
											<option value="Network Cable" >Network Cable</option>
											<option value="Power Supplies/POE" >Power Supplies/POE</option>
											<option value="CCTV Video Multiplexers" >CCTV Video Multiplexers</option>
											<option value="CCTV Monitors" >CCTV Monitors</option>
											<option value="Security Camera Lens" >Security Camera Lens</option>
											<option value="Security Camera Enclosures" >Security Camera Enclosures</option>
											<option value="Video Baluns" >Video Baluns</option>
											<option value="Wireless Video Transmitters" >Wireless Video Transmitters</option>
											<option value="Camera Microphone" >Camera Microphone</option>
											<option value="Infrared Illuminators" >Infrared Illuminators</option>
											<option value="Security Stickers" >Security Stickers</option>
											<option value="Others" >Others</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="quantity" class="col-sm-4 col-form-label">Quantity: </label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="quantity" placeholder=" Enter Quantity " name="quantity" value="<?php echo $Quantity ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="price" class="col-sm-4 col-form-label">Price (RM) per item</label>
									<div class="col-sm-10">
										<input type="number" min="0.00" max="10000.00" step="any" class="form-control" id="price" placeholder=" Enter price" name="price" value="<?php echo $Price ?>">
									</div>
								</div>		
							</div>
						</div>
					</div>
				
				<!--<div class="col-md-6 col-sm-12">
					<div class="form-group row">
						<div class="col-sm-10">
							<img style="max-height: 400px;max-width: 400px;"id="imagePrev" name="imagePrev" src="data:image/jpg;charset=utf8;base64,</?php echo base64_encode($Image); ?>" />  <br><br>
						</div>
					</div>		
				
				</div> -->
			</div><!-- /row -->
			
			<div class="col-md-6 col-sm-12">
				<br>
				<button name="update" class="btn btn-primary">Update</button>
				<button type="reset" class="btn btn-primary">Reset</button>
				</form>
				<button class="btn btn-primary" onClick="window.location.href='searchProduct.php';">Cancel</button>
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
