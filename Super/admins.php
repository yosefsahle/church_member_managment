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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/nav_footer.css">
    
    <link rel="stylesheet" href="../css/nav.css">

    <script src="../Js/nav.js"></script>

    

</head>
<body>
        <div class="logo">
            <img src="../Asset/sl_logo.png" alt="" id="logo">
        <h1>Church Name</h1>
        </div>

<div class="topnav" id="myTopnav">
  <a href="index.php"><?php echo $_SESSION['super_name']?></a>
  <a href="Members.php">Members</a>
  <a href="#admins" class="active">Admins</a>  
  <a href="upload_blog.php">Post Blog</a>
  <a href="Register.php">Register</a>
  <a href="../logout.php">Log out</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
    <section class="main">
        <h1>Name Church</h1>
        <p>Impowering The Generation For God</p>
    </section>

    <section class="members">
    
    <div class="filter-box">
    
    </div>

        <div class="table">
            <table class="customers">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                    <th>Edit</th>
                </tr>
                <?php
                $servername = "localhost";
                $username = "ethiozoh_admin";
                $password = "admin";
                $dbname = "ethiozoh_user";
            
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
            
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id,name,email,user_type from tablename";
                $result = $conn-> query($sql);


                if($result-> num_rows > 0){
                    $counter = 1;

                    while($row = $result-> fetch_assoc()){

                        if($_SESSION['email'] == $row["email"] || $row["email"] == '0912805393'){
                            continue;
                        }
                        
                        echo"<tr><td>".$counter."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["user_type"]."</td>";             
                        echo "<td><a href='update_admins.php?id=".$row["id"] ."' class='update'>Edit</a></td></tr>";
                        $counter++;

                        
                    }
                    echo "</table>";
                }
                else{
                    echo"0 result";
                }
                $conn-> close();
                ?>
            
            </table>
        </div>
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