<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="refresh" content="3;index.php">
</head>
<body>				 
<h3>Changing Password... Please standby...</h3>
<br>You will be redirected to the monitoring page momentarilly to login with your new password.
<?php
	$newpw = $_POST['newpw'];
	$pwconf = $_POST['pwconf'];
	if ($newpw == $pwconf) {
	exec('echo '.$newpw.' | htpasswd -c -i /nvezos/set/password/passwords miner');	
	}
	else { echo "Password change failed - Passwords do not match"; }	 
?>	
</body>
</html>
