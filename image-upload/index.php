<?php
include "db_conn.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "SELECT * from tablename where ID = $id";
$result = $conn-> query($sql);




$row = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Image Upload Using PHP</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}


		.hide{
		display : none;
		}

		input{
		width:100%;
		height:80px;
		scale:2;
		display:block;
		}


		input[type=file]::file-selector-button {
		border:solid 2px black;
		height:80px;
		background-color:lightblue;
		padding-left:50px;
		padding-right:50px;
		font-size:20px;
		}

		input[type=file]::file-selector-button:hover {
		background-color: #81ecec;
		border: 2px solid #00cec9;
		border-radius:5px;
		}

		.select-photo{
		margin-bottom:150px;}

	</style>
</head>
<body>
	<?php if (isset($_GET['error']));?>
		<p><?php echo $_GET['error']; ?></p>
	
     <form action="../image-upload/upload.php"
           method="post"
           enctype="multipart/form-data">

		   <input type="text" name="ID" value="<?php echo $row['ID'];?>" class="hide">

           <input class="select-photo" type="file" 
                  name="my_image">

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>
</body>
</html>