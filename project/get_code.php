<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

// start a session
session_start();

// get the form data
$fname = $_POST['firstname'];
$mname = $_POST['middlename'];
$lname = $_POST['lastname'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$address = $_POST['address'];


// insert the data into the table
$sql = "INSERT INTO project.`basic` (firstname, middlename, lastname, mobile, gender, age, address) VALUES ( '$fname', '$mname', '$lname', '$mobile', '$gender', '$age', '$address')";

if ($conn->query($sql) === TRUE) {
  header("Location: http://localhost/dashboard/basic.html");
  // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// store the code and name in the session array
$_SESSION['name'] = $fname;

$conn->close();
?>