<?php 
$mathArray = array("+", "-", "*", "/");
$firstNmbr = $_GET['firstNumber'];
$secondNmbr = $_GET['secondNumber'];
$sgn = $_GET['sign'];
if (($firstNmbr != '') && ($sgn != '')  && ($secondNmbr!=''))
{
	if(is_numeric($firstNmbr)) 
	{
	
	if(is_numeric($secondNmbr))
		{
			if(in_array($sgn, $mathArray))
			{
				switch($sgn){
					case '+':
				{
						echo ($firstNmbr + $secondNmbr);
						break;
				}
					case '-':
				{
						echo ($firstNmbr - $secondNmbr);
						break;
				}
					case '*':
				{
						echo ($firstNmbr * $secondNmbr);
						break;
				}
					case '/':
				{
						if($secondNmbr != 0){
						echo ($firstNmbr / $secondNmbr);
						}
						else{
						echo "you cant devide on Zero";
						}
						break;
				}
				default: echo "Wrong math sign";
				}
			}
		}
	}
 }
?>
<html>
	<head>
		<title>PHP TSI</title>
	</head>
	<body>
		<form method="get" action="">
			First number:<br>
			<input type="text" name="firstNumber"/><br>
			Math sign: <br>
			<input type="text" name="sign"/><br>
			Second number:<br>
			<input type="text" name="secondNumber"/><br>
			<input type="submit" value="calculate">
	</body>
</html>
