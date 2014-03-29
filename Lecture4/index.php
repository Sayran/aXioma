<?php

if( isPost() ){
// $start_number = $_POST['startNumber'];
// $add_number = $_POST['addNumber'];
// $second_number = $_POST['endNumber'];
// multiply($second_number);
	$start_number = $_POST['startNumber'];
	$add_number = $_POST['addNumber'];
	$second_number = $_POST['endNumber'];
		if(isNumeric($start_number, $add_number, $second_number)){

			lessThan($start_number);
			$temp = 1;
			multiply($second_number,$temp);
			soloNumber($add_number);
		}	
		else{
	 	echo " Sorry, some value seems to be NOT numeric !";
	 	}
}
function isPost()	{
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' &&
	 ("" != trim($_POST['startNumber'])) &&
	 ("" != trim($_POST['endNumber'])) &&
     ("" != trim($_POST['addNumber'])))
	{
		echo " Yeeay, it's true : -)". "<br>";
	return true;
	}
	else{
		echo "Haaaha - it's wrong ^^,";
	}
		return false;
}
function multiply ($number,$temp){
	$temp *=$number;
	 if ($number < 2 && $number > 0) { 
	 		echo $temp;
            return 1; 
        } 
        else { 
            return ($number * multiply($number-1,$temp)); 
        }

}
function isNumeric ($start_number,$second_number,$add_number){
	if(is_numeric($start_number) 
		&& is_numeric($second_number) 
		&& is_numeric($add_number)){
		return true;
	}
	else{
		 echo "Sorry, but some value is not numeric"."<br>";
		return false;
	}
}
function lessThan ($first_field){
	while($first_field >=0){
		echo $first_field . " ";
		$first_field--;
	}
	echo '<br>';
}
function soloNumber ($third_field){
	if($third_field <= 9 && $third_field >=0){
		echo '<br>' . $third_field . ' in ascii ==> ' . ord($third_field);
	}
	else{
		echo '<br>'. "Your nuber is not simple" . '<br>';
	}
}


?>

<html>
	<head>
	</head>
	<body>
		<form method = "post" action = "">
		Start number :<br>
		<input type = "text" name = "startNumber"/><br>
		End number: <br>
		<input type = "text" name = "endNumber"/><br>
		Add by: <br>
		<input type = "text" name = "addNumber"/><br>
		<input type = "submit" value = "Count" name = "send">	
	</body>
</html>