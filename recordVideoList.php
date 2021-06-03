<?php 
	require_once 'header.php'; 
?>
<?php
    $query = "SELECT * FROM `videos`";
    $search_result = filterTable($query);

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
	<title>Video List</title>
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
				<h2>Video Record List</small></h2>
			</div>
            <br>
			<div class="panel panel-info">
				<div class="panel-body">
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
						<th colspan="8"><h4>Video Record List</h4></th>
					</tr>
					<t>
						<th>ID</th>				
						<th>Name</th>
						<th>Date</th>
						<th>URL</th>

					</t>
					<?php 
						while($rows = mysqli_fetch_array($search_result)):
					?>       
					<tr>
						<td><?php echo $rows['vid']; ?></td>
						<td><?php echo $rows['name']; ?></td>
						<td><?php echo $rows['date']; ?></td>
						<td><a href="viewVideoRecord.php?ID=<?php echo $rows['vid']; ?>">View</a></td>
					</tr>
					<?php     
						endwhile;
					?>   
					</table>
					<br>
					<button class="btn btn-primary" onClick="window.location.href='uploadRecordVideo.php';">Upload Video</button>
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