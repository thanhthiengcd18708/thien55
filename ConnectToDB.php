<!DOCTYPE html>
<html>
<body>

<h1>TABLE OF INFORMATION PRODUCT </h1>
	<link rel="stylesheet" type="text/css" href="Login.css">

<?php
ini_set('display_errors', 1);
echo "ATN COMPANY !";
?>

<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     echo '<p>The DB exists</p>';
     echo getenv("dbname");
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=

ec2-34-197-188-147.compute-1.amazonaws.com

;port=5432;user=bvztajjyxcwfgb;password=95afa25f8872b3a2bf6cd1f19c1e74a4148450363e9bcecdc61a254a208ed85e;dbname=d4s6q2430j68ed",
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

$sql = "SELECT * FROM product";
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
echo '<p>Product Information </p>';

?>
<p>Sort Table Rows by Clicking on the Table Headers - Ascending and Descending (jQuery)</p>
<div class="container">
	
	<div class="table">
		<div class="table-header">
			<div class="header__item"><a id="productid" class="filter__link" href="#">Product ID</a></div>
			<div class="header__item"><a id="name" class="filter__link filter__link--number" href="#">Name</a></div>
			<div class="header__item"><a id="Price" class="filter__link filter__link--number" href="#">Price</a></div>
		</div>
	</div>
</div>
      <?php
             foreach ($resultSet as $row) {
      ?>
   
      <tr>
        <td scope="row"><?php echo $row['productid'] ?></td>
        <td><?php echo $row['productname'] ?></td>
        <td><?php echo $row['price'] ?></td>
      </tr>
     
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
