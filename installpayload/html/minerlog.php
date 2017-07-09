<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="refresh" content="3">
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
	Miner Log -  
	<?php
	echo exec('hostname');
	?>
    </title>
</head>
<body>
<center><h4>Current miner.log output</h4><br><br>
<?php 
exec('tail -n 10 /nvezos/logs/miner.log > /nvezos/set/status/consoleoutput.set');
echo exec('sed -n 1p /nvezos/set/status/consoleoutput.set'); ?><br>
<?php echo exec('sed -n 2p /nvezos/set/status/consoleoutput.set'); ?><br>
<?php echo exec('sed -n 3p /nvezos/set/status/consoleoutput.set'); ?><br>
<?php echo exec('sed -n 4p /nvezos/set/status/consoleoutput.set'); ?><br>
<?php echo exec('sed -n 5p /nvezos/set/status/consoleoutput.set'); ?><br>
<?php echo exec('sed -n 6p /nvezos/set/status/consoleoutput.set'); ?><br> 
<?php echo exec('sed -n 7p /nvezos/set/status/consoleoutput.set'); ?><br> 
<?php echo exec('sed -n 8p /nvezos/set/status/consoleoutput.set'); ?><br> 
<?php echo exec('sed -n 9p /nvezos/set/status/consoleoutput.set'); ?><br> 
<?php echo exec('sed -n 10p /nvezos/set/status/consoleoutput.set'); ?><br>
</center>
</body>
</html> 
