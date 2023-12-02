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

    $NAME = $_POST['NAME'];
    $TELEGRAM = $_POST['TELEGRAM'];
    $INVITE = $_POST['INVITE'];
    $PHONE = $_POST['PHONE'];
    $GENDER = $_POST['GENDER'];
    $LOCATION = $_POST['LOCATION'];
    $DATE = $_POST['DATE'];
    $T1 = $_POST['T1'];
    $T2 = $_POST['T2'];
    $T3 = $_POST['T3'];
    $OTHERS = $_POST['OTHERS'];
    $status = $_POST['status'];
    $id1 = $_POST['ID'];


    
    

    #$sql = "UPDATE `user` SET `NAME`='[$NAME]',`TELEGRAM`='[$TELEGRAM]',`INVITE`='[$INVITE]',`PHONE`='[$PHONE]',`GENDER`='[$GENDER]',`LOCATION`='[$LOCATION]',`DATE`='[$DATE]',`T1`='[$T1]',`T2`='[$T2]',`T3`='[$T3]',`OTHERS`='[OTHERS]' WHERE `ID`=[$id]";

    $sql = "UPDATE tablename SET `NAME`='$NAME' ,`TELEGRAM`='$TELEGRAM', `INVITE`='$INVITE', `PHONE`='$PHONE' , `GENDER`='$GENDER', `LOCATION`='$LOCATION',`T1`='$T1',`T2`='$T2',`T3`='$T3',`OTHERS`='$OTHERS', `status`='$status' WHERE `ID` = '$id1'";
    #$sql = "UPDATE user SET `NAME`= '".$_POST['NAME']."' ,`TELEGRAM` = '".$_POST['TELEGRAM']."', `INVITE`= '".$_POST['INVITE']."' , `PHONE`= '".$_POST['PHONE']."' , `GENDER`= '".$_POST['GENDER']."', `LOCATION`= '".$_POST['LOCATION']."',`DATE`= '".$_POST['DATE']."',`T1`= '".$_POST['T1']."',`T2`= '".$_POST['T2']."',`T3`='".$_POST['T3']."',`OTHERS`= '".$_POST['OTHERS']."' where `ID` ='$id'";
    
    if (mysqli_query($conn, $sql) == TRUE) {
        header("Location: Members.php");
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
        <form action="update_page_1.php?id_new=<?php echo $id;?>" method="post">
            <h1>Registration</h1>

            <div id="dont-show">
                <label for="ID">ID</label>
                <input type="text" name="ID" value="<?php echo $row['ID'];?>" readonly>
            </div>
            
            <div>
                <label for="NAME">Full Name</label>
                <input type="text" name="NAME" value="<?php echo $row['NAME'];?>">
            </div>

            <div>
                <label for="TELEGRAM">Telegram Username</label>
                <input type="text" name="TELEGRAM" value="<?php echo $row['TELEGRAM'];?>">
            </div>
            <div>
                <label for="INVITE">Invited By</label>
                <input type="text" name="INVITE" value="<?php echo $row['INVITE'];?>">
            </div>

            <div>
                <label for="PHONE">Phone Number</label>
                <input type="text" name="PHONE" value="<?php echo $row['PHONE'];?>">
            </div>


            <?php
            $male = "MALE";
            if($row["GENDER"]==$male){
                echo"
                <div>
                <label for='GENDER'>Gender</label>
                <select name='GENDER'>
                    <option value='MALE' selected='selected'>Male</option>
                    <option value='FEMALE'>Female</option>
                </select>
            </div>
                ";
            }
            else{
                echo"
                <div>
                <label for='GENDER'>Gender</label>
                <select name='GENDER'>
                    <option value='MALE'>Male</option>
                    <option value='FEMALE' selected='selected'>Female</option>
                </select>
            </div>
                ";
            }
            ?>
            <div>
                <label for="LOCATION">Location</label>
                <input type="text" name="LOCATION" value="<?php echo $row['LOCATION'];?>">
            </div>

            <?php
            $active = "Active";
            if($row["status"]==$active){
                echo"
                <div>
                <label for='status'>Status</label>
                <select name='status'>
                    <option value='Active' selected='selected'>Active</option>
                    <option value='Deactive'>Deactive</option>
                </select>
            </div>
                ";
            }
            else{
                echo"
                <div>
                <label for='status'>Status</label>
                <select name='status'>
                    <option value='Active'>Active</option>
                    <option value='Deactive' selected='selected'>Deactive</option>
                </select>
            </div>
                ";
            }
            ?>

            <?php
            $Finished = "Finished";
            $progress = "In Progress";

            if($row["T1"] == $Finished){
                echo"
                <div>
                <label for='T1'>tittle</label>
                <select name='T1' >
                    <option value='Wating'>Waiting</option>
                    <option value='In Progress'> In Progress</option>
                    <option value='Finished' selected='selected'>Finished</option>
                </select>
            </div>
                ";
            }
            elseif($row["T1"] == $progress){
                echo"
                <div>
                <label for='T1'>tittle</label>
                <select name='T1' >
                    <option value='Wating'>Waiting</option>
                    <option value='In Progress' selected='selected'> In Progress</option>
                    <option value='Finished'>Finished</option>
                </select>
            </div>
                ";   
            }
            else{
                echo"
                <div>
                <label for='T1'>tittle</label>
                <select name='T1' >
                    <option value='Wating' selected='selected'>Waiting</option>
                    <option value='In Progress'> In Progress</option>
                    <option value='Finished'>Finished</option>
                </select>
            </div>
                "; 
            }

            ?>

            <?php
            $Finished = "Finished";
            $progress = "In Progress";

            if($row["T2"] == $Finished){
                echo"
                <div>
                <label for='T2'>tittle</label>
                <select name='T2' >
                    <option value='Wating'>Waiting</option>
                    <option value='In Progress'> In Progress</option>
                    <option value='Finished' selected='selected'>Finished</option>
                </select>
            </div>
                ";
            }
            elseif($row["T2"] == $progress){
                echo"
                <div>
                <label for='T2'>tittle</label>
                <select name='T2' >
                    <option value='Wating'>Waiting</option>
                    <option value='In Progress' selected='selected'> In Progress</option>
                    <option value='Finished'>Finished</option>
                </select>
            </div>
                ";   
            }
            else{
                echo"
                <div>
                <label for='T2'>tittle</label>
                <select name='T2' >
                    <option value='Wating' selected='selected'>Waiting</option>
                    <option value='In Progress'> In Progress</option>
                    <option value='Finished'>Finished</option>
                </select>
            </div>
                "; 
            }

            ?>

             <?php
            $Finished = "Finished";
            $progress = "In Progress";

            if($row["T3"] == $Finished){
                echo"
                <div>
                <label for='T3'>tittle</label>
                <select name='T3' >
                    <option value='Wating'>Waiting</option>
                    <option value='In Progress'> In Progress</option>
                    <option value='Finished' selected='selected'>Finished</option>
                </select>
            </div>
                ";
            }
            elseif($row["T3"] == $progress){
                echo"
                <div>
                <label for='T3'>tittle</label>
                <select name='T3' >
                    <option value='Wating'>Waiting</option>
                    <option value='In Progress' selected='selected'> In Progress</option>
                    <option value='Finished'>Finished</option>
                </select>
            </div>
                ";   
            }
            else{
                echo"
                <div>
                <label for='T3'>tittle</label>
                <select name='T3' >
                    <option value='Wating' selected='selected'>Waiting</option>
                    <option value='In Progress'> In Progress</option>
                    <option value='Finished'>Finished</option>
                </select>
            </div>
                "; 
            }

            ?>


            <div>
                <label for="OTHERS">ሌላ ትምህርቶች</label>
                <input type="text" name="OTHERS" value="<?php echo $row['OTHERS'];?>">
            </div>
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