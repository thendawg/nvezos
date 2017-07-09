<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
	Stopping Services -  
	<?php
	echo exec('hostname');
	?>
    </title>
</head>
<body>
<center><h3>Stopping All Miner Services...</h3><br><br>
<?php 
exec('/nvezos/scripts/miners/stopall.sh');
?>
<br>
</center>
</body>
</html> 
