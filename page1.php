<!DOCTYPE html>
<head>
<title>Insert data to PostgreSQL with php - creating a simple web application</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
</head>
<body>
<h2>Enter information regarding book</h2>
<ul>
<form name="insert" action="book.php" method="POST" >
<li>Book ID:</li><li><input type="text" name="bookid" /></li>
<li>Author:</li><li><input type="text" name="author" /></li>
<li>Publisher:</li><li><input type="text" name="publisher" /></li>
<li>Date of publication:</li><li><input type="text" name="dop" /></li>
<li>Price (USD):</li><li><input type="text" name="price" /></li>
<li><input type="submit" /></li>
<br><br>
<select>
	<option>Book 1</option>
	<?php 
	$db = pg_connect("host=localhost port=5432 dbname=training user=postgres password=have@tript0Singapore");
	$ret = pg_query($db,"select * from M_GROUP_OFFICE");
	while($row = pg_fetch_row($ret)){
	    echo "<option>Use " .$row[1] ."</option>";
	}
	?>
</select>
</form>
</ul>
</body>
</html>
<?php

// $query = "INSERT INTO book VALUES ('".$_POST["bookid"]."',
// '".$_POST["author"]."','".$_POST["publisher"]."',to_date('".$_POST["dop"]."','dd/MM/yyyy'),
// '".$_POST["price"]."')";
// var_dump($query);
// $result = pg_query($query); 

?>
