<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<meta http-equiv="refresh" content="2;index.php">
<head>
</head>
<body>
<h3>Applying IP Settings... You will be directed back to the settings page where you can reboot the miner to apply IP changes.</h3>
	<?php
		$ipselection = $_POST['ipselector'];
		$subnetmask = $_POST['subnetmask'];
		$gateway = $_POST['gateway'];	
		$dns1 = $_POST['dns1'];
		$dns2 = $_POST['dns2'];
		$ip = $_POST['ipaddress'];
		$intname = exec('/nvezos/scripts/network/getinterface.sh');
		if ($ipselection == "static") {
			exec('sudo nmcli connection modify "'.$intname.'" connection.autoconnect yes ipv4.method manual ipv4.addr "'.$ip.'/'.$subnetmask.'" ipv4.dns "'.$dns1.', '.$dns2.'" ipv4.gateway "'.$gateway.'"');
									}
		elseif ($ipselection == "dhcp") {					
			exec('sudo nmcli connection modify "'.$intname.'" connection.autoconnect yes ipv4.method auto');
					      }
		else { echo "Something went wrong!"; }
	?> 
</body>
</html>
