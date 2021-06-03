<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">
			<span class="spinner-rotate"></span>           
        </div>
    </section>

    <!-- MENU -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button> 
			</div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-nav-first">
                    <li><a href="#top" class="smoothScroll">Home</a></li>
                    <li><a href="#camera" class="smoothScroll">Camera Surveillance</a></li>
					<li><a href="#product" class="smoothScroll">Accessories</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"> User ID : <?php print($_SESSION['userID']) ?></a></li>
					<li><a href="logout.php"> Logout</a></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- HOME -->
    <section id="home">
        <div class="row">
            <div class="owl-carousel owl-theme home-slider">
                <div class="item item-first">
					<div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1>Camera Surveillance Service</h1>
                                <br>
                                <h3 align=”justify”>Camera Surveillance is a security tool that helps reduce crime and protect people and property. We offer integrated and customized advanced Camera Surveillance to protect what matters most to our customers. 
                                Our system is developed to fit all your expectations and meet your demands.</h3>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Camera -->
    <section id="camera">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="about-info">
                        <h2>Start using camera Surveillance with our service</h2>
                            <figure>
                                <a href="showLiveCam.php"><button class="submit-btn form-control"><i class="fa fa-camera" aria-hidden="true" style="color:blue"></i> Live Camera</button></a>
                            </figure>
                            <figure>
                                <a href="videoHistory.php"><button class="submit-btn form-control"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i> View Video Record</button></a>
                            </figure>
                    </div>
                </div>

                <div class="col-md-offset-1 col-md-4 col-sm-12">
					<img src="images/camera.jpg" height="500" width="500">
                </div>

            </div>
        </div>
    </section>

    <!-- PRODUCT -->
    <section id="product">
		<div class="container">
			<div class="row">
				<div class="owl-carousel owl-theme home-slider"> 
					<div class="item item-second">
						<div class="col-md-offset-1 col-md-4 col-sm-12">
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="about-info"><br><br>
								<h3>Accessories of Camera Surveillance:</h3>
								<br><br><br><br><br>
								<figure>
									<a href="searchProduct_staff.php"><button class="submit-btn1 form-control"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i> View Accessories</button></a>
								</figure>
							</div>
						</div>
					</div>  
				</div>
			</div>
		</div>
    </section>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>