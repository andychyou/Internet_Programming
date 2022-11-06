<html>
<body>

<?php
echo "<h2> CSE20181210 Query Results:</h2>";
echo "ID : "  ;
echo $_GET["id"];
echo "<br>";
echo "Password : "  ;
echo $_GET["password"] ;
echo "<br>";
echo "Email : "  ;
echo $_GET["email"];
echo "<br>";
echo "Address : " ;
echo $_GET["address"] ;
echo "Phone : " ;
echo $_GET["phone"] ;
echo "<br>";
echo "School : " ;
echo $_GET["school"] ;
echo "<br>";

echo "Major : "  ;
echo $_GET["major"];

echo "Interests : "  ;
// if(!empty($_GET["TOEIC"])){
//     echo $_GET["TOEIC"];
// }
// if(!empty($_GET["TOFEL"])){
//     echo $_GET["TOFEL"];

// }
// if(!empty($_GET["TEPS"])){
//     echo $_GET["TEPS"];

// }
// if(!empty($_GET["IELTS"])){
//     echo $_GET["IELTS"];

// }
// if(!empty($_GET["PTE"])){
//     echo $_GET["PTE"];

// }
$name = $_GET['interest'];
foreach ($name as $interest){
    echo $interest."&nbsp";
}
echo "<br>";


?>

</body>
</html>
