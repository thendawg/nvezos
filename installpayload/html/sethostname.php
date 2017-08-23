<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="refresh" content="3;networksettings.php">
</head>
<body>
<h3>Hostname Saved... Redirecting back to Network Settings in 3 seconds, you must restart the miner to complete this operation.</h3>
	<?php
		$newhostname = $_POST['hostname'];
		exec('sudo hostnamectl set-hostname '.$newhostname.'');

	?>  
</body>
</html>
