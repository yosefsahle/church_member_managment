<?php

@include 'dbcon.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM tablename WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['role'] = $row['user_type'];
         header('location:Admin/index.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['role'] = $row['user_type'];
         header('location:user_page.php');

      }elseif($row['user_type'] == 'super'){
         $_SESSION['email'] = $row['email'];
         $_SESSION['super_name'] = $row['name'];
         $_SESSION['role'] = $row['user_type'];
         header('location:Super/index.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="css/nav.css">

<script src="Js/nav.js"></script>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>


         .location{
            padding: 15px;
            padding-top: 20px;
            text-align: center;
            background-color: #4267B2;
            color: lightgrey;
        }

        .location>div{
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .location>div>h2{
            color: orange;
        }

        .location>div>h3{
            font-size: 15px;
        }
        
   </style>

</head>
<body>
<nav class="nav">
        <div class="logo">
            <img src="Asset/sl_logo.png" alt="" id="logo">
        <h1>Church Name</h1>
        </div>

<div class="topnav" id="myTopnav">
  <a href="index.html" >Home</a>
  <a href="#login" class="active">Log in</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
    </nav>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="email" required placeholder="enter your Phone Number">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

<section class="location">
        <div>
            <h2>ETHIOPIA</h2>
            <h3>Your Location Here</h3>
            <p>+251 9* *** **** || +251 9* *** ****</p>
        </div>

        <div>
            <h2>USA</h2>
            <h3>Your Location Here</h3>
            <p>+251 9* *** **** || +251 9* *** ****</p>
        </div>
    </section>

</body>
</html>