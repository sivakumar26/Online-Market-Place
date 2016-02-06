<?php
extract( $_POST);
$servername = "localhost";
$username = "saikris1_user";
$password = "onlineMarketPlace";
$dbname = "saikris1_onlineMarketPlace";
$conn = new mysqli($servername, $username, $password, $dbname);	

$sql = "select p.owner, p.title, p.desc, p.lnk, p.cost, p.productid as product_info_id, t.productid as tracking_product_info_id from tracking t, product_info p where p.productid=t.productid and p.owner='".$id."' group by p.productid order by count(*) desc limit 5";

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