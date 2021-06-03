<?php 
require 'config.php';
 if (!isset($_POST["code"]))
{
	echo "<script type='text/javascript'>alert('Page not found');
			window.location='index.php';
			</script>";
}

else 
{
	$code = $_POST["code"];
	$password = $_POST["password"];
		
	$sql = "SELECT email FROM resetpassword WHERE code ='$code'";   
	$result = $con->query($sql);
	
	$email = "";
	if ($result->num_rows > 0)
	{
		while ($row = $result->fetch_assoc())
		{
			$email = $row["email"];
		}
		echo  $email;
	}	
	else
	{
		echo "nodata";
	}

	$sqlupdate = "UPDATE account SET password='$password' WHERE email ='$email'";   
	$result = $con->query($sqlupdate);
	
	if ($con->query($sqlupdate) === true)
	{
		echo "success";
	}
	
	else
	{
		echo "failed";
	}
	


	$sqldelete = "DELETE FROM resetpassword WHERE code ='$code'";   
	$result = $con->query($sqldelete);
	
	if ($con->query($sqldelete) === true)
	{
		echo "success. You may turn back to the page.";
		echo "<script type='text/javascript'>alert('Password is updated!');
			window.location='index.php';
			</script>";
	}
	
	else
	{
		echo "failed";
	}
	
}

?>








