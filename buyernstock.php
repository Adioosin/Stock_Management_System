
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dbms";

$id=$_POST['id'];
$stockn=$_POST['sname'];
$quantity=$_POST['quantity'];
$amount=$_POST['price'];

$date=$_POST['date'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO buyerstock(buyer_id,stockname,quantitybought,costprice,buying_date) VALUES($id,'$stockn', $quantity, $amount, '$date')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$result= $conn->query("select count(*) AS count from stock where name = '$stockn';");
$row = $result->fetch_assoc();

if($row['count']>0){
	$result= $conn->query("select quantityinstock from stock where name = '$stockn';");
$row = $result->fetch_assoc();
$qnt=$quantity+$row['quantityinstock'];
$result= $conn->query("UPDATE `stock` SET quantityinstock=$qnt where name='shampoo'");
}
else{?>
<br>
	New Stock Item bought please add details of the new stock by clicking <a href="buyerstock.html">here</a>
	<?php
}

$conn->close();
?>

