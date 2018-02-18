
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dbms";


$stockn=$_POST['stockn'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO stock(name,quantityinstock,price) VALUES('$stockn', $quantity, $price)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<div>
<font size="2">Add Stock or New Buyer details <a href="buyerstock.html">click here</a></font>
</div>
