<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="refresh" content="2;settings.php">
</head>
<body>
<h3>Saving Miner Setup... Redirecting back to Settings page...</h3>
<?php
	$minername1 = $_POST['minername1'];
	$minername2 = $_POST['minername2'];
	$minername3 = $_POST['minername3'];
	$minername4 = $_POST['minername4'];
	$minername5 = $_POST['minername5'];
	$minername6 = $_POST['minername6'];
	$minername7 = $_POST['minername7'];
	$minername8 = $_POST['minername8'];
	$minername9 = $_POST['minername9'];
	$minername10 = $_POST['minername10'];
	$minertype1 = $_POST['minertype1'];
	$minertype2 = $_POST['minertype2'];
	$minertype3 = $_POST['minertype3'];
	$minertype4 = $_POST['minertype4'];
	$minertype5 = $_POST['minertype5'];
	$minertype6 = $_POST['minertype6'];
	$minertype7 = $_POST['minertype7'];
	$minertype8 = $_POST['minertype8'];
	$minertype9 = $_POST['minertype9'];
	$minertype10 = $_POST['minertype10'];
	$minercommand1 = $_POST['minercommand1'];
	$minercommand2 = $_POST['minercommand2'];
	$minercommand3 = $_POST['minercommand3'];
	$minercommand4 = $_POST['minercommand4'];
	$minercommand5 = $_POST['minercommand5'];
	$minercommand6 = $_POST['minercommand6'];
	$minercommand7 = $_POST['minercommand7'];
	$minercommand8 = $_POST['minercommand8'];
	$minercommand9 = $_POST['minercommand9'];
	$minercommand10 = $_POST['minercommand10'];
	$minerpage1 = $_POST['minerpage1'];
	$minerpage2 = $_POST['minerpage2'];
	$minerpage3 = $_POST['minerpage3'];
	$minerpage4 = $_POST['minerpage4'];
	$minerpage5 = $_POST['minerpage5'];
	$minerpage6 = $_POST['minerpage6'];
	$minerpage7 = $_POST['minerpage7'];
	$minerpage8 = $_POST['minerpage8'];
	$minerpage9 = $_POST['minerpage9'];
	$minerpage10 = $_POST['minerpage10'];
	
	file_put_contents('/nvezos/set/miners/minername1.set', "".$minername1."\n");
	file_put_contents('/nvezos/set/miners/minername2.set', "".$minername2."\n");
	file_put_contents('/nvezos/set/miners/minername3.set', "".$minername3."\n");
	file_put_contents('/nvezos/set/miners/minername4.set', "".$minername4."\n");
	file_put_contents('/nvezos/set/miners/minername5.set', "".$minername5."\n");
	file_put_contents('/nvezos/set/miners/minername6.set', "".$minername6."\n");
	file_put_contents('/nvezos/set/miners/minername7.set', "".$minername7."\n");
	file_put_contents('/nvezos/set/miners/minername8.set', "".$minername8."\n");
	file_put_contents('/nvezos/set/miners/minername9.set', "".$minername9."\n");
	file_put_contents('/nvezos/set/miners/minername10.set', "".$minername10."\n");
	file_put_contents('/nvezos/set/miners/minertype1.set', "".$minertype1."\n");
	file_put_contents('/nvezos/set/miners/minertype2.set', "".$minertype2."\n");
	file_put_contents('/nvezos/set/miners/minertype3.set', "".$minertype3."\n");
	file_put_contents('/nvezos/set/miners/minertype4.set', "".$minertype4."\n");
	file_put_contents('/nvezos/set/miners/minertype5.set', "".$minertype5."\n");
	file_put_contents('/nvezos/set/miners/minertype6.set', "".$minertype6."\n");
	file_put_contents('/nvezos/set/miners/minertype7.set', "".$minertype7."\n");
	file_put_contents('/nvezos/set/miners/minertype8.set', "".$minertype8."\n");
	file_put_contents('/nvezos/set/miners/minertype9.set', "".$minertype9."\n");
	file_put_contents('/nvezos/set/miners/minertype10.set', "".$minertype10."\n");
	file_put_contents('/nvezos/set/miners/minercommand1.set', "".$minercommand1."\n");
	file_put_contents('/nvezos/set/miners/minercommand2.set', "".$minercommand2."\n");
	file_put_contents('/nvezos/set/miners/minercommand3.set', "".$minercommand3."\n");
	file_put_contents('/nvezos/set/miners/minercommand4.set', "".$minercommand4."\n");
	file_put_contents('/nvezos/set/miners/minercommand5.set', "".$minercommand5."\n");
	file_put_contents('/nvezos/set/miners/minercommand6.set', "".$minercommand6."\n");
	file_put_contents('/nvezos/set/miners/minercommand7.set', "".$minercommand7."\n");
	file_put_contents('/nvezos/set/miners/minercommand8.set', "".$minercommand8."\n");
	file_put_contents('/nvezos/set/miners/minercommand9.set', "".$minercommand9."\n");
	file_put_contents('/nvezos/set/miners/minercommand10.set', "".$minercommand10."\n");
	file_put_contents('/nvezos/set/miners/minerpage1.set', "".$minerpage1."\n");
	file_put_contents('/nvezos/set/miners/minerpage2.set', "".$minerpage2."\n");
	file_put_contents('/nvezos/set/miners/minerpage3.set', "".$minerpage3."\n");
	file_put_contents('/nvezos/set/miners/minerpage4.set', "".$minerpage4."\n");
	file_put_contents('/nvezos/set/miners/minerpage5.set', "".$minerpage5."\n");
	file_put_contents('/nvezos/set/miners/minerpage6.set', "".$minerpage6."\n");
	file_put_contents('/nvezos/set/miners/minerpage7.set', "".$minerpage7."\n");
	file_put_contents('/nvezos/set/miners/minerpage8.set', "".$minerpage8."\n");
	file_put_contents('/nvezos/set/miners/minerpage9.set', "".$minerpage9."\n");
	file_put_contents('/nvezos/set/miners/minerpage10.set', "".$minerpage10."\n");
	
	file_put_contents('/nvezos/scripts/miners/miner1.sh', '#!/bin/bash'."\n".
		'/bin/cp -rf /nvezos/set/miners/minerpage1.set /nvezos/set/status/poolurl.data'."\n".
		'echo "yes" > /nvezos/set/miners/1status.set'."\n". 
		$minercommand1.' &>> /nvezos/logs/miner1.log'."\n");
	file_put_contents('/nvezos/scripts/miners/miner2.sh', '#!/bin/bash'."\n".
		'/bin/cp -rf /nvezos/set/miners/minerpage2.set /nvezos/set/status/poolurl.data'."\n".
		'echo "yes" > /nvezos/set/miners/2status.set'."\n". 
		$minercommand2.' &>> /nvezos/logs/miner2.log'."\n");
	file_put_contents('/nvezos/scripts/miners/miner3.sh', '#!/bin/bash'."\n".
		'/bin/cp -rf /nvezos/set/miners/minerpage3.set /nvezos/set/status/poolurl.data'."\n".
		'echo "yes" > /nvezos/set/miners/3status.set'."\n". 
		$minercommand3.' &>> /nvezos/logs/miner3.log'."\n");
	file_put_contents('/nvezos/scripts/miners/miner4.sh', '#!/bin/bash'."\n".
		'/bin/cp -rf /nvezos/set/miners/minerpage4.set /nvezos/set/status/poolurl.data'."\n".
		'echo "yes" > /nvezos/set/miners/4status.set'."\n". 
		$minercommand4.' &>> /nvezos/logs/miner4.log'."\n");
	file_put_contents('/nvezos/scripts/miners/miner5.sh', '#!/bin/bash'."\n".
		'/bin/cp -rf /nvezos/set/miners/minerpage5.set /nvezos/set/status/poolurl.data'."\n".
		'echo "yes" > /nvezos/set/miners/5status.set'."\n".
		$minercommand5.' &>> /nvezos/logs/miner5.log'."\n");
	file_put_contents('/nvezos/scripts/miners/miner6.sh', '#!/bin/bash'."\n".
		'/bin/cp -rf /nvezos/set/miners/minerpage6.set /nvezos/set/status/poolurl.data'."\n".
		'echo "yes" > /nvezos/set/miners/6status.set'."\n". 
		$minercommand6.' &>> /nvezos/logs/miner6.log'."\n");
	file_put_contents('/nvezos/scripts/miners/miner7.sh', '#!/bin/bash'."\n".
		'/bin/cp -rf /nvezos/set/miners/minerpage7.set /nvezos/set/status/poolurl.data'."\n".
		'echo "yes" > /nvezos/set/miners/7status.set'."\n". 
		$minercommand7.' &>> /nvezos/logs/miner7.log'."\n");
	file_put_contents('/nvezos/scripts/miners/miner8.sh', '#!/bin/bash'."\n".
		'/bin/cp -rf /nvezos/set/miners/minerpage8.set /nvezos/set/status/poolurl.data'."\n". 
		'echo "yes" > /nvezos/set/miners/8status.set'."\n". 
		$minercommand8.' &>> /nvezos/logs/miner8.log'."\n");
	file_put_contents('/nvezos/scripts/miners/miner9.sh', '#!/bin/bash'."\n".
		'/bin/cp -rf /nvezos/set/miners/minerpage9.set /nvezos/set/status/poolurl.data'."\n".
		'echo "yes" > /nvezos/set/miners/9status.set'."\n". 
		$minercommand9.' &>> /nvezos/logs/miner9.log'."\n");
	file_put_contents('/nvezos/scripts/miners/miner10.sh', '#!/bin/bash'."\n".
		'/bin/cp -rf /nvezos/set/miners/minerpage10.set /nvezos/set/status/poolurl.data'."\n".
		'echo "yes" > /nvezos/set/miners/10status.set'."\n". 
		$minercommand10.' &>> /nvezos/logs/miner10.log'."\n");
	exec('chmod +x /nvezos/scripts/miners/miner1.sh');
	exec('chmod +x /nvezos/scripts/miners/miner2.sh');
	exec('chmod +x /nvezos/scripts/miners/miner3.sh');
	exec('chmod +x /nvezos/scripts/miners/miner4.sh');
	exec('chmod +x /nvezos/scripts/miners/miner5.sh');
	exec('chmod +x /nvezos/scripts/miners/miner6.sh');
	exec('chmod +x /nvezos/scripts/miners/miner7.sh');
	exec('chmod +x /nvezos/scripts/miners/miner8.sh');
	exec('chmod +x /nvezos/scripts/miners/miner9.sh');
	exec('chmod +x /nvezos/scripts/miners/miner10.sh');
?>
</body>
</html>
