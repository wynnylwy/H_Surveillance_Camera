<?php 
require_once 'db_connect.php';
session_start();
$errors = array();
	if($_POST) {		
	
	$userID = $_POST['userID'];
	$password = $_POST['password'];

	if(empty($userID) || empty($password)) {
		if($userID == "") {
			echo "<script type='text/javascript'>alert('User ID is required');
			window.location='index.php';
			</script>";
		} 
		if($password == "") {
			echo "<script type='text/javascript'>alert('Password is required');
			window.location='index.php';
			</script>";
		}
	} else {
		$sql = "SELECT * FROM account INNER JOIN package WHERE userID = '$userID' AND status = 'Action'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = ($password);
			// exists
			$mainSql = "SELECT * FROM account WHERE userID = '$userID' AND password = '$password'";
			$mainResult = $connect->query($mainSql);
			$row = $result->fetch_assoc();

			if($mainResult->num_rows == 1) {

				// set session
				$_SESSION['userID'] = $userID;
				$_SESSION['success'] = "You are now logged in";
				$_SESSION['position'] = $row['position'];
				$_SESSION['package'] = $row['package'];
				header('location: homepage.php');						
			} else{
				echo "<script type='text/javascript'>alert('Incorrect userid/password combination');
				window.location='index.php';
				</script>";
			} // /else
		} else {		
			echo "<script type='text/javascript'>alert('User ID doesnot exists');
			window.location='index.php';
			</script>";			
		} 
	} 
}
	
?>