<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="refresh" content="3;index.php">
</head>
<body>
<h3>Applying Fix... System will reboot momentarilly... Redirecting to monitoring page.</h3>
	<?php
	exec('bash -c "exec nohup setsid /nvezos/scripts/gpu/fixgpu.sh > /dev/null 2>&1 &"');		
	?>  
</body>
</html>
