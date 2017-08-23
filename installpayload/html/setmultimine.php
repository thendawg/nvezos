<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="refresh" content="2;settings.php">
</head>
<body>
<h3>Saving Settings... Redirecting to Settings Page...</h3>
	<?php 
		$multiswitch = $_POST['multiswitch'];
		file_put_contents('/nvezos/set/multimine/multimine.set', $multiswitch);
		if ($multiswitch=="enabled") {
			file_put_contents('/nvezos/set/multimine/switch.set', "checked");
			file_put_contents('/nvezos/set/multimine/switchno.set', "");
		}
		elseif ($multiswitch=="disabled") {
			file_put_contents('/nvezos/set/multimine/switch.set', "");
			file_put_contents('/nvezos/set/multimine/switchno.set', "checked");
		}
		else {
			echo 'Error!';
		}	
	?>
</body>
</html>