<!DOCTYPE html>
<html>
<head>
	<title>Insert product</title>
	<link rel="stylesheet" type="text/css" href="Login.css">
<body>
    <form class="box" action="InsertData.php" method="post">
		<h1>Insert Product</h1>
		<input class="signup" type="text" name="productid" placeholder="Product id">
		<input class="signup" type="text" name="productname" placeholder="Product name">
		<input class="signup" type="text" name="price" placeholder="Price">
		<input class="signup" type="submit" name="" value="Submit">
	        <div class= "home">    <li> <a href="index.php" >Home</a></li> </div>
	
    </div>
	</form> 
	

</body>
</html>


<?php

if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
               "host=

ec2-34-197-188-147.compute-1.amazonaws.com

;port=5432;user=bvztajjyxcwfgb;password=95afa25f8872b3a2bf6cd1f19c1e74a4148450363e9bcecdc61a254a208ed85e;dbname=d4s6q2430j68ed",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

if($pdo === false){
     echo "ERROR: Could not connect Database";
}


$sql = "INSERT INTO product(productid, productname,price)"
        . " VALUES('$_POST[productid]','$_POST[productname]','$_POST[price]')";
$stmt = $pdo->prepare($sql);
//$stmt->execute();
 if (is_null($_POST[productid])) {
   echo "productid must be not null";
 }
 else
 {
    if($stmt->execute() == TRUE){
        echo "Record inserted successfully.";
    } else {
        echo "Error inserting record: ";
    }
 }
?>
</body>
</html>
