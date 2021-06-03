
<?php 

    require_once("db_connect.php");

    if(isset($_POST['update']))
    {
        $Package = $_POST['package'];
		
		if($Package == '1'){
			$query = "UPDATE package SET status = 'Action' where package='1'";
			$result = mysqli_query($connect,$query);
			
			if($result)
			{
				$query1 = "UPDATE package SET status = 'Inaction' where package='2'";
				$result1 = mysqli_query($connect,$query1);
			
				if($result1)
				{
					echo "<script type='text/javascript'>alert('Updated sucessfully! You must login again!');
					window.location='index.php';
					</script>";
				}
				else
				{
					echo "<script type='text/javascript'>alert('Please Check Your Query');
					window.location='package.php';
					</script>";
				}
			}
			else
			{
				echo "<script type='text/javascript'>alert('Please Check Your Query');
				window.location='package.php';
				</script>";
			}
		}else if($Package == '2'){
			$query = "UPDATE package SET status = 'Action' where package='2'";
			$result = mysqli_query($connect,$query);
			
			if($result)
			{
				$query1 = "UPDATE package SET status = 'Inaction' where package='1'";
				$result1 = mysqli_query($connect,$query1);
			
				if($result1)
				{
					echo "<script type='text/javascript'>alert('Updated sucessfully! You must login again!');
					window.location='index.php';
					</script>";
				}
				else
				{
					echo "<script type='text/javascript'>alert('Please Check Your Query');
					window.location='package.php';
					</script>";
				}
			}
			else
			{
				echo "<script type='text/javascript'>alert('Please Check Your Query');
				window.location='package.php';
				</script>";
			}
		}
	}
    else
    {
        header("location: package.php");
    }
?>
