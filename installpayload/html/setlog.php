<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="refresh" content="2;index.php">
</head>
<body>
<h3>Setting log output... Redirecting to Monitoring Page...</h3>
<?php
	$WhichLog = $_POST['WhichLog'];
	file_put_contents('/nvezos/set/status/logset1.set', "");
	file_put_contents('/nvezos/set/status/logset2.set', "");
	file_put_contents('/nvezos/set/status/logset3.set', "");
	file_put_contents('/nvezos/set/status/logset4.set', "");
	file_put_contents('/nvezos/set/status/logset5.set', "");
	file_put_contents('/nvezos/set/status/logset6.set', "");
	file_put_contents('/nvezos/set/status/logset7.set', "");
	file_put_contents('/nvezos/set/status/logset8.set', "");
	file_put_contents('/nvezos/set/status/logset9.set', "");
	file_put_contents('/nvezos/set/status/logset10.set', "");
	file_put_contents('/nvezos/set/status/logsetdev.set', "");
	if ($WhichLog=='miner1') {
		file_put_contents('/nvezos/set/status/minerloglocation.set', "miner1.log");
		file_put_contents('/nvezos/set/status/logset1.set', "selected");
	}
	elseif ($WhichLog=='miner2') {
		file_put_contents('/nvezos/set/status/minerloglocation.set', "miner2.log");
		file_put_contents('/nvezos/set/status/logset2.set', "selected");
	}
	elseif ($WhichLog=='miner3') {
		file_put_contents('/nvezos/set/status/minerloglocation.set', "miner3.log");
		file_put_contents('/nvezos/set/status/logset3.set', "selected");
	}
	elseif ($WhichLog=='miner4') {
		file_put_contents('/nvezos/set/status/minerloglocation.set', "miner4.log");
		file_put_contents('/nvezos/set/status/logset4.set', "selected");
	}
	elseif ($WhichLog=='miner5') {
		file_put_contents('/nvezos/set/status/minerloglocation.set', "miner5.log");
		file_put_contents('/nvezos/set/status/logset5.set', "selected");
	}
	elseif ($WhichLog=='miner6') {
		file_put_contents('/nvezos/set/status/minerloglocation.set', "miner6.log");
		file_put_contents('/nvezos/set/status/logset6.set', "selected");
	}
	elseif ($WhichLog=='miner7') {
		file_put_contents('/nvezos/set/status/minerloglocation.set', "miner7.log");
		file_put_contents('/nvezos/set/status/logset7.set', "selected");
	}
	elseif ($WhichLog=='miner8') {
		file_put_contents('/nvezos/set/status/minerloglocation.set', "miner8.log");
		file_put_contents('/nvezos/set/status/logset8.set', "selected");
	}
	elseif ($WhichLog=='miner9') {
		file_put_contents('/nvezos/set/status/minerloglocation.set', "miner9.log");
		file_put_contents('/nvezos/set/status/logset9.set', "selected");
	}
	elseif ($WhichLog=='miner10') {
		file_put_contents('/nvezos/set/status/minerloglocation.set', "miner10.log");
		file_put_contents('/nvezos/set/status/logset10.set', "selected");
	}
	elseif ($WhichLog=='minerdev') {
		file_put_contents('/nvezos/set/status/minerloglocation.set', "minerdev.log");
		file_put_contents('/nvezos/set/status/logsetdev.set', "selected");
	}
	else {
		echo 'Error! Invalid Selection!';
	}
?>
</body>
</html>
	