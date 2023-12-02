<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    $img = $_POST['img'];
    // Database connection
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

    // Prepare and bind statement
    $stmt = $conn->prepare("INSERT INTO tablename (NAME,TELEGRAM,INVITE,PHONE,GENDER,LOCATION,DATE,T1,T2,T3,OTHERS,image_url,status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)");
    $stmt->bind_param("sssssssssssss", $NAME, $TELEGRAM, $INVITE, $PHONE, $GENDER, $LOCATION, $DATE, $T1, $T2,$T3,$OTHERS,$img,$status);

    // Execute statement
    if ($stmt->execute()) {
        // Redirect to a success page after successful registration
        header("Location: Register.html",);
}
        // header("Location: spiritlife.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection

    
?>