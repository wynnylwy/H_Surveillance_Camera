<?php 
$con = mysqli_connect("localhost", "root", "", "web engineering");

if (mysqli_connect_errno())
{
	echo "Failed to connect: ". msqli_connect_errno();
}
?>