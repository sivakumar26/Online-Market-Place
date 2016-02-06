<?php
extract( $_POST);
$servername = "localhost";
$username = "saikris1_user";
$password = "onlineMarketPlace";
$dbname = "saikris1_onlineMarketPlace";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM USER_DATA WHERE EMAIL_ID = '".$emailId."'";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "true";
}
else {
$sql = "INSERT INTO `USER_DATA` VALUES ('".$emailId."','".$fname."','".$lname."','".$password1."')";
$result = $conn->query($sql);
echo "false";
}
$conn->close();
?>