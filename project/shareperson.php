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

// query the database for the matching record
$sql = "SELECT * FROM project.`personal` WHERE mobile = '$mobile'";

$result = $conn->query($sql);

// start the HTML document
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<style>";

// add some CSS styles
echo "body {background-image: url('bg.jpg'); background-size: cover;}";
echo "table {border-collapse: collapse; width: 50%; margin: auto;}";
echo "th, td {border: 1px solid black; padding: 10px; text-align: left;}";
echo "th {background-color: #4CAF50; color: white;}";
echo "tr:nth-child(even) {background-color: #f2f2f2;}";
echo "</style>";
echo "</head>";
echo "<body>";

if ($result->num_rows > 0) {
  // output the data of the record in a table
  $row = $result->fetch_assoc();
  echo "<h1>Information for Mobile Number: $mobile</h1>";
  echo "<table>";
  echo "<tr><th>First name</th><td>" . $row["firstname"] . "</td></tr>";
  echo "<tr><th>Middle name</th><td>" . $row["middlename"] . "</td></tr>";
  echo "<tr><th>Last name</th><td>" . $row["lastname"] . "</td></tr>";
  echo "<tr><th>Mobile</th><td>" . $row["mobile"] . "</td></tr>";
  echo "<tr><th>Gender</th><td>" . $row["gender"] . "</td></tr>";
  echo "<tr><th>Age</th><td>" . $row["age"] . "</td></tr>";
  echo "<tr><th>Address</th><td>" . $row["address"] . "</td></tr>";
  echo "</table>";

        echo "<a href='edit.php?mobile=$mobile' class='button'>Edit</a>";

} else {
  echo "<h1>No record found</h1>";
}

// end the HTML document
echo "</body>";
echo "</html>";

$conn->close();
?>