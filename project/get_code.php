<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $project);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

// get the form data
$fname = $_POST['firstname'];
$mname = $_POST['middlename'];
$lname = $_POST['lastname'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$address = $_POST['address'];

// generate a one time code
$code = uniqid();

// insert the data into the table
$sql = "INSERT INTO project.`basic` (code, firstname, middlename, lastname, mobile, gender, age, address) VALUES ('$code', '$fname', '$mname', '$lname', '$mobile', '$gender', '$age', '$address')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>