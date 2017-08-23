<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
<h3>Miner is restarting, please reconnect after reboot</h3>
				<?php
				$restartconf = $_POST['confirmation'];
				if ($restartconf == "restart") { 
					exec('bash -c "exec nohup setsid /nvezos/scripts/system/restart.sh > /dev/null 2>&1 &"'); 
					echo "<h4> Miner will reboot momentarilly... Redirecting to monitoring page. </h4>";
								}
				else { echo "<h4> Confirmation Check Failed, System will not be restarted... </h4>"; }
				?>
</body>
</html>
