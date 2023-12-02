<?php 
include 'config.php';
include('dbcon.php');

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../css/nav.css">

    <link rel="stylesheet" href="../css/nav_footer.css">

<script src="../Js/nav.js"></script>

    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .main{
            justify-content: center;
            align-items: center;
            text-align: center;
            padding-top: 60px;
            padding-bottom: 60px;
            background-image: url("../Asset/bg1.jpg");
        }

        .main>h1{
            color: white;
            font-size: 30px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            margin-bottom: 4px;
        }
        .main>p{
            color: gray;
            font-size: 13px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }
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

        .registration{
            padding: 10px;
            background-image: url(family.JPG);
            background-size: cover;
            background-position: -50px;
        }

        form{
            display: flex;
            flex-direction: column;
            background-color: rgba(66, 103, 178,0.7);
            /* background-color: rgba(0, 0, 0, 0.7); */
            width: 85%;
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
            padding: 15px;
            border-radius: 15px;
            gap: 20px;
        }

        form>h1{
            text-align: center;
            color: orange;
            font-size: 30px;
        }
        form>div{
            text-align: end;
            color: white;
        }
        form>div>input{
            width: 60%;
            height: 40px;
            border: none;
            border-radius: 5px;
        }

        form>input{
            width: 60%;
            height: 40px;
            border: none;
            border-radius: 5px;
            margin-left:auto;
            margin-right:auto;
        }

        form>button{
            width: 65%;
            height: 40px;
            border: none;
            border-radius: 5px;
            margin-left: auto;
            margin-right: auto;
            font-size: 20px;
            cursor: pointer;
            background-color: orange;
            color: white;
        }

        input[type=file]::file-selector-button {
		height:40px;
		background-color:white;
		padding-left:50px;
		padding-right:50px;
		font-size:20px;
        border-radius:5px;
		}


        
    </style>
</head>
<body>
        <div class="logo">
            <img src="../Asset/sl_logo.png" alt="" id="logo">
        <h1>SPIRIT LIFE</h1>
        </div>

<div class="topnav" id="myTopnav">
  <a href="index.php"><?php echo $_SESSION['super_name']?></a>
  <a href="Members.php">Members</a>
  <a href="admins.php">Admins</a>
  <a href="#upload_blog" class="active">Post Blog</a>
  <a href="Register.php">Register</a> 
  <a href="../logout.php">Log out</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


    <section class="main">
        <h1>Spirit Life Church</h1>
        <p>Impowering The Generation For God</p>
    </section>

    <section class="registration">
        <form action="../blog-upload/upload.php"
           method="post"
           enctype="multipart/form-data">

           <h1>POST BLOG</h1>

           <div>
           <label for="tittle">Tittle</label>
		   <input type="text" name="tittle">
           </div>

           <div>
           <label for="Description">Description</label>
           <input type="text" name="description">
           </div>

           <div>
           <label for ="my_image">Upload Image</label>
           <input class="select-photo" type="file" 
                  name="my_image">
            </div>

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>
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