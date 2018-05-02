<?php
$id = $_REQUEST['id'];

$object = array(
		"title" => "",
		"heading" => "",
		"body" => "",
		"submitted_at" => "",

		);

// database login stuff
$severname = "localhost";
$username = "homestead";
$password = "secret";

//creat connection
	$connection = new mysqli($severname, $username, $password);

// check for errors
	if ($connection ->connect_error){
		echo "Connection failed: " . $connection->connect_error;
		exit;
	}
		else {
			echo "Connected!";}

// connect to the rellative databse for project 
			$connection->select_db("fitl");
			
//query to select the object
			$sql = "SELECT * FROM question WHERE id = " . $id; // . operator used to join two stings php
			
//execute the quary
			$result = $connection->query($sql);

//check for and retrive result
			if ($result ->num_rows > 0){  // num rows = rows found
				$object = $result ->fetch_assoc(); 
				//echo "<pre>";		//<pre>  prints code nice and readable
				//print_r($object);   // print_r prints contents of array
				//echo "</pre>";
			}

?>


</!DOCTYPE html>
<html>
<head>
	<title><?php echo $object["title"]; ?></title>
	
</head>
<body>
	<h1><?php echo $object["heading"]; ?></h1>
	<p><?php echo $object["body"]; ?>
	<p><?php echo $object["submitted_at"]; ?>

	</p>
</body>
</html>