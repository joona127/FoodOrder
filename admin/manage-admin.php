<?php
include('partials/menu.php');
?>



<div class="main-content">
<div class="wrapper">
  <h1>Manage Admin</h1>
  <br />
  <br />

  <?php 
  if(isset($_SESSION['add'])) 
  {
    echo $_SESSION['add']; // displaying session message
    unset($_SESSION['add']); //Removing session message
  } 
    if(isset($_SESSION['delete']))
    {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }
  
  ?>

  <br><br><br>

  <!-- Button to add Admin -->
  <a href="add-admin.php" class="btn-primary">Add Admin</a>
  <br />
  <br />
  


  <table class="tbl-full">
  <tr>
  <th>S.N.</th>
  <th>Full Name</th>
  <th>Username</th>
  <th>Actions</th>
  </tr>

  <?php 
  // Query to get all admins
     $sql = "SELECT * FROM tbl_admin";
     // Execute the query
     $res = mysqli_query($conn, $sql);

     // Check whether the query is executed or not
     if($res==TRUE)
     {
       // Count rows to check whether we have data in database or not
       $count = mysqli_num_rows($res); // Function to get all the rows in database

       $sn = 1;
       // Check the num of rows
       if($count>0)
       {
         while($rows=mysqli_fetch_assoc($res))
         {
           // Using while loop to get all the data from database
           $id=$rows['id'];
           $full_name=$rows['full_name'];
           $username=$rows['username'];

           // display the values in our table
           ?>


           <tr>
              <td><?php echo $sn++; ?></td>
              <td><?php echo $full_name; ?></td>
              <td><?php echo $username; ?></td>
              <td>
              <a href="#" class="btn-secondary">Update Admin</a>
              <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
              </td>
              </tr>




           <?php

         }
       } 
       else 
       {

       }

     }
  
  ?>

 

  </table>
  </div>
    
</div>
<?php 
include('partials/footer.php');
?>

