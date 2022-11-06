<?php
$servername = "localhost";
$username = "cse20181210";
$password = "asdf1234";
$dbname = "db_cse20181210";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pword VARCHAR(30) NOT NULL,
email VARCHAR(30),
ad VARCHAR(30) NOT NULL,
phone VARCHAR(30) NOT NULL,
school VARCHAR(30) NOT NULL,
major VARCHAR(30) NOT NULL,
interests VARCHAR(30) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>