<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="refresh" content="1;index.php">
</head>
<body>
<h3>Saving Settings... Redirecting to Monitoring Page...</h3>
	<?php 
		$refreshinterval = $_POST['refreshinterval'];
		file_put_contents('/nvezos/set/status/refreshint.set', $refreshinterval);
	?>
</body>
</html>