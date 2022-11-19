<?php

include 'connection.php';
session_start();
$_SESSION['id'] = $row['id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styling.css">

</head>
<body>
   
<div class="update-profile">
<?php
     $sql = mysqli_query("SELECT * FROM registration WHERE id = '$_SESSION['id']' ");
     $fetch = mysqli_fetch_assoc($conn, $sql);
   ?>


   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="name" value="<?php echo $fetch['txt']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="email" value="<?php echo $fetch['email']; ?>" class="box">
        </div> 
      <a href="home.php" class="delete-btn">go back</a>
    </div>
   </form>

</div>

</body>
</html>