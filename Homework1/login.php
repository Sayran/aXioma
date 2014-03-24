<?php 
define ( 'SITE_ENABLED' , true);
define ( 'SITE_LOGGED_IN' , false);

if (SITE_ENABLED == true) {

$accountArray = array("sayran" => '27121198',"sindrey" => 'foo' , "bar" => 'foobar');
		
	if (isset($_POST['send']) && (($user_login != '')  && ($user_password!='')))
	{	
		$user_login = $_POST['login'];
		$user_password = $_POST['password'];
		echo $user_password .'<br>';
		$user_encrypted_password = md5($user_password);
		echo $user_encrypted_password .'<br>';
		echo $user_login .'<br>';
		echo md5($accountArray[$user_login]);
		if(in_array($user_login, $accountArray, true))
			{
				echo '$accountArray[$user_login]';
				if ($user_encrypted_password == md5($accountArray[$user_login]))
				{
					echo 'Hello ' . htmlspecialchars($_POST["login"]) . '!' . '<br>';
					echo $user_encrypted_password;
				}
			}
		else
		{
			echo "Hmm stange thing... It seams you have been mistaken..";
		}
		//echo 'Hello ' . htmlspecialchars($_POST["login"]) . '!' . '<br>';
	}
	else 
	{
		echo " Login and Password fields must NOT be empty !";
	}
	/*$msg = " 27121198 "; 
    $encrypted_text = md5 ($msg); 
    echo("<b>Plain Text : </b>"); 
    echo($msg); 
    echo("<p><b>Encrypted Text : </b>"); 
    echo($encrypted_text);	
*/
}
?>
<html>
	<head>
	</head>
	<body>
		<?php
		 if (SITE_ENABLED == true) : ?>	
		<form method = "post" action = "">
			Login :<br>
			<input type = "text" name = "login"/><br>
			Password: <br>
			<input type = "password" size = 10 maxlen = 16 name = "password"/><br>
			<input type = "submit" value = "Sign-in" name = "send">
		<?php else :?>
			Sorry, site is curently offline. Please be patient.
		<?php endif; ?>
		<?php if (SITE_LOGGED_IN == true): ?>
		<input type = "submit" value = "Log-out">
		<?php endif; ?>
	</body>
</html>

<!-- <html>

	<head>
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
		<script language = "javascript" ></script>
		<title>PHP TSI</title>
	</head>
	<body>
		<form method = "post" action = http://localhost/Homework1/login.php>
			Login :<br>
			<input type = "text" name = "login"/><br>
			Password: <br>
			<input type = "password" size = 8 maxlen = 16 name = "password"/><br>
			<input type = "submit" value = "Sign-in" name = "send">
			<input type = "submit" value = "Reset">
			<tr valign="top">
      			 <td align="right">Sorry, site is curently ofline. PLease be patient.</td>
   			</tr>
		</div>
		<div id="footer"></div>
	</body>
</html> -->