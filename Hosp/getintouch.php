<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hospital";
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if($conn->connect_error){
    echo "$conn->connect_error";
    
  } else {
    $stmt = $conn->prepare("insert into GIT(name, email, phone, subject, message) values(?, ?, ?,?,?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);
    $execval = $stmt->execute();
    echo $execval;
    
  //echo '<script language="javascript">';
  //echo 'alert(You've contacted us succesfully)';  //not showing an alert box.
  //echo '</script>';
     echo "<h1>Sent Successfully! Thank you"." ".$name."</h1>";
     echo( "<button onclick= \"location.href='index.html'\">Back to Home</button>"); 
    
   
    $stmt->close();
    $conn->close();
  }
  
  
?>