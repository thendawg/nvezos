<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
	Welcome to NvEZOS
    </title>
</head>
<body>
<center><h4>Activating</h4><br><br>
<?php
$password = $_POST['password'];
$passwordconf = $_POST['passwordconf'];
if ($password == $passwordconf) {
	exec('echo "miner:'.$password.'" | sudo chpasswd');
	echo 'Completing initialization...';
}
else {
	echo 'Passwords do not match or you elected not to set password, if you intended to set a password, do it via ssh after reboot, completing initialization...';
}
exec('/nvezos/scripts/system/initialize.sh');
?>
<br>
</center>
</body>
</html> 
