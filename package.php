<?php require_once 'header.php'; ?>
<?php

    $query = "SELECT * FROM `package`";
    $search_result = filterTable($query);
	
	function filterTable($query)
	{
		$connect = mysqli_connect("localhost", "root", "", "web engineering");
		$filter_Result = mysqli_query($connect, $query);
		return $filter_Result;
	}
?>
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
        Package
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
				<h2>Package For Live Camera Function</h2>
			</div>
			<br>
			<div class="panel panel-info">
				<div class="panel-body">
					<div align="center">
					
						<br>
	
						<style>
							table, th, td {
								border: 1px solid black;
								padding: 10px;
							}

							table {
								border-spacing: 50px;
							}
						</style>
					
			<table align="center" style="width:60%">
				<tr>
					<th colspan="7"><h4>Package List For Live Camera Function</h4></th>
				</tr>
				<t>
					<th rowspan="2">Package</th>				
					<th colspan="3">Function</th>
					<th rowspan="2">Quantity of Camera</th>	
					<th rowspan="2">Price (RM)</th>
					<th rowspan="2">Status</th>
				</t>
				<tr>
					<th>Live Camera</td>
					<th>Record Video</td>
					<th>Snapshot Picture</td>
				</tr>
				<?php 
					while($rows = mysqli_fetch_array($search_result)):
				?>       
				<tr>
					<td><?php echo $rows['package']; ?></td>
					<td><?php echo $rows['live']; ?></td>
					<td><?php echo $rows['record']; ?></td>
					<td><?php echo $rows['snapshot']; ?></td>
					<td><?php echo $rows['qtyCam']; ?></td>
					<td><?php echo $rows['price']; ?></td>
					<td><?php echo $rows['status']; ?></td>
				</tr>
				<?php     
					endwhile;
				?>   
			</table>
			
			<br>
			
			<div>
				Your current package: <?php echo $Package ?>
			</div>
			
			<br>
			
			<div>
				<form class="form-horizontal" action="updatePackage.php" method="POST">
				<label for="package" >Select package you want to change:</label>
					<div >
						<select name="package" >
							<option value="1" >Package 1</option>
							<option value="2" >Package 2</option>
						</select>
					</div>
			</div>
					<br>
					<button name="update" class="btn btn-primary">Change</button>
				</form>
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