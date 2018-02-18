<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "dbms");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$name=$_POST['name'];
$addr=$_POST['addr'];

if($stmt = $mysqli->prepare("INSERT INTO customer(name,mobileno) VALUES (?,?)")){
$stmt->bind_param("ss", $name, $addr);
$stmt->execute();
}

if ($stmt = $mysqli->prepare("SELECT id FROM customer WHERE name=? and mobileno=?")) {

    /* bind parameters for markers */
    $stmt->bind_param("ss", $name, $addr);

    /* execute query */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($id);

    /* fetch value */
    $stmt->fetch();

    printf("%s registered your unique id is %d\n", $name, $id);
    /* close statement */
    $stmt->close();
}

?>
<br>
<div>
<font size="2">Go back <a href="customer.html">click here</a></font>
</div>
