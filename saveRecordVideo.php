<?php 	

require_once 'core.php';

if($_POST) {		

	if(!empty($_FILES["file"]["name"])){
		$fileName = basename($_FILES["file"]["name"]);
		$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
		$allowTypes = array('mp4');
		if(!in_array($fileType, $allowTypes)){  
			echo "<script type='text/javascript'>alert('Please upload only video mp4 file!');
				window.location='uploadRecordVideo.php';
				</script>";
			}
	}
	
	$type = explode('.', $_FILES['file']['name']);
	$type = $type[count($type)-1];
	date_default_timezone_set('Asia/Kuala_Lumpur');
	$date = date('Y-m-d H:i:s');
	
	$datename = date('YmdHis');
	$name = $_FILES['file']['name'];
	$url = 'videos/'.'RV'.$datename.'-'.$name;
	
	if(in_array($type, array('mp4'))) {
		if(is_uploaded_file($_FILES['file']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['file']['tmp_name'], $url)) {

				$query = ("INSERT INTO `videos` VALUES ('','RV$datename-$name','$url','$date')");
				$result = mysqli_query($connect,$query);
				
				if($result)
				{
				echo "<script type='text/javascript'>alert('Upload sucessfully');
					window.location='recordVideoList.php';
					</script>";
				}
				else
				{
					echo "<script type='text/javascript'>alert('Upload failed');
					window.location='uploadRecordVideo.php';
					</script>";
				}// /else	
			}
			else {
				return false;
			}
		}
		echo "<script type='text/javascript'>alert('Upload failed');
			window.location='uploadRecordVideo.php';
			</script>";		// if
	}
	else{
		echo "<script type='text/javascript'>alert('Upload failed');
					window.location='uploadRecordVideo.php';
					</script>";
		
	}// if in_array 		
	 
	$connect->close();

} // /if $_POST