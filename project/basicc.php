<?php
// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "myDB";

// // Create connection
// $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// // Set the PDO error mode to exception
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $name = $_POST["name"];
// $middlename = $_POST["middlename"];
// $lastname = $_POST["lastname"];
// $mobile = $_POST["mobile"];
// $gender = $_POST["gender"];
// $age = $_POST["age"];
// $address = $_POST["address"];

// INSERT INTO users (firstname, middlename, lastname, mobile, gender, age, address) VALUES (:name, :middlename, :lastname, :mobile, :gender, :age, :address)

// // prepare sql and bind parameters
// $stmt = $conn->prepare("INSERT INTO users (firstname, middlename, lastname, mobile, gender, age, address) VALUES (:name, :middlename, :lastname, :mobile, :gender, :age, :address)");
// $stmt->bindParam(':name', $name);
// $stmt->bindParam(':middlename', $middlename);
// $stmt->bindParam(':lastname', $lastname);
// $stmt->bindParam(':mobile', $mobile);
// $stmt->bindParam(':gender', $gender);
// $stmt->bindParam(':age', $age);
// $stmt->bindParam(':address', $address);

// // execute the prepared statement
// $stmt->execute();
// echo "New record created successfully";
?> 



<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_info";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// get the code from the URL
$code = $_GET['code'];

// query the database for the matching record
$sql = "SELECT * FROM user_info WHERE code = '$code'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output the data of the record
  $row = $result->fetch_assoc();
  echo "First name: " . $row["firstname"] . "<br>";
  echo "Middle name: " . $row["middlename"] . "<br>";
  echo "Last name: " . $row["lastname"] . "<br>";
  echo "Mobile: " . $row["mobile"] . "<br>";
  echo "Gender: " . $row["gender"] . "<br>";
  echo "Age: " . $row["age"] . "<br>";
  echo "Address: " . $row["address"] . "<br>";
} else {
  echo "No record found";
}

$conn->close();
?>