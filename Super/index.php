<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['super_name'])){
   header('location:../login_form.php');
}
elseif($_SESSION['role'] != 'super'){
   header('location:../login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Super page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

       <link rel="stylesheet" href="../css/nav_footer.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../css/nav.css">

<style>

.blog-container{


margin-top:10px;

}

.image-blog{
width:100%;
border-top-right-radius:10px;
border-top-left-radius:10px;
}

.blog-background{
margin-left:auto;
margin-right:auto;
width:90vw;
background-color:#4267B2;
border-top-right-radius:10px;
border-top-left-radius:10px;
border-bottom-right-radius:5px;
border-bottom-left-radius:5px;
margin-bottom:10px;
}

.blog-text{
margin-left:15px;
color:white;
}

.blog-text>p{
margin-left:15px;
color:black;
}


</style>

<script src="../Js/nav.js"></script>


</head>
<body>

        <div class="logo">
            <img src="../Asset/sl_logo.png" alt="" id="logo">
        <h1>SPIRIT LIFE</h1>
        </div>

<div class="topnav" id="myTopnav">
  <a href="#home"><?php echo $_SESSION['super_name']?></a>
  <a href="Members.php">Members</a>
  <a href="admins.php">Admins</a>  
  <a href="upload_blog.php">Post Blog</a>
  <a href="Register.php">Register</a>
  <a href="../logout.php">Log out</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="main"> 
<h1>Welcome <?php echo $_SESSION['super_name']?></h1>
</div>

<section class="post">

<?php

$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "database";
            
                // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
            
                // Check connection
if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
                }

$sql = "SELECT id,tittle,description,image from tablename ORDER BY id DESC";
$result = $conn-> query($sql);

if($result-> num_rows > 0){
   while($row = $result-> fetch_assoc()){
      echo "<div class='blog-background'> <div class='blog-container'><img class='image-blog' src='../blog-upload/blogs/".$row["image"]."'></div>";
 echo"<div class='blog-text'> <h1>".$row["tittle"]."</h1><p>".$row["description"]."</p></div></div>";
   }
}

 

?>
</section>

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

