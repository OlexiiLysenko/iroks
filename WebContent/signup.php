<?php
	require "db_rb.php";

	$data = $_POST;
	if( isset($data['do_signup']) )
	{
		//registration;
		$errors = array();
		if( trim($data['login']) == '')
		{
			$errors[] = 'Enter your Login!';
		}
		if( trim($data['email']) == '')
		{
			$errors[] = 'Enter your Email!';
		}
		if( $data['password'] == '')
		{
			$errors[] = 'Enter your Password!';
		}
		if( $data['password_2'] != $data['password'])
		{
			$errors[] = 'Incorrect second password!';
		}
		if( R::count('admins', "login = ?", array($data['login'])) > 0 )
		{
			$errors[] = 'User with such login is already exists!';
		}
		if( R::count('admins', "email = ?", array($data['email'])) > 0 )
		{
			$errors[] = 'User with such email is already exists!';
		}
		if ( empty($errors) )
		{
			// it`s ok - let`s register this user
			$user = R::dispense('admins');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
			echo '<div style="color: blue;">You`re successfully registred!</div><hr>';
		}else
		{
			echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
		}
	}
?>

<form action="/signup.php" method="POST">
	
	<p>
		<p><strong>Your Login</strong></p>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>

	<p>
		<p><strong>Your Email</strong></p>
		<input type="email" name="email" value="<?php echo @$data['email']; ?>">
	</p>

	<p>
		<p><strong>Your Password</strong></p>
		<input type="password" name="password" value="<?php echo @$data['password']; ?>">
	</p>

	<p>
		<p><strong>Your Password once more</strong></p>
		<input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>">
	</p>
	<p>
		<button type="submit" name="do_signup">Register</button>
	</p>

</form>