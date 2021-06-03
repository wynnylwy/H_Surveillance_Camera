<?php 
	require_once 'header.php'; 
?>
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `products` WHERE pid = '$valueToSearch'";
    $search_result = filterTable($query);
    
}else if(isset($_POST['all']))
{
    $query = "SELECT * FROM `products`";
    $search_result = filterTable($query);
}
else {
    $query = "SELECT * FROM `products`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "web engineering");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Accessories</title>
</head>
<body>
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
				<h2>Edit, Delete, Search & View Certain CCTV Accessories<small>Enter Accessories ID</small></h2>
			</div>
            <br>
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">	
						<div class="col-md-6 col-md-offset-4">
							<form class="form-horizontal" action="searchProduct.php" method="POST" id="product-form">
								<div class="form-group row">
								<label for="productName" class="col-sm-1 col-form-label">ID: </label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="valueToSearch" placeholder="Accessories ID"> 
									</div>
								
									<div class="col-sm-6">
										<button type="submit" name="search" class="btn btn-primary">Search</button>
										<button type="submit" name="all" class="btn btn-primary">All</button>
									</div>
								</div>
							</form>		
						</div>		
					</div><!-- /row -->
			
					<div align="center">
					<br>
					<style>
						table, th, td {
							border: 1px solid black;
							padding: 5px;
						}

						table {
							border-spacing: 50px;
						}
					</style>
					
					<table align="center" style="width:60%">
					<tr>
						<th colspan="8"><h4>CCTV Accessories list</h4></th>
					</tr>
					<t>
						<th>ID</th>				
						<th>Name</th>
						<th>Type</th>
						<th>Quantity</th>
						<th>Price(RM)</th>
						<th>Edit Detail</th>
						<th>Delete Detail</th>
						<th>View Detail</th>
					</t>
					<?php 
						while($rows = mysqli_fetch_array($search_result)):
					?>       
					<tr>
						<td><?php echo $rows['pid']; ?></td>
						<td><?php echo $rows['productName']; ?></td>
						<td><?php echo $rows['type']; ?></td>
						<td><?php echo $rows['quantity']; ?></td>
						<td><?php echo $rows['price']; ?></td>
						<td><a href="editProductDetail.php?AccessoriesID=<?php echo $rows['pid']; ?>">Edit</a></td>
						<td><a href="deleteProductDetail.php?AccessoriesID=<?php echo $rows['pid']; ?>">Delete</a></td>
						<td><a href="viewProductDetail.php?AccessoriesID=<?php echo $rows['pid']; ?>">View</a></td>
					</tr>
					<?php     
						endwhile;
					?>   
					</table>
					<br>
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