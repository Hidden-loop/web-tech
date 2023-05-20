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
$lname = $_POST['lastname'];
$dadname = $_POST['dadname'];
$momname = $_POST['momname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$bloodgroup = $_POST['bloodgroup'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$address = $_POST['address'];
$qualification = $_POST['qualification'];
$hobbies = $_POST['hobbies'];



// insert the data into the table
$sql = "INSERT INTO project.`personal`(firstname, lastname, dadname, momname, email, mobile, gender, dob, bloodgroup, weight, height, address, qualification, hobbies) VALUES ( '$fname', '$lname','$dadname', '$momname,' '$email', '$mobile', '$gender', '$dob', '$bloodgroup', '$weight', '$height', '$address', '$qualification', '$hobbies')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// store the code and name in the session array
$_SESSION['name'] = $fname;

$conn->close();
?>