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

$GLOBALS['id'];

if(isset($_GET['id'])){
    $id  = $_GET['id'];
}

$sql = "SELECT * from tablename where ID = $id";
$result = $conn-> query($sql);



$row = mysqli_fetch_assoc($result);

if(isset($_POST['update_member'])){

    $NAME = $_POST['name'];
    $EMAIL = $_POST['email'];

    $TYPE = $_POST['user_type'];
    $id1 = $_POST['id'];


    
    
    $sql = "UPDATE tablename SET `name`='$NAME' ,`email`='$EMAIL', `user_type`='$TYPE' WHERE `ID` = '$id1'";

    if (mysqli_query($conn, $sql) == TRUE) {
        header("Location: admins.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        }

        $conn->close();
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

        #dont-show{
        display:none;
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

    <section class="main">
        <h1>Spirit Life Church</h1>
        <p>Impowering The Generation For God</p>
    </section>

    <section class="registration">
        <form action="update_admins.php?id_new=<?php echo $id;?>" method="post">
            <h1>Registration</h1>

            <div id="dont-show">
                <label for="id">ID</label>
                <input type="text" name="id" value="<?php echo $row['id'];?>" readonly>
            </div>
            
            <div>
                <label for="name">Full Name</label>
                <input type="text" name="name" value="<?php echo $row['name'];?>">
            </div>

            <div>
                <label for="email">Phone Number</label>
                <input type="text" name="email" value="<?php echo $row['email'];?>">
            </div>

            <?php
            $type1 = "super";
            $type2 = "admin";
            if($row["user_type"]==$type1){
                echo"
                <div>
                <label for='user_type'>Role</label>
                <select name='user_type'>
                    <option value='user'>User</option>
                    <option value='admin'>Admin</option>
                    <option value='super' selected='selected'>Super</option>
                </select>
            </div>
                ";
            }
            elseif($row["user_type"]==$type2){
                echo"
                <div>
                <label for='user_type'>Role</label>
                <select name='user_type'>
                    <option value='user'>User</option>
                    <option value='admin' selected='selected'>Admin</option>
                    <option value='super'>Super</option>
                </select>
            </div>
                ";
            }
            else{
                echo"
                <div>
                <label for='user_type'>Role</label>
                <select name='user_type'>
                    <option value='user' selected='selected'>User</option>
                    <option value='admin'>Admin</option>
                    <option value='super'>Super</option>
                </select>
            </div>
                ";
            }
            ?>
          

                <button type="submit" name="update_member" value="UPDATE">UPDATE</button>
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