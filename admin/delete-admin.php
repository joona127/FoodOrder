<?php

   include('../config/constants.php');

$id = $_GET['id'];

// Create SQL Query to Delete Admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

// Execute the query
$res = mysqli_query($conn, $sql);

if($res==TRUE)
{
  $_SESSION['delete'] = "Admin deleted succesfully";

  header('location:'.SITEURL.'admin/manage-admin.php');
}
else 
{
  $_SESSION['delete'] = "Failed to delete admin. Try again.";
  header('location:'.SITEURL.'admin/manage-admin.php');
}


?>