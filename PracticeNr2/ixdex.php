<?php 
$second = true;
/*	$fisrt_number = $_POST['startNumber'];
	$second_number = $_POST['endNumber'];
	$added_value = $_POST['addNumber'];
	$result;

	if(is_numeric($fisrt_number) && is_numeric($second_number) && is_numeric($added_value))
	{
		for($fisrt_number; $fisrt_number <= $second_number ; $fisrt_number ++)
		{
			$result = $fisrt_number + $added_value;
			echo $fisrt_number . " added by " . $added_value . " = " . $result . '<br>';
		}
	}
	else
	{
		echo " Sorry, some value is not number !";
	}*/

$users = array("users" => 
			 array("Andrew " =>' Sileckij' ,
			 "sindrey" => 'foo', 
			 "Artur" => 'Petjukevich')
		 	  );

$counter  = count($users);
$var = 1;



?>

<html>
	<head>
		<title>PHP TSI</title>
	</head>
	<body>
		<?php if($second == false):?>
		<form method="post" action="">
			Start number:<br>
			<input type="text" name="startNumber"/><br>
			End number: <br>
			<input type="text" name="endNumber"/><br>
			Add by:<br>
			<input type="text" name="addNumber"/><br>
			<input type="submit" value="go!">
			<?php endif;?>
		<?php foreach($users['users'] as $key => $value): ?>
		
			<?php echo "Name " . $key . " Surname " . $value . " <br>";
			$var++;?>
		<?php endforeach; ?>
	</body>
</html>
