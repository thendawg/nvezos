<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="refresh" content="2;settings.php">
</head>
<body>
<h3>Stopping All Miner Services... Redirecting back...</h3><br><br>
<?php 
exec('/nvezos/scripts/miners/stopall.sh');
file_put_contents('/nvezos/set/miners/miner1en.set', "");
file_put_contents('/nvezos/set/miners/miner2en.set', "");
file_put_contents('/nvezos/set/miners/miner3en.set', "");
file_put_contents('/nvezos/set/miners/miner4en.set', "");
file_put_contents('/nvezos/set/miners/miner5en.set', "");
file_put_contents('/nvezos/set/miners/miner6en.set', "");
file_put_contents('/nvezos/set/miners/miner7en.set', "");
file_put_contents('/nvezos/set/miners/miner8en.set', "");
file_put_contents('/nvezos/set/miners/miner9en.set', "");
file_put_contents('/nvezos/set/miners/miner10en.set', "");
file_put_contents('/nvezos/set/miners/devmineren.set', "");
file_put_contents('/nvezos/set/miners/miner1multien.set', "");
file_put_contents('/nvezos/set/miners/miner2multien.set', "");
file_put_contents('/nvezos/set/miners/miner3multien.set', "");
file_put_contents('/nvezos/set/miners/miner4multien.set', "");
file_put_contents('/nvezos/set/miners/miner5multien.set', "");
file_put_contents('/nvezos/set/miners/miner6multien.set', "");
file_put_contents('/nvezos/set/miners/miner7multien.set', "");
file_put_contents('/nvezos/set/miners/miner8multien.set', "");
file_put_contents('/nvezos/set/miners/miner9multien.set', "");
file_put_contents('/nvezos/set/miners/miner10multien.set', "");
file_put_contents('/nvezos/set/miners/devminermultien.set', "");
?>
<br>
</body>
</html> 
