<?php

$connection = mysqli_connect(
			$config['db']['server'],
			$config['db']['username'],
			$config['db']['password'],
			$config['db']['name']
	);

// $db = new PDO('mysql:host=mysql.hostinger.ru;dbname=u356462689_iroks', 'u356462689_admin', '814iroks15TheBest03');

if ( $connection == false )
{
	echo 'Не вдалося з"єднатись із Базою данних!<br>';
	// echo mysqli_connect_error();
	exit();
}
?>
