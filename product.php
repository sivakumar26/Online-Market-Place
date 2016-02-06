<?php
$ch = curl_init("http://sivakumarweb.com/userjson.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$jsonvalue=curl_exec($ch);
curl_close($ch);
$json_php = json_decode($jsonvalue,true);

$ch2 = curl_init("http://www.saikrishnanonline.com/userjson.php");
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
$jsonvalue2=curl_exec($ch2);
curl_close($ch2);
$json_php2 = json_decode($jsonvalue2,true); 

$ch3 = curl_init("http://www.koushikram.com/userjson.php");
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
$jsonvalue3=curl_exec($ch3);
curl_close($ch3);
$json_php3 = json_decode($jsonvalue3,true);

$ch4 = curl_init("http://abhisheksjsu.com/userjson.php");
curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
$jsonvalue4=curl_exec($ch4);
curl_close($ch4);
$json_php4 = json_decode($jsonvalue4,true);

$ch5 = curl_init("http://venka272tname.fatcow.com/userjson.php");
curl_setopt($ch5, CURLOPT_RETURNTRANSFER, 1);
$jsonvalue5=curl_exec($ch5);
curl_close($ch5);
$json_php5 = json_decode($jsonvalue5,true);

$ch6 = curl_init("http://vigneshramkumar.com/userjson.php");
curl_setopt($ch6, CURLOPT_RETURNTRANSFER, 1);
$jsonvalue6=curl_exec($ch6);
curl_close($ch6);
$json_php6 = json_decode($jsonvalue6,true);

$servername = "localhost";
$username = "saikris1_user";
$password = "onlineMarketPlace";
$dbname = "saikris1_onlineMarketPlace";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

for($i=0;$i<9;$i++)
{
$sql = "INSERT INTO product_info VALUES ('Sivakumar', 'siva0$i','".$json_php[$i]['title']."','". $json_php[$i]['desc']."','".$json_php[$i]['lnk']."','".$json_php[$i]['cost']."')";

	if ($conn->query($sql) === TRUE) {
    echo "json $i from sivakumar web has been stored in database"."<br>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}	
for($i=0;$i<10;$i++)
{
$sql2 = "INSERT INTO product_info VALUES ('Saikrishnan', 'sai0$i','".$json_php2[$i]['title']."','". $json_php2[$i]['desc']."','".$json_php2[$i]['lnk']."','".$json_php2[$i]['cost']."')";
if ($conn->query($sql2) === TRUE) {
    echo "json $i from saikrishnan online has been stored in database"."<br>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
for($i=0;$i<10;$i++)
{
$sql3 = "INSERT INTO product_info VALUES ('Koushikram', 'ktk0$i','".$json_php3[$i]['title']."','". $json_php3[$i]['desc']."','".$json_php3[$i]['lnk']."','".$json_php3[$i]['cost']."')";
if ($conn->query($sql3) === TRUE) {
    echo "json $i from koushik has been stored in database"."<br>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
for($i=0;$i<10;$i++)
{
$sql4 = "INSERT INTO product_info VALUES ('Abhisekh', 'abh0$i','".$json_php4[$i]['title']."','". $json_php4[$i]['desc']."','".$json_php4[$i]['lnk']."','".$json_php4[$i]['cost']."')";
if ($conn->query($sql4) === TRUE) {
    echo "json $i from Abhishek has been stored in database"."<br>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
for($i=0;$i<10;$i++)
{
$sql5 = "INSERT INTO product_info VALUES ('Venkat', 'ven0$i','".$json_php5[$i]['title']."','". $json_php5[$i]['desc']."','".$json_php5[$i]['lnk']."','".$json_php5[$i]['cost']."')";
if ($conn->query($sql5) === TRUE) {
    echo "json $i from venkata has been stored in database"."<br>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
for($i=0;$i<10;$i++)
{
$sql6 = "INSERT INTO product_info VALUES ('Vignesh', 'vig0$i','".$json_php6[$i]['title']."','". $json_php6[$i]['desc']."','".$json_php6[$i]['lnk']."','".$json_php6[$i]['cost']."')";
if ($conn->query($sql6) === TRUE) {
    echo "json $i from Vignesh has been stored in database"."<br>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
	

$conn->close();

?>