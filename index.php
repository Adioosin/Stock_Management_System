
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dbms";

$id=$_POST['id'];
$stockn=$_POST['stockn'];
$quantity=$_POST['quantity'];
$amount=$_POST['amount'];
$paidamt=$_POST['paidamt'];
$date=$_POST['date'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$result= $conn->query("select count(*) AS count from stock where name = '$stockn';");
$row = $result->fetch_assoc();

if($row['count']>0){
	$result= $conn->query("select quantityinstock from stock where name = '$stockn';");
$qnt = $result->fetch_assoc();
	if($qnt['quantityinstock']>$quantity){
	
	$sql = "INSERT INTO customerstock(customer_id,stock_name,quantity,total_amount,paid_amount,buying_date) VALUES($id,'$stockn', $quantity, $amount, $paidamt, '$date')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
	$result= $conn->query("select quantityinstock from stock where name = '$stockn';");
$row = $result->fetch_assoc();
$qnt=$row['quantityinstock']-$quantity;
$result= $conn->query("UPDATE `stock` SET quantityinstock=$qnt where name='$stockn'");
}
else{
	echo "Not enough quantity available\n";
}}
else{?>
<br>
	Item not in stock!
	<?php
}

$conn->close();
?>
<br>
<a href="index.html">click here </a> to go back
