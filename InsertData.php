<!DOCTYPE html>
<html>
    <head>
<title>Insert data to PostgreSQL with php - creating a simple web application</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {
list-style: none;
}
</style>
</head>
<body>
<h1>INSERT DATA TO DATABASE</h1>
<h2>Enter data into student table</h2>
<ul>
    <form name="InsertData" action="InsertData.php" method="POST" >
<li>product ID:</li><li><input type="text" name="productID" /></li>
<li>produc tname:</li><li><input type="text" name="productname" /></li>
<li>size:</li><li><input type="text" name="size" /></li>
<li>basicprice:</li><li><input type="text" name="basicprice" /></li>
<li>residual:</li><li><input type="text" name="residual" /></li>
<li><input type="submit" /></li>
</form>
</ul>

<?php

if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
                "host=

ec2-52-200-48-116.compute-1.amazonaws.com
;port=5432;user=hzxvtahusyfeii;password=0ec932d437daae6077be3cfbf510fc7b03c0de67d7fa93bbcf8f560d65ea9c51;dbname=dasohfkqs080jg",
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
        . " VALUES('$_POST[productid]','$_POST[productname]','$_POST[size]','$_POST[basicprice]','$_POST[residual]'";
$stmt = $pdo->prepare($sql);
//$stmt->execute();
 if (is_null($_POST[StudentID])) {
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
