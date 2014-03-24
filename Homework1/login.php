<?php 
define ( 'SITE_ENABLED' , true);
$site_logged_in = false;
if (SITE_ENABLED == true) {

$accountArray = array("sayran" => '27121198',"sindrey" => 'foo' , "bar" => 'foobar');
		
	if (isset($_POST['send']))
	{	
		$user_login = $_POST['login'];
		$user_password = $_POST['password'];

		if (($user_login != '')  && ($user_password!=''))
		{
			$user_encrypted_password = md5($user_password);

			if(array_key_exists($user_login, $accountArray))
				{
					if ($user_encrypted_password === md5($accountArray[$user_login]))
					{
						echo '<br>' . 'Hello ' . htmlspecialchars($_POST["login"]) . '!' . '<br>';
						session_start();
						$_SESSION['username'] = $user_login;
						$site_logged_in = true;
					}
					else 
					{
						echo "Hmm... password is incorrect.. try one more time : )" . '<br>';
					}
				}
			else
			{
				echo "Hmm stange thing... It seams you have been mistaken..";
			}
		}
		else 
		{
			echo " Fields must NOT be empty !";
		}
	}
	else if (isset($_POST['send']) && (($user_login != '')  || ($user_password!='')))
	{
		echo " Login and Password fields must NOT be empty !";
	}

if ($site_logged_in = true) {
	session_start();
	if (isset($_POST['logout']))
	{
		unset($_SESSION['username']);
		session_destroy();
		$site_logged_in = false;
	}
	else
	{
		echo '<br>' . 'Hello ' . $_SESSION['username'] . '!' . '<br>';
	}
}
}

?>

<html>
	<head>
	</head>
	<body>
		<?php if ($site_logged_in == true): ?>
			<form method = "post" action = "">
			<input type = "submit" value = "Log-out" name = 'logout'>
			<a href="login.php">How about reloud your page ? </a>
			<?php endif; ?>
		<?php if (SITE_ENABLED == true && $site_logged_in == false) : ?>	
			<form method = "post" action = "">
			Login :<br>
			<input type = "text" name = "login"/><br>
			Password: <br>
			<input type = "password" size = 10 maxlen = 16 name = "password"/><br>
			<input type = "submit" value = "Sign-in" name = "send">
		<?php elseif (SITE_ENABLED == false):?>
			Sorry, site is curently offline. Please be patient.
		<?php endif; ?>
		
	</body>
</html>