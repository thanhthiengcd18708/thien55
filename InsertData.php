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
		<input class="signup" type="text" name="size" placeholder="Size">
		<input class="signup" type="text" name="basicprice" placeholder="Basic price">
		<input class="signup" type="text" name="residual" placeholder="Residual">
		<input class="signup" type="submit" name="" value="submit">
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

ec2-54-159-138-67.compute-1.amazonaws.com
;port=5432;user=rkrzoettivdipj;password=8ebcd42b31944fc146f96a2bd6ed4a0cabad45874d178c339f8d323b93b5a136;dbname=d54te445aufu0s",
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

//Khởi tạo Prepared Statement
//$stmt = $pdo->prepare('INSERT INTO student (stuid, fname, email, classname) values (:id, :name, :email, :class)');

//$stmt->bindParam(':id','SV03');
//$stmt->bindParam(':name','Ho Hong Linh');
//$stmt->bindParam(':email', 'Linhhh@fpt.edu.vn');
//$stmt->bindParam(':class', 'GCD018');
//$stmt->execute();
//$sql = "INSERT INTO student(stuid, fname, email, classname) VALUES('SV02', 'Hong Thanh','thanhh@fpt.edu.vn','GCD018')";
$sql = "INSERT INTO product(productid, productname,size, basicprice,residual)"
        . " VALUES('$_POST[productid]','$_POST[productname]','$_POST[size]','$_POST[basicprice]','$_POST[residual]')";
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
