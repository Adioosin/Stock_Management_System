<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "dbms");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$name=$_POST['name'];
$addr=$_POST['addr'];

if($stmt = $mysqli->prepare("INSERT INTO buyer(name,mobilenum) VALUES (?,?)")){
$stmt->bind_param("ss", $name, $addr);
$stmt->execute();
}

if ($stmt = $mysqli->prepare("SELECT id FROM buyer WHERE name=? and mobilenum=?")) {

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
<div>
<font size="2">Add Stock or New Buyer details <a href="buyerstock.html">click here</a></font>
</div>
