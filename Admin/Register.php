<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:../login_form.php');
}
elseif($_SESSION['role'] != 'admin'){
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
            background-image: url("bg1.jpg");
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

        form>div>select{
            width: 60%;
            border: none;
            border-radius: 5px;
            height: 40px;
        }

        form>div>select>option{
            height: 40px;
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


        
    </style>
</head>
<body>

        <div class="logo">
            <img src="../Asset/sl_logo.png" alt="" id="logo">
        <h1>SPIRIT LIFE</h1>
        </div>

<div class="topnav" id="myTopnav">
  <a href="index.php"><?php echo $_SESSION['admin_name']?></a>
  <a href="Members.php">Members</a>
  <a href="#Register" class="active">Register</a>
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
        <form action="register.php" method="post">
            <h1>Registration</h1>
            <div>
                <label for="NAME">Full Name</label>
                <input type="text" name="NAME" required>
            </div>

            <div>
                <label for="TELEGRAM">Telegram Username</label>
                <input type="text" name="TELEGRAM">
            </div>
            <div>
                <label for="INVITE">Invited By</label>
                <input type="text" name="INVITE" required>
            </div>

            <div>
                <label for="PHONE">Phone Number</label>
                <input type="text" name="PHONE">
            </div>

            <div style="display:none;">
                <input type="text" name="img" value="1.png">
            </div>

            <div>
                <label for="GENDER">Gender</label>
                <select name="GENDER" required>
                    <option value="MALE">Male</option>
                    <option value="FEMALE">Female</option>
                </select>
            </div>
            <div>
                <label for="LOCATION">Location</label>
                <input type="text" name="LOCATION" required>
            </div>

            <div>
                <label for="DATE">Date</label>
                <input type="date" name="DATE" id="" required>
            </div>

            <div>
                <label for="T1">Status</label>
                <select name="status">
                    <option value="Active">Active</option>
                    <option value="Deactive">Deactive</option>
                </select>
            </div>

            <div>
                <label for="T1">የነህምያ ትውልድ</label>
                <select name="T1">
                    <option value="Wating">Waiting</option>
                    <option value="In Progress"> In Progress</option>
                    <option value="Finished">Finished</option>
                </select>
            </div>

            <div>
                <label for="T2">ህብረት እና አንድ ልብ</label>
                <select name="T2">
                    <option value="Wating">Waiting</option>
                    <option value="In Progress"> In Progress</option>
                    <option value="Finished">Finished</option>
                </select>
            </div>

            <div>
                <label for="T3">የስኬታችሁ ሚስጥር</label>
                <select name="T3">
                    <option value="Wating">Waiting</option>
                    <option value="In Progress"> In Progress</option>
                    <option value="Finished">Finished</option>
                </select>
            </div>
            
            <div>
                <label for="OTHERS">ሌላ ትምህርቶች</label>
                <input type="text" name="OTHERS">
            </div>
                <button type="submit" name="submit">REGISTER</button>
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