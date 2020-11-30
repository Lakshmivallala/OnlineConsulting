<!DOCTYPE html>
<html>
<head>
<style>
  body {
    background:#ffe6e6;
    padding: 5%;
    
}
table {
  border-collapse: collapse;
  width: 100%;
}

table, th, td {
  border: 5px solid #black ;
  padding:25px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  background:#c9cad1;
}

th {
  height: 50px;
}
td {
  height: 50px;
  vertical-align: bottom;
}
th {
  background-color: black;
  color: white;
}
<div style="overflow-x:auto;">
</style>
</head>
<body>

<div class="header-top wow fadeIn">
            <div class="container">
               <a class="navbar-brand" href="index.html"><img src="images/close.png" width="250" height="250" alt="image"></a> 
               <h1> THIS PAGE DISPLAYS DOCTORS AVAILABLE FOR TODAY FROM A DATABASE:</h1>
               <br><br><br>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email,specialisation,qualification,experience, phone FROM drecords";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>name</th><th>email</th><th>specialisation</th><th>qualification</th><th>experience</th><th>phone</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td> " . $row["specialisation"]. "</td><td>". $row["qualification"]. "</td><td>" . $row["experience"]. "</td><td>" . $row["phone"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<br><br>