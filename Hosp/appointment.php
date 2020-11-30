<?php
$name = $_POST['name'];
$email = $_POST['email'];
$day = $_POST['day'];
$time = $_POST['time'];
$doctor = $_POST['doctor'];
$message = $_POST['message'];
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hospital";
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if($conn->connect_error){
    echo "$conn->connect_error";
    
  } else {
    $stmt = $conn->prepare("insert into Appointment(name, email, day, time, doctor, message) values(?, ?, ?, ?,?,?)");
    $stmt->bind_param("ssssss", $name, $email, $day, $time, $doctor, $message);
    $execval = $stmt->execute();
    echo $execval;
    
  //echo '<script language="javascript">';
  //echo 'alert(Appointment booked succesfully)';  //not showing an alert box.
  //echo '</script>';
     echo "<h1>Sent Successfully! Thank you"." ".$name.", We will contact you shortly!</h1>";
     echo( "<button onclick= \"location.href='index.html'\">Back to Home</button>"); 
    
   
    $stmt->close();
    $conn->close();
  }
  
  
?>