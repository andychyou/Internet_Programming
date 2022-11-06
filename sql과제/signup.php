<html>
<body>

<?php


 
$userid = $_GET["id"];
$pword = $_GET["password"];
$email = $_GET["email"];
$ad = $_GET["address"];
$phone = $_GET["phone"];
$school = $_GET["school"];
$major = $_GET["major"];
$interests ='';
foreach ($_GET['interests'] as $temp){
    $interests .= $temp.' ';
}
//show results
echo "<h2> CSE20181210 Query Results:</h2>";
echo "ID : "  ;
echo $userid;
echo "<br>";
echo "Password : "  ;
echo $pword ;
echo "<br>";
echo "Email : "  ;
echo $email;
echo "<br>";
echo "Address : " ;
echo "<br>";
echo $ad ;
echo "Phone : " ;
echo $phone ;
echo "<br>";
echo "School : " ;
echo $school ;
echo "<br>";
echo "Major : "  ;
echo $major;
echo "Interests : "  ;
echo $interests;
echo "<br>";


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
if ( $conn->query( "DESCRIBE `MyGuests`" ) ) {
    echo "Table exists";
    $dup = checkDup();
    if($dup == 0){
        insertSQL();
    }
    else{
        echo "cannot insert due to duplicate";
    }
}

else{
    $sql = "CREATE TABLE MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        userid VARCHAR(30) NOT NULL,
        pword VARCHAR(30) NOT NULL,
        email VARCHAR(30) ,
        ad VARCHAR(30) ,
        phone VARCHAR(30) ,
        school VARCHAR(30) ,
        major VARCHAR(30) ,
        interests VARCHAR(100) ,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    
    insertSQL();
}




$conn->close();


function insertSQL(){
    global $userid ;
    global $pword;
    global $email ;
    global  $ad ;
    global $phone ;
    global $school ;
    global $major ;
    global $interests;
    global $conn;
    $sql = "INSERT INTO MyGuests (userid, pword, email, ad, phone, school, major, interests)
    VALUES ('$userid', '$pword', '$email', '$ad', '$phone', '$school', '$major', '$interests')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    return;
}

function checkDup(){
    global $userid ;
    global $pword;
    global $email ;
    global  $ad ;
    global $phone ;
    global $school ;
    global $major ;
    global $interests;
    global $conn;

    $sql = "SELECT userid FROM MyGuests WHERE userid = '$userid';";

    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["userid"]. "<br>";
        }
        return -1;
      } 
    else {
        return 0;
    }
        
   
}
?>

</body>
</html>
