<?php
require('connection.php');
//define the session variable id
if(isset($_GET['id'])){
$_SESSION['id'] = $_GET['id'];
$id = $_SESSION['id'];
}
else{
  $id = $_SESSION['id'];
}



//get the data of the user using the id

$query = "SELECT * FROM `users` WHERE `id` = '$id'";
$result = mysqli_query($connection,$query);
if(mysqli_num_rows($result) > 0){
while ($data = mysqli_fetch_assoc($result)) {
  $name = $data['name'];
  $email = $data['email'];
  $phone = $data['phone'];
  $address = $data['address'];

}

}


// performing the update task
// check whether the update button has been set


if(isset($_POST['update'])){
  $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
  $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
  $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
  $address = htmlspecialchars(strip_tags(trim($_POST['address'])));

 // if any of the required fields are empty, build the error array
  if(empty($name) || empty($email) || empty($phone) || empty($address)){
    $error[] = "Required fields must not be left empty";
  }
  if(strlen($name) < 3){
    $error[] = "Name is too short";
  }
  if(strlen($phone) < 11 || strlen($phone) > 14){
    $error[] = "Phone number is invalid";
  }
  if(strlen($address) < 10){
    $error[] = "Address must be descriptional";
  }
  // check if the error array is empty
  if(!empty($error)){
    foreach($error as $item){
      echo "<li>".$item."</li><br>";
    }
  }
  else{
    // update data into the database
    $query = "UPDATE `users` SET `name` = '$name',`email` = '$email',
    `phone` = '$phone', `address` = '$address' WHERE `id` = '$id' ";


      $url = 'select.php';
      if(mysqli_query($connection,$query)){


      header('Location:'.$url);
    }
    else{
      echo 'Failed to update';
    }
  }
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form action="edit.php" method="post">
       Name:<input type="text" name="name" value="<?php echo $name ?>"><br>
       email:<input type="text" name="email" value="<?php echo $email ?>"><br>
       phone num:<input type="text" name="phone" value="<?php echo $phone ?>"><br>
       Address:<input type="text" name="address" value="<?php echo $address?>"><br>
       <input type="submit" name="update" value="Update">
     </form>
   </body>
 </html>
