<?php

require "db_rb.php";

$data = $_POST;
if( isset($data['do_login']) )
{
	$errors = array();
	$user = R::findOne( 'admins', 'login = ?', array($data['login']) );
	if( $user  )
	{
		// login exists
		if( password_verify($data['password'], $user->password))
		{
			// it`s ok, let`s login this user and redirect to the admin_panel;
			$_SESSION['logged_user'] = $user;
			$_SESSION["auth"] = "YES";
			
			header('Location: /admin_panel.php');
		}else
		{
			$errors[] = 'Wrong password, try again!';
			$_SESSION["auth"] = "NO";
		}
	}else
	{
		$errors[] = 'Wrong login, please, try again!';
	}
	if ( ! empty($errors) )
		{
			// show first error from array errors;
		echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
			
		}

}

?>

<form action="login.php" method="POST">

	<p>
		<p><strong>Login</strong></p>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>
	<p>
		<p><strong>Password</strong></p>
		<input type="password" name="password" value="<?php echo @$data['password']; ?>">
	</p>
	<p>
		<button type="submit" name="do_login">Enter</button>
	</p>
</form>