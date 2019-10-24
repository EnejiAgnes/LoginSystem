<?php
require('connection.php');
include('registration.php');

if(isset($_POST['login'])){
  //form validation
  $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
  $password = htmlspecialchars(strip_tags(trim($_POST['password'])));

  $password = md5($password);

  $query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
  $result = mysqli_query($connection,$query);
  if(mysqli_num_rows($result) == 0){
    echo "Authentication failed";
  }
  else {
    while ($data = mysqli_fetch_assoc($result)){
      $id = $data['id'];
      $name = $data['name'];
      $email = $data['email'];
    }
    $url = 'home.php';
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    if(isset($_SESSION['id'])){
      header('location: '.$url);
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
     <form class="" action="login.php" method="post">
       <div class="">
       <label for="">Email</label>
       <input type="text" name="email" value="">

     </div>
     <div class="">
       <label for="">Password</label>
       <input type="password" name="password" value="">

     </div>
     <div class="">
       <input type="submit" name="login" value="Login">

     </div>
 </form>
   </body>
 </html>
