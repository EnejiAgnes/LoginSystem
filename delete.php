<?php
require('connection.php');

if(isset($_GET['id'])){
$_SESSION['id'] = $_GET['id'];
$id = $_SESSION['id'];
}
else{
  $id = $_SESSION['id'];
}

//delete statements starts here

$query = "DELETE FROM `users` WHERE `id` = '$id'";
//run your query
$url = 'select.php';
if(mysqli_query($connection,$query)){
  //redirects statements starts here
  header('Location: '.$url);

}
else{
  echo "fail to delete";
}


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form action="index.html" method="post">
       Name:<input type="text" name="" value="<?php echo $name ?>"><br>
       email:<input type="text" name="" value="<?php echo $email ?>"><br>
       phone num:<input type="text" name="" value="<?php echo $phone ?>"><br>
       Address:<input type="text" name="" value="<?php echo $address?>"><br>
       <input type="submit" name="" value="Delete">
     </form>
   </body>
 </html>
