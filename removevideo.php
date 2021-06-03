
<?php 

    require_once("db_connect.php");

    if(isset($_POST['delete']))
    {
		$type = '1';

		// Get the video link before delete it from db
		$ID = $_GET['DEL'];
		$query = 'SELECT url FROM videos WHERE vid = "'.$ID.'"';
		$result = mysqli_query($connect,$query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$URL = $row["url"];
		unlink("".$URL);
		//deletes subcat from tables hw_subcategorie.
		$sqldelete = 'DELETE FROM videos WHERE vid = "'.$ID.'"';
		$result1 = mysqli_query($connect,$sqldelete);
		//if query is done right then 'Record updated successfully'
	
		if($result1)
        {
			echo "<script type='text/javascript'>alert('Record deleted sucessfully');
			window.location='recordVideoList.php';
			</script>";
        }
        else
        {
			echo "<script type='text/javascript'>alert('Error deleted record: ');
			window.location='viewVideoRecord.php';
			</script>";
        }
	}
    else
    {
        header("location: viewVideoRecord.php");
    }

?>
