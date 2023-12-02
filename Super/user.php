<?php 
include('dbcon.php');
@include 'config.php';

session_start();

if(!isset($_SESSION['super_name'])){
   header('location:../login_form.php');
}
elseif($_SESSION['role'] != 'super'){
   header('location:../login_form.php');
}

?>

<?php
include('dbcon.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "SELECT * from tablename where ID = $id";
$result = $conn-> query($sql);




$row = mysqli_fetch_assoc($result);

?>

<?php include('dbcon.php');?>
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
            background-color:#4267B2;
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

        .update{
        text-decoration: none;
        color : white;
        background-color : gray;
        padding : 5px;
        border-radius: 5px;
        }

        .profile-image{
        width:250px;
        margin-top:10px;
        border-radius:100%;
        border : solid 2px #4267B2;
        display: block;
        margin-left: auto;
        margin-right: auto;
        }

        .table{
        width: 100vw;
        height:auto;
        overflow-x: scroll;
        overflow-y: scroll;
        padding: 2px;
        margin-bottom:30px;
        }

        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 95%;
        }
        
        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 5px;
        }
        
        #customers tr:nth-child(even){
        background-color: #f2f2f2;
        }
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
        
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4267B2;
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
  <a href="index.php"><?php echo $_SESSION['super_name']?></a>
  <a href="Members.php">Members</a>
  <a href="admins.php">Admins</a>
  <a href="upload_blog.php">Post Blog</a>  
  <a href="Register.php">Register</a>
  <a href="../logout.php">Log out</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

    <section class="members">
    
    <div class="filter-box">
    
    </div>

        <div class="table">
                
                <?php

                $sql = "SELECT ID,NAME,TELEGRAM,INVITE,PHONE,GENDER,LOCATION,DATE,T1,T2,T3,OTHERS,image_url,status from tablename WHERE ID=".$row["ID"];
                $result = $conn-> query($sql);

                $str = $row["OTHERS"];
                $other_teaching = explode(",", $str);
                $teach = count($other_teaching);

                $usname = $row["NAME"];

                if($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                        echo"<div class='image-div'><img class='profile-image' src='../image-upload/uploads/".$row["image_url"]."'></div>";
                        echo"<div><h1 style='color:black; text-align:center; font-size:30px;'>".$usname."</h1></div>";                

                        echo"<div class='table'>
            <table id='customers'>
                <tr>
                    <th>Title</th>
                    <th>Value</th>
                </tr>

                <tr>
                <td>User Name</td>
                <td><a href='https://t.me/".$row["TELEGRAM"]."'>".$row["TELEGRAM"]."</a></td>
                </tr>

                <tr>
                <td>Phone Number</td>
                <td>".$row["PHONE"]."</td>
                </tr>

                <tr>
                <td>Invited By</td>
                <td>".$row["INVITE"]."</td>
                </tr>

                <tr>
                <td>Gender</td>
                <td>".$row["GENDER"]."</td>
                </tr>

                <tr>
                <td>Location</td>
                <td>".$row["LOCATION"]."</td>
                </tr>
                
                <tr>
                <td>Date</td>
                <td>".$row["DATE"]."</td>
                </tr>";

                if(strlen($row["status"]) == 6){
                    echo "<tr>
                    <td>Status</td>
                    <td style ='color:green;'>".$row["status"]."</td>
                    </tr>";
                        }
                        else{
                            echo "<tr>
                    <td>Status</td>
                    <td style ='color:red;'>".$row["status"]."</td>
                    </tr>";
                        }
                   ?>
</table>
        </div>

        <h1 style='margin-bottom:10px; text-align:center; font-size:35px; font-family:Arial, Helvetica, sans-serif;'>Teaching Status</h1>
        
        <?php echo"<div class='table'>
            <table id='customers'>
                <tr>
                    <th>Teaching</th>
                    <th>Status</th>
                </tr>

                <tr>
                <td>tittle</td>
                <td>".$row["T1"]."</td>
                </tr>

                <tr>
                <td>tittle</td>
                <td>".$row["T2"]."</td>
                </tr>

                <tr>
                <td>tittle</td>
                <td>".$row["T3"]."</td>
                </tr>
                ";
                for ($x = 0; $x < $teach; $x++) {
                    echo "<tr>
                    <td>".$other_teaching[$x]."</td>
                    <td>Finished</td>
                    </tr>  
                    ";
                    };

                echo "       
            </table>
        </div>";
                        

                    }
                }
                else{
                    echo"0 result";
                }
                $conn-> close();
                ?>
            
        </div>
    </section>



    <section class="location">
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
    </section>
</body>
</html>