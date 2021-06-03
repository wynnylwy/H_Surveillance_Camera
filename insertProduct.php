<?php
$productName = $_POST['productName'];
$type = $_POST['type'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

if(!empty($_FILES["img"]["name"])){
    $fileName = basename($_FILES["img"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $allowTypes = array('jpg','png','jpeg');
    if(!in_array($fileType, $allowTypes)){  
        echo "<script type='text/javascript'>alert('Please upload only image jpg, png or jpeg file!');
            window.location='addProduct.php';
            </script>";
        }
}
if (!empty($productName) && !empty($type) && !empty($quantity) && !empty($price)) {
    $image = $_FILES['img']['tmp_name']; 
    $imgContent = addslashes(file_get_contents($image)); 
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "web engineering";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT productName From products Where productName = ? Limit 1";
     $INSERT = "INSERT Into products (productName, type, quantity, price, IMG) values(?, ?, ?, ?, '$imgContent')";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $productName);
     $stmt->execute();
     $stmt->bind_result($productName);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssii", $productName, $type, $quantity, $price);
      $stmt->execute();
      echo "<script type='text/javascript'>alert('New record inserted sucessfully.');
            window.location='homepage.php';
            </script>"; 
     } else {
      echo "<script type='text/javascript'>alert('This accessories already be inserted.');
            window.location='addProduct.php';
            </script>"; 
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "<script type='text/javascript'>alert('All field are required');
        </script>"; 
 die();
}
?>