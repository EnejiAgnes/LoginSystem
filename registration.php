<?php
require('connection.php');
// a form that will be used to collect user details
//Name, Email, Phone, Address
// Fields will be submitted to this same page
// check whether the user have submitted the form
// Validate the values the users have submitted
//store errors in an array
// if there are no errors then
// insert into the database
if(isset($_POST['submit'])){
  // validate the value the user submitted
  $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
  $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
  $password = htmlspecialchars(strip_tags(trim($_POST['password'])));
  $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
  $address = htmlspecialchars(strip_tags(trim($_POST['address'])));

 // if any of the required fields are empty, build the error array
  if(empty($name) || empty($email) || empty($password) || empty($phone) || empty($address)){
    $error[] = "Required fields must not be left empty";
  }
  if(strlen($name) < 3){
    $error[] = "Name is too short";
  }
  if(strlen($password) < 5){
    $error[] = "password too short";
  }
  if(strlen($phone) < 11 || strlen($phone) > 11){
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
    //hash the Password
    $password = md5($password);
    // insert data into the database
    $query = "INSERT INTO `users`(`id`,`name`,`email`,`password`,`phone`,`address`) VALUES(NULL,'$name','$email','$password','$phone','$address')";
    // run the query
    if(mysqli_query($connection,$query)){
      // redirect the user to select.php
      // $url = 'select.php';
      // header('Location: '.$url);
    }
    else{
      echo "Fail to register";
    }

  }
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Registration system</title>
   </head>
   <body>
     <form action="registration.php" method="post">

       <div>
         <label>Name</label>
         <input type="text" name="name" value="" placeholder="Enter your name">
       </div>

       <div>
         <label>Email</label>
         <input type="email" name="email" value="" placeholder="Enter your email address">
       </div>

       <div>
         <label>Password</label>
         <input type="password" name="password" value="" placeholder="password">
       </div>

       <div>
         <label>Phone number</label>
         <input type="text" name="phone" value="" placeholder="Enter your phone number">
       </div>

       <div>
         <label>Address</label>
         <textarea name="address" rows="8" cols="80"></textarea>
       </div>

       <div>
         <input type="submit" name="submit" value="Register">
       </div>
     </form>
   </body>
 </html>
