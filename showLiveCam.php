<?php require_once 'header.php'; ?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <title> 
        Show Live Cam - View
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
				<h2>Live Camera</h2>
			</div>
			<br>
			<div class="row"> 
                <div class="col-md-12">
                    <video id="video" width="100%" 
						height="100%" autoplay> 
                    </video> 
                </div>			
			</div><!-- /row -->
			
			<br><br><br>
			
			<div class="row"> 
				<div class="col-md-6">	
					<button class="btn btn-primary" onClick="window.location.href='homepage.php';">Back</button>
				</div>
			</div>
        </div><!-- container -->	
    </section>  
	
	<!-- SCRIPTS -->
    <script> 

    let constraintObj = { 
        audio: false, 
        video: { 
            facingMode: "user", 
            width: { min: 640, ideal: 1280, max: 1920 },
            height: { min: 480, ideal: 720, max: 1080 } 
        } 
    }; 

	if (navigator.mediaDevices === undefined) {
        navigator.mediaDevices = {};
        navigator.mediaDevices.getUserMedia = function(constraintObj) {
            let getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
            if (!getUserMedia) {
                return Promise.reject(new Error('getUserMedia is not implemented in this browser'));
            }
            return new Promise(function(resolve, reject) {
                getUserMedia.call(navigator, constraintObj, resolve, reject);
            });
        }
    }else{
        navigator.mediaDevices.enumerateDevices()
        .then(devices => {
            devices.forEach(device=>{
				console.log(device.kind.toUpperCase(), device.label);
                //, device.deviceId
            })
        })
        .catch(err=>{
            console.log(err.name, err.message);
        })
    }

    navigator.mediaDevices.getUserMedia(constraintObj)
    .then(function(mediaStreamObj) {
        //connect the media stream to the first video element
        let video = document.querySelector('video');
			if ("srcObject" in video) {
                video.srcObject = mediaStreamObj;
            } else {
                //old version
                video.src = window.URL.createObjectURL(mediaStreamObj);
            }
            
            video.onloadedmetadata = function(ev) {
                //show in the video element what is being captured by the webcam
                video.play();
            };

	    let start = document.getElementById('btnStart');
        let stop = document.getElementById('btnStop');
	    let canvas = document.getElementById('canvas');
	    let context = canvas.getContext('2d');
	    let snap = document.getElementById("btnSnap");
        let vidSave = document.getElementById('vid2');
        let mediaRecorder = new MediaRecorder(mediaStreamObj);
        let chunks = [];

	    start.addEventListener('click', (ev)=>{
            mediaRecorder.start();
            console.log(mediaRecorder.state);
        })
        
		stop.addEventListener('click', (ev)=>{
            mediaRecorder.stop();
            console.log(mediaRecorder.state);
        });
	    
		snap.addEventListener("click", (ev) =>{
			context.drawImage(video, 0, 0, 640, 480);
		});
        
		mediaRecorder.ondataavailable = function(ev) {
            chunks.push(ev.data);
        }
        mediaRecorder.onstop = (ev)=>{
            let blob = new Blob(chunks, { 'type' : 'video/mp4;' });
            chunks = [];
            let videoURL = window.URL.createObjectURL(blob);
            vidSave.src = videoURL;
        }
        })
        .catch(function(err) { 
			console.log(err.name, err.message); 
        });
    </script> 
	
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>