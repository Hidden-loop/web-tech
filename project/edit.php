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

// get the mobile from the URL
$mobile = $_GET['mobile'];

// check if the form is submitted
if (isset($_POST['submit'])) {
  // get the updated data from the form
  $fname = $_POST['firstname'];
  $mname = $_POST['middlename'];
  $lname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $address = $_POST['address'];

  // update the data in the database
  $sql = "UPDATE project.`basic` SET firstname = '$fname', middlename = '$mname', lastname = '$lname', gender = '$gender', age = '$age', address = '$address' WHERE mobile = '$mobile'";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

} else {
  // query the database for the current data
  $sql = "SELECT * FROM project.`basic` WHERE mobile = '$mobile'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // get the data of the record
    $row = $result->fetch_assoc();
    // display the data in a form
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<style>";
    // add some CSS styles
    echo "table {border-collapse: collapse; width: 50%; margin: auto;}";
    echo "th, td {border: 1px solid black; padding: 10px; text-align: left;}";
    echo "th {background-color: #4CAF50; color: white;}";
    echo "tr:nth-child(even) {background-color: #f2f2f2;}";
    echo ".button {background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;}";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Edit Information for Mobile Number: $mobile</h1>";
    echo "<form action='edit.php?mobile=$mobile' method='post'>";
    echo "<table>";
    echo "<tr><th>First name</th><td><input type='text' name='firstname' value='" . $row["firstname"] . "'></td></tr>";
    echo "<tr><th>Middle name</th><td><input type='text' name='middlename' value='" . $row["middlename"] . "'></td></tr>";
    echo "<tr><th>Last name</th><td><input type='text' name='lastname' value='" . $row["lastname"] . "'></td></tr>";
    echo "<tr><th>Gender</th><td><input type='radio' name='gender' value='Male' " . ($row["gender"] == 'Male' ? 'checked' : '') . ">Male<input type='radio' name='gender' value='Female' " . ($row["gender"] == 'Female' ? 'checked' : '') . ">Female</td></tr>";
    echo "<tr><th>Age</th><td><input type='number' name='age' value='" . $row["age"] . "'></td></tr>";
    echo "<tr><th>Address</th><td><input type='text' name='address' value='" . $row["address"] . "'></td></tr>";
    echo "</table>";
    // add a button to submit the form
    echo "<button type='submit' name='submit' class='button'>Save Changes";
    echo "</button>";
    echo "</form>";
    echo "</body>";
    echo "</html>";
    } else {
    echo "No record found";
    }
    }

    $conn->close();
?>