<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="refresh" content="2;index.php">
</head>
<body>
<h3>Stopping all miner(s)... Starting selected miner(s)... Redirecting to Monitoring Page...</h3>
<?php
	$multimine = exec('cat /nvezos/set/multimine/multimine.set');
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
	if ($multimine=='disabled') {
		$minerenswitch = $_POST['minerenswitch'];
		if ($minerenswitch=='miner1') {
			file_put_contents('/nvezos/set/miners/miner1en.set', "checked");
			exec('/nvezos/scripts/miners/stopall.sh');
			exec('sudo systemctl enable miner1.service');
			exec('sudo systemctl start miner1.service');
		}
		elseif ($minerenswitch=='miner2') {
			file_put_contents('/nvezos/set/miners/miner2en.set', "checked");
			exec('/nvezos/scripts/miners/stopall.sh');
			exec('sudo systemctl enable miner2.service');
			exec('sudo systemctl start miner2.service');
		}
		elseif ($minerenswitch=='miner3') {
			file_put_contents('/nvezos/set/miners/miner3en.set', "checked");
			exec('/nvezos/scripts/miners/stopall.sh');
			exec('sudo systemctl enable miner3.service');
			exec('sudo systemctl start miner3.service');
		}
		elseif ($minerenswitch=='miner4') {
			file_put_contents('/nvezos/set/miners/miner4en.set', "checked");
			exec('/nvezos/scripts/miners/stopall.sh');
			exec('sudo systemctl enable miner4.service');
			exec('sudo systemctl start miner4.service');
		}
		elseif ($minerenswitch=='miner5') {
			file_put_contents('/nvezos/set/miners/miner5en.set', "checked");
			exec('/nvezos/scripts/miners/stopall.sh');
			exec('sudo systemctl enable miner5.service');
			exec('sudo systemctl start miner5.service');
		}
		elseif ($minerenswitch=='miner6') {
			file_put_contents('/nvezos/set/miners/miner6en.set', "checked");
			exec('/nvezos/scripts/miners/stopall.sh');
			exec('sudo systemctl enable miner6.service');
			exec('sudo systemctl start miner6.service');
		}
		elseif ($minerenswitch=='miner7') {
			file_put_contents('/nvezos/set/miners/miner7en.set', "checked");
			exec('/nvezos/scripts/miners/stopall.sh');
			exec('sudo systemctl enable miner7.service');
			exec('sudo systemctl start miner7.service');
		}
		elseif ($minerenswitch=='miner8') {
			file_put_contents('/nvezos/set/miners/miner8en.set', "checked");
			exec('/nvezos/scripts/miners/stopall.sh');
			exec('sudo systemctl enable miner8.service');
			exec('sudo systemctl start miner8.service');
		}
		elseif ($minerenswitch=='miner9') {
			file_put_contents('/nvezos/set/miners/miner9en.set', "checked");
			exec('/nvezos/scripts/miners/stopall.sh');
			exec('sudo systemctl enable miner9.service');
			exec('sudo systemctl start miner9.service');
		}
		elseif ($minerenswitch=='miner10') {
			file_put_contents('/nvezos/set/miners/miner10en.set', "checked");
			exec('/nvezos/scripts/miners/stopall.sh');
			exec('sudo systemctl enable miner10.service');
			exec('sudo systemctl start miner10.service');
		}
		elseif ($minerenswitch=='devminer') {
			file_put_contents('/nvezos/set/miners/devmineren.set', "checked");
			exec('/nvezos/scripts/miners/stopall.sh');
			exec('sudo systemctl enable minerdev.service');
			exec('sudo systemctl start minerdev.service');
		}
		else {
			echo 'Error!';
		}
	}
	elseif($multimine=='enabled') {
		$minerenswitchmulti1 = $_POST['minerenswitchmulti1'];
		$minerenswitchmulti2 = $_POST['minerenswitchmulti2'];
		$minerenswitchmulti3 = $_POST['minerenswitchmulti3'];
		$minerenswitchmulti4 = $_POST['minerenswitchmulti4'];
		$minerenswitchmulti5 = $_POST['minerenswitchmulti5'];
		$minerenswitchmulti6 = $_POST['minerenswitchmulti6'];
		$minerenswitchmulti7 = $_POST['minerenswitchmulti7'];
		$minerenswitchmulti8 = $_POST['minerenswitchmulti8'];
		$minerenswitchmulti9 = $_POST['minerenswitchmulti9'];
		$minerenswitchmulti10 = $_POST['minerenswitchmulti10'];
		$minerenswitchmultidev = $_POST['minerenswitchmultidev'];
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
		exec('/nvezos/scripts/miners/stopall.sh');
			if ($minerenswitchmulti1=='on') {
				file_put_contents('/nvezos/set/miners/miner1multien.set', "checked");
				exec('sudo systemctl enable miner1.service');
				exec('sudo systemctl start miner1.service');
			}
			if ($minerenswitchmulti2=='on') {
				file_put_contents('/nvezos/set/miners/miner2multien.set', "checked");
				exec('sudo systemctl enable miner2.service');
				exec('sudo systemctl start miner2.service');
			}
			if ($minerenswitchmulti3=='on') {
				file_put_contents('/nvezos/set/miners/miner3multien.set', "checked");
				exec('sudo systemctl enable miner3.service');
				exec('sudo systemctl start miner3.service');
			}
			if ($minerenswitchmulti4=='on') {
				file_put_contents('/nvezos/set/miners/miner4multien.set', "checked");
				exec('sudo systemctl enable miner4.service');
				exec('sudo systemctl start miner4.service');
			}
			if ($minerenswitchmulti5=='on') {
				file_put_contents('/nvezos/set/miners/miner5multien.set', "checked");
				exec('sudo systemctl enable miner5.service');
				exec('sudo systemctl start miner5.service');
			}
			if ($minerenswitchmulti6=='on') {
				file_put_contents('/nvezos/set/miners/miner6multien.set', "checked");
				exec('sudo systemctl enable miner6.service');
				exec('sudo systemctl start miner6.service');
			}
			if ($minerenswitchmulti7=='on') {
				file_put_contents('/nvezos/set/miners/miner7multien.set', "checked");
				exec('sudo systemctl enable miner7.service');
				exec('sudo systemctl start miner7.service');
			}
			if ($minerenswitchmulti8=='on') {
				file_put_contents('/nvezos/set/miners/miner8multien.set', "checked");
				exec('sudo systemctl enable miner8.service');
				exec('sudo systemctl start miner8.service');
			}
			if ($minerenswitchmulti9=='on') {
				file_put_contents('/nvezos/set/miners/miner9multien.set', "checked");
				exec('sudo systemctl enable miner9.service');
				exec('sudo systemctl start miner9.service');
			}
			if ($minerenswitchmulti10=='on') {
				file_put_contents('/nvezos/set/miners/miner10multien.set', "checked");
				exec('sudo systemctl enable miner10.service');
				exec('sudo systemctl start miner10.service');
			}
			if ($minerenswitchmultidev=='on') {
				file_put_contents('/nvezos/set/miners/devminermultien.set', "checked");
				exec('sudo systemctl enable minerdevmulti.service');
				exec('sudo systemctl start minerdevmulti.service');
			}
	}
	else {
		echo 'Error - MultiMine Is likely not set to enabled or disabled, set to one or the other on the Settings page and try again.';
	}
	?>
</body>
</html>
			
			