<?php require_once("db_connect.php");

    if(isset($_POST['update']))
    {
        $AccessoriesID = $_GET['ID'];
        $ProductName = $_POST['productName'];
		$Type = $_POST['type'];
        $Quantity = $_POST['quantity'];
        $Price = $_POST['price'];
        $fileName = basename($_FILES["img"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        $image1 = $_FILES['img']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image1)); 

        $query = "UPDATE products SET productName = '".$ProductName."', type='".$Type."', quantity = '".$Quantity."', price = '".$Price."' , IMG = '".$imgContent."'where pid='".$AccessoriesID."'";
        $result = mysqli_query($connect,$query);

        if($result)
        {
			echo "<script type='text/javascript'>alert('Updated sucessfully');
			window.location='searchProduct.php';
			</script>";
        }
        else
        {
			echo "<script type='text/javascript'>alert('Please Check Your Query');
			window.location='editProductDetail.php';
			</script>";
        }
    }
    else
    {
        header("location: editProductDetail.php");
    }


?>
