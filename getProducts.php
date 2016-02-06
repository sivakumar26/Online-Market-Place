<?php
extract( $_POST);
$servername = "localhost";
$username = "saikris1_user";
$password = "onlineMarketPlace";
$dbname = "saikris1_onlineMarketPlace";
$conn = new mysqli($servername, $username, $password, $dbname);	

$sql = "SELECT * FROM product_info WHERE owner='".$id."'";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo $row["title"]."~".$row["desc"]."~".$row["lnk"]."~".$row["cost"]."|";
    	}
}
$conn->close();

?>