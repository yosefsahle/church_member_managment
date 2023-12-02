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
    <link rel="stylesheet" href="../css/nav_footer.css">
    
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

        .update{
        text-decoration: none;
        color : white;
        background-color : gray;
        padding : 5px;
        border-radius: 5px;
        }

        .table{
        width: 100vw;
        overflow-x: scroll;
        padding: 5px;
        }

        .customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;

        padding-right:10px;
        }
        
        .customers td, .customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }
        
        .customers tr:nth-child(even){
        background-color: #f2f2f2;
        }
        
        .customers tr:hover{background-color: #ddd;}
        
.customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4267B2;
            color: white;
            }

        .image-edit{
        width:70px;
        border-radius : 100px;
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
  <a href="#Members" class="active">Members</a>
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

    <section class="members">
    
    <div class="filter-box">
    </div>

    <div style="display:flex; padding:5px;">
    <label style="padding-top:18px;">By Name</label>
    <input type="text" id="nameInput" onkeyup="namefilter()" placeholder="Search for names.." title="Type in a name" style="background-position: 10px 10px; background-repeat: no-repeat; width: 50vw; font-size: 16px; padding: 12px 20px 12px 40px; border: 1px solid #ddd; margin-bottom: 12px; margin-top:5px; margin-left:5px;">
    </div>

    <div style="display:flex; padding:5px;">
    <label style="padding-top:18px;">By Status</label>
    <input type="text" id="statusInput" onkeyup="statusfilter()" placeholder="Search for status.." title="Type in a name" style="background-position: 10px 10px; background-repeat: no-repeat; width: 50vw; font-size: 16px; padding: 12px 20px 12px 40px; border: 1px solid #ddd; margin-bottom: 12px; margin-top:5px; margin-left:5px;">
    </div>

    <div style="display:flex; padding:5px;">
    <label style="padding-top:18px;">By Date</label>
    <input type="date" id="dateInput" onkeyup="datefilter()" title="Type in a name" style="background-position: 10px 10px; background-repeat: no-repeat; width: 20vw; font-size: 16px; padding: 12px 20px 12px 40px; border: 1px solid #ddd; margin-bottom: 12px; margin-top:5px; margin-left:5px;">
    <button onclick="datefilter()" style="border:none; padding-right:45px; padding-left:45px; height:47px; margin:5px;">search</button>
    </div>


        <div class="table">
            <table class="customers" id="myTable">
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Full Name</th>
                    <th>Telegram Username</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Image</th>
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

                $sql = "SELECT ID,NAME,TELEGRAM,INVITE,PHONE,GENDER,LOCATION,DATE,T1,T2,T3,OTHERS,image_url,status from tablename";
                $result = $conn-> query($sql);


                if($result-> num_rows > 0){
                    $counter = 1;

                    while($row = $result-> fetch_assoc()){
                        echo"<tr><td>".$counter."</td><td><a href='user.php?id=".$row["ID"]."'><img class='image-edit' src='../image-upload/uploads/".$row["image_url"]."'></a></td><td>".$row["NAME"]."</td><td><a href='https://t.me/".$row["TELEGRAM"]."'>".$row["TELEGRAM"]."</a></td>";
                        echo"<td>".$row["DATE"]."</td>";
                        if(strlen($row["status"]) == 6){
                            echo"<td style ='color:green;'>".$row["status"]."</td>";
                        }
                        else{
                            
                            echo"<td style='color:red;'>".$row["status"]."</td>";
                        };
                        
                        
                        echo "<td><a href='update_page_1.php?id=".$row["ID"] ."' class='update'>Edit</a></td><td><a href='../image-upload/index.php?id=".$row["ID"] ."' class='update'>Upload/Edit</a></td></tr>";
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

    <script>
function namefilter() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("nameInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function statusfilter() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("statusInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if ((txtValue.toUpperCase().indexOf(filter) == 0) ) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function datefilter() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("dateInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


</script>
</body>
</html>