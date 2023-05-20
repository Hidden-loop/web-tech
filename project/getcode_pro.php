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
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$state = $_POST['state'];
$country = $_POST['Country'];
$qualification = $_POST['qualification'];
$university = $_POST['university'];
$specialization = $_POST['specialization'];
$hobbies = $_POST['hobbies'];
$interests = $_POST['interests'];


// insert the data into the table
$sql = "INSERT INTO project.`pro`(firstname, middlename, lastname, email, mobile, gender, dob, address, state, country, qualification, university, specialization, hobbies, interests) VALUES ( '$fname', '$mname', '$lname', '$email','$mobile', '$gender', '$dob', '$address', '$state', '$country', '$qualification', '$university', '$specialization', '$hobbies', '$interests')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// store the code and name in the session array
$_SESSION['name'] = $fname;

$conn->close();
?>