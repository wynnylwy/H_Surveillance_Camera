<?php require_once 'header.php'; ?>
<?php 
	require_once("db_connect.php");
    $Package = $_SESSION['package'];
    $query = " select * from package where package='".$Package."'";
    $result = mysqli_query($connect,$query);

		if($result->num_rows == 1) {
			
			
    while($row=mysqli_fetch_assoc($result))
    {
        $Package = $row['package'];
		
        $Live = $row['live'];
		$Record = $row['record'];
        $Snapshot = $row['snapshot'];
        $Status = $row['status'];
		$Price = $row['price'];
		$Qty = $row['qtyCam'];
    }
		}
		else {		
			echo "<script type='text/javascript'>alert('Package does not exists! Please insert correctly.');
			window.location='homepage.php';
			</script>";			
		}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <title> 
        Quotation 
    </title> 
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
				<h2>Quotation For Your System</h2>
			</div>
			<br>
			<div class="panel panel-info">
				<div class="panel-body">
			<div align="center">
					<br>
					<style>
						table,th {
							border: 1px solid black;
							padding: 10px;
						}
						
						 td {
							border: 0px solid black;
							padding: 10px;
						}

						table {
							border-spacing: 50px;
						}
					</style>
					
					<h4>SINTOK MONITORING AND SURVEILLANCE WEBAPP</h4>
					<br>
					<h4>Quotation</h4>
					<br>
					<table align="center" style="width:60%">
					<tr>
						<th colspan="4">Details</th>				
						<th>Price ( RM )</th>
					</tr>
					<tr>
						<th colspan="5">		
							Service:
						</th>
					</tr>
					<tr>
						<th rowspan="6">1.</th>
						<th colspan="3"><h5>Camera:</h5></th>
						<th rowspan="6"><?php echo $Price ?></th>
					</tr>
					<tr>
						<td colspan="3">		
							Your package: <?php echo $Package ?>
						</td>
					</tr>
					<tr>
						<td>		
							Quantity of Camera: 
						</td>
						<td colspan="2">		
							 <?php echo $Qty ?>
						</td>
					</tr>
					<tr>
						<td>Function:</td>
						<td>Live Camera</td>
						<td><?php echo $Live ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Record Video</td>
						<td><?php echo $Record ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Snapshot Picture</td>
						<td><?php echo $Snapshot ?></td>
					</tr>
					<tr>
						<th rowspan="5">2.</th>
						<th colspan="3"><h5>Video:</h5></th>
						<th rowspan="5">300.00</th>
					</tr>
					<tr>
						<td>Function:</td>
						<td>Upload Video</td>
						<td>Yes</td>
					</tr>
					<tr>
						<td></td>
						<td>View Video</td>
						<td>Yes</td>
					</tr>
					<tr>
						<td></td>
						<td>Delete Video</td>
						<td>Yes</td>
					</tr>
					<tr>
						<td></td>
						<td>Download Video</td>
						<td>Yes</td>
					</tr>
					<tr>
						<th rowspan="5">3.</th>
						<th colspan="3"><h5>Accessories:</h5></th>
						<th rowspan="5">500.00</th>
					</tr>
					<tr>
						<td>Function:</td>
						<td>Add Accessories</td>
						<td>Yes</td>
					</tr>
					<tr>
						<td></td>
						<td>Edit Accessories</td>
						<td>Yes</td>
					</tr>
					<tr>
						<td></td>
						<td>Delete Accessories</td>
						<td>Yes</td>
					</tr>
					<tr>
						<td></td>
						<td>View Accessories</td>
						<td>Yes</td>
					</tr>
					<tr>
						<th colspan="4">Total Amount</th>				
						<th><?php echo ($Price + 800.00) ?></th>
					</tr>

				  
					</table>
					
					<br>
					<button class="btn btn-primary" onClick="window.location.href='makepdf.php';">Print</button>
					<button class="btn btn-primary" onClick="window.location.href='homepage.php';">Back</button>
					<br><br>
					</div>
				</div><!-- panel-body -->
			</div><!-- /panel -->
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