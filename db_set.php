

<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


$servername = "localhost";
$username = "root";
$db = "test";  // Your tb name 
$password = "";



$Tables_in_ = "Tables_in_".$db; // do not change this

// Create connection
$conn = new mysqli($servername, $username, $password ,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "SHOW FULL TABLES";
$result = $conn->query($sql1);

while($row = $result->fetch_assoc()) {
	
	//echo "<pre>"; print_r($row);
	//die;
	$sql2 = "DESCRIBE ".$row[$Tables_in_]."";
$result2 = $conn->query($sql2);

while($row2 = $result2->fetch_assoc()) { 
	//echo "<pre>"; print_r($row2);
	
	$sql3 = "ALTER TABLE ".$row[$Tables_in_]." MODIFY ".$row2['Field']." INT AUTO_INCREMENT PRIMARY KEY";
$conn->query($sql3);	
	$sql4 = "ALTER TABLE ".$row[$Tables_in_]." MODIFY COLUMN ".$row2['Field']." INT auto_increment";
$conn->query($sql4);
	echo "done <br>";
}
	
}


?>