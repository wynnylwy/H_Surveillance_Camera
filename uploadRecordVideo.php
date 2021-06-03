<?php require_once 'header.php'; ?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <title> 
        Upload Video
    </title> 
  
    <script src= "http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" 
			type="text/javascript"> 
    </script> 
  
    <script src= "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"> 
    </script> 
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
				<h2>Upload Record Video To List</h2>
			</div>
			<br>
			<div class="row">
				<div class="form-group row">
					<div class="col-md-9 col-md-offset-3">
						<form class="form-horizontal" action="saveRecordVideo.php" method="POST" enctype="multipart/form-data">
						<div class="col-sm-5">
							<input type="file" name="file" class="btn btn-primary" onchange="document.getElementById('viewVideo').src = window.URL.createObjectURL(this.files[0])"/>
						</div>
					
						<div class="col-sm-3">
							<button type="submit" name="submit" class="btn btn-primary">Upload</button>
						</form>
						</div>
							<button class="btn btn-primary" onClick="window.location.href='recordVideoList.php';">Video List</button>
							<button class="btn btn-primary" onClick="window.location.href='homepage.php';">Back</button>
					</div>
				</div>
			</div>
			<div align="center">
				<div class="form-group row">
					<video id="viewVideo" src="" width="80%" 
							height="80%" controls> 
					</video>
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