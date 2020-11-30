<?php
$email = $_POST['email'];
$phone = $_POST['phone'];
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hospital";
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if($conn->connect_error){
    echo "$conn->connect_error";
    
  } else {
    $stmt = $conn->prepare("insert into contact(email, phone) values(?, ?)");
    $stmt->bind_param("ss", $email, $phone);
    $execval = $stmt->execute();
    echo $execval;
    
  //echo '<script language="javascript">';
  //echo 'alert(Filled succesfully)';  //not showing an alert box.
  //echo '</script>';
     echo "<h1>Sent Successfully! Thank you"." ".$email.", We will contact you shortly!</h1>";
     echo( "<button onclick= \"location.href='index.html'\">Back to Home</button>"); 
    
   
    $stmt->close();
    $conn->close();
  }
  
  
?>