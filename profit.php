<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "dbms");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$fromdate=$_POST["fromdate"];
$todate=$_POST["todate"];

 $result= $mysqli->query("SELECT costprice,price,quantity FROM `buyerstock`,`customerstock`,`stock` where name=stock_name and stock_name=stockname and customerstock.buying_date>='$fromdate' and customerstock.buying_date<'$todate';");
 $profit=0;
 while($row = $result->fetch_assoc()){
	$profit = $profit + ($row['price']-$row['costprice'])*$row['quantity'];
}
//echo $profit;
echo "<h1>TOTAL PROFIT BETWEEN $fromdate to $todate is: $profit</h1>";
?>
