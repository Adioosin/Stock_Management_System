<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "dbms");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//$result= $conn->query("SELECT SUM(Total_Steps) AS value_sum FROM users");
//$selectSQL = 'SELECT * FROM `customer`';
 # Execute the SELECT Query
?>
<head>
  <title>Details In Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#e0e0e0;">
<div class="container">
<h2>Customer Details</h2>
<table class="table table-striped" border="2">
  <thead>
    <tr>
	  <th>id</th>
      <th>Name</th>
      <th>Mobile number</th>
    </tr>
  </thead>
  <tbody>
<?php
   $result= $mysqli->query("SELECT * FROM customer");
 while($row = $result->fetch_assoc()){
     echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['mobileno']}</td></tr>\n";
}
?>
 </tbody>
</table>
</div>
<!--Stock details-->

<div class="container">
<h2>Stocks</h2>
<table class="table table-striped" border="2">
  <thead>
    <tr>
	  <th>id</th>
      <th>Name</th>
      <th>Quantity</th>
	  <th>Price</th>
    </tr>
  </thead>
  <tbody>
<?php
   $result= $mysqli->query("SELECT * FROM stock");
 while($row = $result->fetch_assoc()){
     echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['quantityinstock']}</td><td>{$row['price']}</td></tr>\n";
}
?>
 </tbody>
</table>
</div>
<!--Selling details-->
<div class="container">
<h2>Selling Details</h2>
<table class="table table-striped" border="2">
  <thead>
    <tr>
	  <th>Bill no.</th>
	  <th>Customer Id</th>
      <th>Item</th>
      <th>Quantity</th>
	  <th>Total Amount</th>
	  <th>Paid Amounnt</th>
	  <th>Buying Date</th>
    </tr>
  </thead>
  <tbody>
<?php
   $result= $mysqli->query("SELECT * FROM customerstock");
 while($row = $result->fetch_assoc()){
     echo "<tr><td>{$row['bill_no']}</td><td>{$row['customer_id']}</td><td>{$row['stock_name']}</td><td>{$row['quantity']}</td><td>{$row['total_amount']}</td><td>{$row['paid_amount']}</td><td>{$row['buying_date']}</td></tr>\n";
}
?>
 </tbody>
</table>
</div>
</body>