<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="refresh" content="2;index.php">
</head>
<body>
<h3>Applying Overclocking Settings... Redirecting to Monitoring Page...</h3>
	<?php
		$defaultusername = $_POST['defaultusername'];
		$ocswitch = $_POST['ocswitch'];
		$fanswitch = $_POST['fanswitch'];
		$plswitch = $_POST['plswitch'];
		$gpu0core = $_POST['gpu0core'];
		$gpu0mem = $_POST['gpu0mem'];
		$gpu0fan = $_POST['gpu0fan'];
		$gpu0pl = $_POST['gpu0pl'];
		$gpu1core = $_POST['gpu1core'];
		$gpu1mem = $_POST['gpu1mem'];
		$gpu1fan = $_POST['gpu1fan'];
		$gpu1pl = $_POST['gpu1pl'];
		$gpu2core = $_POST['gpu2core'];
		$gpu2mem = $_POST['gpu2mem'];
		$gpu2fan = $_POST['gpu2fan'];
		$gpu2pl = $_POST['gpu2pl'];
		$gpu3core = $_POST['gpu3core'];
		$gpu3mem = $_POST['gpu3mem'];
		$gpu3fan = $_POST['gpu3fan'];
		$gpu3pl = $_POST['gpu3pl'];
		$gpu4core = $_POST['gpu4core'];
		$gpu4mem = $_POST['gpu4mem'];
		$gpu4fan = $_POST['gpu4fan'];
		$gpu4pl = $_POST['gpu4pl'];
		$gpu5core = $_POST['gpu5core'];
		$gpu5mem = $_POST['gpu5mem'];
		$gpu5fan = $_POST['gpu5fan'];
		$gpu5pl = $_POST['gpu5pl'];
		$gpu6core = $_POST['gpu6core'];
		$gpu6mem = $_POST['gpu6mem'];
		$gpu6fan = $_POST['gpu6fan'];
		$gpu6pl = $_POST['gpu6pl'];
		$gpu7core = $_POST['gpu7core'];
		$gpu7mem = $_POST['gpu7mem'];
		$gpu7fan = $_POST['gpu7fan'];
		$gpu7pl = $_POST['gpu7pl'];
		$gpu0perf = $_POST['gpu0perf'];
		$gpu1perf = $_POST['gpu1perf'];
		$gpu2perf = $_POST['gpu2perf'];
		$gpu3perf = $_POST['gpu3perf'];
		$gpu4perf = $_POST['gpu4perf'];
		$gpu5perf = $_POST['gpu5perf'];
		$gpu6perf = $_POST['gpu6perf'];
		$gpu7perf = $_POST['gpu7perf'];
		$gpu8core = $_POST['gpu8core'];
		$gpu8mem = $_POST['gpu8mem'];
		$gpu8fan = $_POST['gpu8fan'];
		$gpu8pl = $_POST['gpu8pl'];
		$gpu9core = $_POST['gpu9core'];
		$gpu9mem = $_POST['gpu9mem'];
		$gpu9fan = $_POST['gpu9fan'];
		$gpu9pl = $_POST['gpu9pl'];
		$gpu10core = $_POST['gpu10core'];
		$gpu10mem = $_POST['gpu10mem'];
		$gpu10fan = $_POST['gpu10fan'];
		$gpu10pl = $_POST['gpu10pl'];
		$gpu11core = $_POST['gpu11core'];
		$gpu11mem = $_POST['gpu11mem'];
		$gpu11fan = $_POST['gpu11fan'];
		$gpu11pl = $_POST['gpu11pl'];
		$gpu12core = $_POST['gpu12core'];
		$gpu12mem = $_POST['gpu12mem'];
		$gpu12fan = $_POST['gpu12fan'];
		$gpu12pl = $_POST['gpu12pl'];
		$gpu13core = $_POST['gpu13core'];
		$gpu13mem = $_POST['gpu13mem'];
		$gpu13fan = $_POST['gpu13fan'];
		$gpu13pl = $_POST['gpu13pl'];
		$gpu14core = $_POST['gpu14core'];
		$gpu14mem = $_POST['gpu14mem'];
		$gpu14fan = $_POST['gpu14fan'];
		$gpu14pl = $_POST['gpu14pl'];
		$gpu15core = $_POST['gpu15core'];
		$gpu15mem = $_POST['gpu15mem'];
		$gpu15fan = $_POST['gpu15fan'];
		$gpu15pl = $_POST['gpu15pl'];
		$gpu8perf = $_POST['gpu8perf'];
		$gpu9perf = $_POST['gpu9perf'];
		$gpu10perf = $_POST['gpu10perf'];
		$gpu11perf = $_POST['gpu11perf'];
		$gpu12perf = $_POST['gpu12perf'];
		$gpu13perf = $_POST['gpu13perf'];
		$gpu14perf = $_POST['gpu14perf'];
		$gpu15perf = $_POST['gpu15perf'];
		

		file_put_contents('/nvezos/set/status/defaultuser.set', $defaultusername);
		
		if ($ocswitch == "yes") {
		file_put_contents('/nvezos/set/gpu/ocswitch.set', "checked");
		file_put_contents('/nvezos/set/gpu/ocnoswitch.set', "");
		}
		else {
		file_put_contents('/nvezos/set/gpu/ocnoswitch.set', "checked");
		file_put_contents('/nvezos/set/gpu/ocswitch.set', "");
		}
		
		if ($fanswitch == "yes") {
		file_put_contents('/nvezos/set/gpu/fanswitch.set', "checked");
		file_put_contents('/nvezos/set/gpu/fannoswitch.set', "");
		}
		else {
		file_put_contents('/nvezos/set/gpu/fannoswitch.set', "checked");	
		file_put_contents('/nvezos/set/gpu/fanswitch.set', "");		
		}

		if ($plswitch == "yes") {
		file_put_contents('/nvezos/set/gpu/plswitch.set', "checked");		
		file_put_contents('/nvezos/set/gpu/plnoswitch.set', "");
		}
		else {
		file_put_contents('/nvezos/set/gpu/plnoswitch.set', "checked");
		file_put_contents('/nvezos/set/gpu/plswitch.set', "");		
		}
		
		file_put_contents('/nvezos/set/gpu/gpu0core.set', $gpu0core);
		file_put_contents('/nvezos/set/gpu/gpu0mem.set', $gpu0mem);
		file_put_contents('/nvezos/set/gpu/gpu0fan.set', $gpu0fan);
		file_put_contents('/nvezos/set/gpu/gpu0pl.set', $gpu0pl);
		file_put_contents('/nvezos/set/gpu/gpu1core.set', $gpu1core);
		file_put_contents('/nvezos/set/gpu/gpu1mem.set', $gpu1mem);
		file_put_contents('/nvezos/set/gpu/gpu1fan.set', $gpu1fan);
		file_put_contents('/nvezos/set/gpu/gpu1pl.set', $gpu1pl);
		file_put_contents('/nvezos/set/gpu/gpu2core.set', $gpu2core);
		file_put_contents('/nvezos/set/gpu/gpu2mem.set', $gpu2mem);
		file_put_contents('/nvezos/set/gpu/gpu2fan.set', $gpu2fan);
		file_put_contents('/nvezos/set/gpu/gpu2pl.set', $gpu2pl);
		file_put_contents('/nvezos/set/gpu/gpu3core.set', $gpu3core);
		file_put_contents('/nvezos/set/gpu/gpu3mem.set', $gpu3mem);
		file_put_contents('/nvezos/set/gpu/gpu3fan.set', $gpu3fan);
		file_put_contents('/nvezos/set/gpu/gpu3pl.set', $gpu3pl);
		file_put_contents('/nvezos/set/gpu/gpu4core.set', $gpu4core);
		file_put_contents('/nvezos/set/gpu/gpu4mem.set', $gpu4mem);
		file_put_contents('/nvezos/set/gpu/gpu4fan.set', $gpu4fan);
		file_put_contents('/nvezos/set/gpu/gpu4pl.set', $gpu4pl);
		file_put_contents('/nvezos/set/gpu/gpu5core.set', $gpu5core);
		file_put_contents('/nvezos/set/gpu/gpu5mem.set', $gpu5mem);
		file_put_contents('/nvezos/set/gpu/gpu5fan.set', $gpu5fan);
		file_put_contents('/nvezos/set/gpu/gpu5pl.set', $gpu5pl);
		file_put_contents('/nvezos/set/gpu/gpu6core.set', $gpu6core);
		file_put_contents('/nvezos/set/gpu/gpu6mem.set', $gpu6mem);
		file_put_contents('/nvezos/set/gpu/gpu6fan.set', $gpu6fan);
		file_put_contents('/nvezos/set/gpu/gpu6pl.set', $gpu6pl);
		file_put_contents('/nvezos/set/gpu/gpu7core.set', $gpu7core);
		file_put_contents('/nvezos/set/gpu/gpu7mem.set', $gpu7mem);
		file_put_contents('/nvezos/set/gpu/gpu7fan.set', $gpu7fan);
		file_put_contents('/nvezos/set/gpu/gpu7pl.set', $gpu7pl);
		file_put_contents('/nvezos/set/gpu/gpu0perf.set', $gpu0perf);
		file_put_contents('/nvezos/set/gpu/gpu1perf.set', $gpu1perf);
		file_put_contents('/nvezos/set/gpu/gpu2perf.set', $gpu2perf);
		file_put_contents('/nvezos/set/gpu/gpu3perf.set', $gpu3perf);
		file_put_contents('/nvezos/set/gpu/gpu4perf.set', $gpu4perf);
		file_put_contents('/nvezos/set/gpu/gpu5perf.set', $gpu5perf);
		file_put_contents('/nvezos/set/gpu/gpu6perf.set', $gpu6perf);
		file_put_contents('/nvezos/set/gpu/gpu7perf.set', $gpu7perf);
		file_put_contents('/nvezos/set/gpu/gpu8core.set', $gpu8core);
		file_put_contents('/nvezos/set/gpu/gpu8mem.set', $gpu8mem);
		file_put_contents('/nvezos/set/gpu/gpu8fan.set', $gpu8fan);
		file_put_contents('/nvezos/set/gpu/gpu8pl.set', $gpu8pl);
		file_put_contents('/nvezos/set/gpu/gpu9core.set', $gpu9core);
		file_put_contents('/nvezos/set/gpu/gpu9mem.set', $gpu9mem);
		file_put_contents('/nvezos/set/gpu/gpu9fan.set', $gpu9fan);
		file_put_contents('/nvezos/set/gpu/gpu9pl.set', $gpu9pl);
		file_put_contents('/nvezos/set/gpu/gpu10core.set', $gpu10core);
		file_put_contents('/nvezos/set/gpu/gpu10mem.set', $gpu10mem);
		file_put_contents('/nvezos/set/gpu/gpu10fan.set', $gpu10fan);
		file_put_contents('/nvezos/set/gpu/gpu10pl.set', $gpu10pl);
		file_put_contents('/nvezos/set/gpu/gpu11core.set', $gpu11core);
		file_put_contents('/nvezos/set/gpu/gpu11mem.set', $gpu11mem);
		file_put_contents('/nvezos/set/gpu/gpu11fan.set', $gpu11fan);
		file_put_contents('/nvezos/set/gpu/gpu11pl.set', $gpu11pl);
		file_put_contents('/nvezos/set/gpu/gpu12core.set', $gpu12core);
		file_put_contents('/nvezos/set/gpu/gpu12mem.set', $gpu12mem);
		file_put_contents('/nvezos/set/gpu/gpu12fan.set', $gpu12fan);
		file_put_contents('/nvezos/set/gpu/gpu12pl.set', $gpu12pl);
		file_put_contents('/nvezos/set/gpu/gpu13core.set', $gpu13core);
		file_put_contents('/nvezos/set/gpu/gpu13mem.set', $gpu13mem);
		file_put_contents('/nvezos/set/gpu/gpu13fan.set', $gpu13fan);
		file_put_contents('/nvezos/set/gpu/gpu13pl.set', $gpu13pl);
		file_put_contents('/nvezos/set/gpu/gpu14core.set', $gpu14core);
		file_put_contents('/nvezos/set/gpu/gpu14mem.set', $gpu14mem);
		file_put_contents('/nvezos/set/gpu/gpu14fan.set', $gpu14fan);
		file_put_contents('/nvezos/set/gpu/gpu14pl.set', $gpu14pl);
		file_put_contents('/nvezos/set/gpu/gpu15core.set', $gpu15core);
		file_put_contents('/nvezos/set/gpu/gpu15mem.set', $gpu15mem);
		file_put_contents('/nvezos/set/gpu/gpu15fan.set', $gpu15fan);
		file_put_contents('/nvezos/set/gpu/gpu15pl.set', $gpu15pl);
		file_put_contents('/nvezos/set/gpu/gpu8perf.set', $gpu8perf);
		file_put_contents('/nvezos/set/gpu/gpu9perf.set', $gpu9perf);
		file_put_contents('/nvezos/set/gpu/gpu10perf.set', $gpu10perf);
		file_put_contents('/nvezos/set/gpu/gpu11perf.set', $gpu11perf);
		file_put_contents('/nvezos/set/gpu/gpu12perf.set', $gpu12perf);
		file_put_contents('/nvezos/set/gpu/gpu13perf.set', $gpu13perf);
		file_put_contents('/nvezos/set/gpu/gpu14perf.set', $gpu14perf);
		file_put_contents('/nvezos/set/gpu/gpu15perf.set', $gpu15perf);


		if ($ocswitch == "yes") {		
		file_put_contents('/nvezos/scripts/gpu/oc.sh', '#!/bin/bash'."\n".
			'un="$(cat /nvezos/set/status/defaultuser.set)"'."\n".
			'export DISPLAY=:0'."\n".
			'sudo -u $un xhost +'."\n".
			'nvidia-settings -a "[gpu:0]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:1]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:2]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:3]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:4]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:5]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:6]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:7]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:8]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:9]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:10]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:11]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:12]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:13]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:14]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:15]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:0]/GPUGraphicsClockOffset['.$gpu0perf.']='.$gpu0core.'"'."\n".
			'nvidia-settings -a "[gpu:1]/GPUGraphicsClockOffset['.$gpu1perf.']='.$gpu1core.'"'."\n".
			'nvidia-settings -a "[gpu:2]/GPUGraphicsClockOffset['.$gpu2perf.']='.$gpu2core.'"'."\n".
			'nvidia-settings -a "[gpu:3]/GPUGraphicsClockOffset['.$gpu3perf.']='.$gpu3core.'"'."\n".
			'nvidia-settings -a "[gpu:4]/GPUGraphicsClockOffset['.$gpu4perf.']='.$gpu4core.'"'."\n".
			'nvidia-settings -a "[gpu:5]/GPUGraphicsClockOffset['.$gpu5perf.']='.$gpu5core.'"'."\n".
			'nvidia-settings -a "[gpu:6]/GPUGraphicsClockOffset['.$gpu6perf.']='.$gpu6core.'"'."\n".
			'nvidia-settings -a "[gpu:7]/GPUGraphicsClockOffset['.$gpu7perf.']='.$gpu7core.'"'."\n".
			'nvidia-settings -a "[gpu:8]/GPUGraphicsClockOffset['.$gpu8perf.']='.$gpu8core.'"'."\n".
			'nvidia-settings -a "[gpu:9]/GPUGraphicsClockOffset['.$gpu9perf.']='.$gpu9core.'"'."\n".
			'nvidia-settings -a "[gpu:10]/GPUGraphicsClockOffset['.$gpu10perf.']='.$gpu10core.'"'."\n".
			'nvidia-settings -a "[gpu:11]/GPUGraphicsClockOffset['.$gpu11perf.']='.$gpu11core.'"'."\n".
			'nvidia-settings -a "[gpu:12]/GPUGraphicsClockOffset['.$gpu12perf.']='.$gpu12core.'"'."\n".
			'nvidia-settings -a "[gpu:13]/GPUGraphicsClockOffset['.$gpu13perf.']='.$gpu13core.'"'."\n".
			'nvidia-settings -a "[gpu:14]/GPUGraphicsClockOffset['.$gpu14perf.']='.$gpu14core.'"'."\n".
			'nvidia-settings -a "[gpu:15]/GPUGraphicsClockOffset['.$gpu15perf.']='.$gpu15core.'"'."\n".
			'nvidia-settings -a "[gpu:0]/GPUMemoryTransferRateOffset['.$gpu0perf.']='.$gpu0mem.'"'."\n".
			'nvidia-settings -a "[gpu:1]/GPUMemoryTransferRateOffset['.$gpu1perf.']='.$gpu1mem.'"'."\n".
			'nvidia-settings -a "[gpu:2]/GPUMemoryTransferRateOffset['.$gpu2perf.']='.$gpu2mem.'"'."\n".
			'nvidia-settings -a "[gpu:3]/GPUMemoryTransferRateOffset['.$gpu3perf.']='.$gpu3mem.'"'."\n".
			'nvidia-settings -a "[gpu:4]/GPUMemoryTransferRateOffset['.$gpu4perf.']='.$gpu4mem.'"'."\n".
			'nvidia-settings -a "[gpu:5]/GPUMemoryTransferRateOffset['.$gpu5perf.']='.$gpu5mem.'"'."\n".
			'nvidia-settings -a "[gpu:6]/GPUMemoryTransferRateOffset['.$gpu6perf.']='.$gpu6mem.'"'."\n".
			'nvidia-settings -a "[gpu:7]/GPUMemoryTransferRateOffset['.$gpu7perf.']='.$gpu7mem.'"'."\n".
			'nvidia-settings -a "[gpu:8]/GPUMemoryTransferRateOffset['.$gpu8perf.']='.$gpu8mem.'"'."\n".
			'nvidia-settings -a "[gpu:9]/GPUMemoryTransferRateOffset['.$gpu9perf.']='.$gpu9mem.'"'."\n".
			'nvidia-settings -a "[gpu:10]/GPUMemoryTransferRateOffset['.$gpu10perf.']='.$gpu10mem.'"'."\n".
			'nvidia-settings -a "[gpu:11]/GPUMemoryTransferRateOffset['.$gpu11perf.']='.$gpu11mem.'"'."\n".
			'nvidia-settings -a "[gpu:12]/GPUMemoryTransferRateOffset['.$gpu12perf.']='.$gpu12mem.'"'."\n".
			'nvidia-settings -a "[gpu:13]/GPUMemoryTransferRateOffset['.$gpu13perf.']='.$gpu13mem.'"'."\n".
			'nvidia-settings -a "[gpu:14]/GPUMemoryTransferRateOffset['.$gpu14perf.']='.$gpu14mem.'"'."\n".
			'nvidia-settings -a "[gpu:15]/GPUMemoryTransferRateOffset['.$gpu15perf.']='.$gpu15mem.'"'."\n".
			'sudo -u $un xhost -');
			}
		elseif ($ocswitch == "no") {
		file_put_contents('/nvezos/scripts/gpu/oc.sh', '#!/bin/bash'."\n".
			'un="$(cat /nvezos/set/status/defaultuser.set)"'."\n".
			'export DISPLAY=:0'."\n".
			'sudo -u $un xhost +'."\n".
			'nvidia-settings -a "[gpu:0]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:1]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:2]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:3]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:4]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:5]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:6]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:7]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:8]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:9]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:10]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:11]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:12]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:13]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:14]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:15]/GPUPowerMizerMode=1"'."\n".
			'nvidia-settings -a "[gpu:0]/GPUGraphicsClockOffset['.$gpu0perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:1]/GPUGraphicsClockOffset['.$gpu1perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:2]/GPUGraphicsClockOffset['.$gpu2perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:3]/GPUGraphicsClockOffset['.$gpu3perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:4]/GPUGraphicsClockOffset['.$gpu4perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:5]/GPUGraphicsClockOffset['.$gpu5perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:6]/GPUGraphicsClockOffset['.$gpu6perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:7]/GPUGraphicsClockOffset['.$gpu7perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:8]/GPUGraphicsClockOffset['.$gpu8perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:9]/GPUGraphicsClockOffset['.$gpu9perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:10]/GPUGraphicsClockOffset['.$gpu10perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:11]/GPUGraphicsClockOffset['.$gpu11perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:12]/GPUGraphicsClockOffset['.$gpu12perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:13]/GPUGraphicsClockOffset['.$gpu13perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:14]/GPUGraphicsClockOffset['.$gpu14perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:15]/GPUGraphicsClockOffset['.$gpu15perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:0]/GPUMemoryTransferRateOffset['.$gpu0perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:1]/GPUMemoryTransferRateOffset['.$gpu1perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:2]/GPUMemoryTransferRateOffset['.$gpu2perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:3]/GPUMemoryTransferRateOffset['.$gpu3perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:4]/GPUMemoryTransferRateOffset['.$gpu4perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:5]/GPUMemoryTransferRateOffset['.$gpu5perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:6]/GPUMemoryTransferRateOffset['.$gpu6perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:7]/GPUMemoryTransferRateOffset['.$gpu7perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:8]/GPUMemoryTransferRateOffset['.$gpu8perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:9]/GPUMemoryTransferRateOffset['.$gpu9perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:10]/GPUMemoryTransferRateOffset['.$gpu10perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:11]/GPUMemoryTransferRateOffset['.$gpu11perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:12]/GPUMemoryTransferRateOffset['.$gpu12perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:13]/GPUMemoryTransferRateOffset['.$gpu13perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:14]/GPUMemoryTransferRateOffset['.$gpu14perf.']=0"'."\n".
			'nvidia-settings -a "[gpu:15]/GPUMemoryTransferRateOffset['.$gpu15perf.']=0"'."\n".
			'sudo -u $un xhost -');
			}
		else { echo "Error, please try again"; }

		if ($fanswitch == "yes") {
		file_put_contents('/nvezos/scripts/gpu/fan.sh', '#!/bin/bash'."\n".
			'un="$(cat /nvezos/set/status/defaultuser.set)"'."\n".
			'export DISPLAY=:0'."\n".
			'sudo -u $un xhost +'."\n".
			'nvidia-settings -a [gpu:0]/GPUFanControlState=1 -a [fan-0]/GPUTargetFanSpeed='.$gpu0fan."\n".
			'nvidia-settings -a [gpu:1]/GPUFanControlState=1 -a [fan-1]/GPUTargetFanSpeed='.$gpu1fan."\n".
			'nvidia-settings -a [gpu:2]/GPUFanControlState=1 -a [fan-2]/GPUTargetFanSpeed='.$gpu2fan."\n".
			'nvidia-settings -a [gpu:3]/GPUFanControlState=1 -a [fan-3]/GPUTargetFanSpeed='.$gpu3fan."\n".
			'nvidia-settings -a [gpu:4]/GPUFanControlState=1 -a [fan-4]/GPUTargetFanSpeed='.$gpu4fan."\n".
			'nvidia-settings -a [gpu:5]/GPUFanControlState=1 -a [fan-5]/GPUTargetFanSpeed='.$gpu5fan."\n".
			'nvidia-settings -a [gpu:6]/GPUFanControlState=1 -a [fan-6]/GPUTargetFanSpeed='.$gpu6fan."\n".
			'nvidia-settings -a [gpu:7]/GPUFanControlState=1 -a [fan-7]/GPUTargetFanSpeed='.$gpu7fan."\n".
			'nvidia-settings -a [gpu:8]/GPUFanControlState=1 -a [fan-8]/GPUTargetFanSpeed='.$gpu8fan."\n".
			'nvidia-settings -a [gpu:9]/GPUFanControlState=1 -a [fan-9]/GPUTargetFanSpeed='.$gpu9fan."\n".
			'nvidia-settings -a [gpu:10]/GPUFanControlState=1 -a [fan-10]/GPUTargetFanSpeed='.$gpu10fan."\n".
			'nvidia-settings -a [gpu:11]/GPUFanControlState=1 -a [fan-11]/GPUTargetFanSpeed='.$gpu11fan."\n".
			'nvidia-settings -a [gpu:12]/GPUFanControlState=1 -a [fan-12]/GPUTargetFanSpeed='.$gpu12fan."\n".
			'nvidia-settings -a [gpu:13]/GPUFanControlState=1 -a [fan-13]/GPUTargetFanSpeed='.$gpu13fan."\n".
			'nvidia-settings -a [gpu:14]/GPUFanControlState=1 -a [fan-14]/GPUTargetFanSpeed='.$gpu14fan."\n".
			'nvidia-settings -a [gpu:15]/GPUFanControlState=1 -a [fan-15]/GPUTargetFanSpeed='.$gpu15fan."\n".
			'sudo -u $un xhost -');
			}
		elseif ($fanswitch == "no") {
		file_put_contents('/nvezos/scripts/gpu/fan.sh', '#!/bin/bash'."\n".
			'un="$(cat /nvezos/set/status/defaultuser.set)"'."\n".
			'export DISPLAY=:0'."\n".
			'sudo -u $un xhost +'."\n".
			'nvidia-settings -a [gpu:0]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:1]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:2]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:3]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:4]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:5]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:6]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:7]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:8]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:9]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:10]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:11]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:12]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:13]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:14]/GPUFanControlState=0'."\n".
			'nvidia-settings -a [gpu:15]/GPUFanControlState=0'."\n".
			'sudo -u $un xhost -');
			}
		else { echo "Error, please try again"; }

		if ($plswitch == "yes") {
		file_put_contents('/nvezos/scripts/gpu/pl.sh', '#!/bin/bash'."\n".
			'nvidia-smi -pm 1'."\n".
			'nvidia-smi -i 0 -pl '.$gpu0pl."\n".
			'nvidia-smi -i 1 -pl '.$gpu1pl."\n".
			'nvidia-smi -i 2 -pl '.$gpu2pl."\n".
			'nvidia-smi -i 3 -pl '.$gpu3pl."\n".
			'nvidia-smi -i 4 -pl '.$gpu4pl."\n".
			'nvidia-smi -i 5 -pl '.$gpu5pl."\n".
			'nvidia-smi -i 6 -pl '.$gpu6pl."\n".
			'nvidia-smi -i 7 -pl '.$gpu7pl."\n".
			'nvidia-smi -i 8 -pl '.$gpu8pl."\n".
			'nvidia-smi -i 9 -pl '.$gpu9pl."\n".
			'nvidia-smi -i 10 -pl '.$gpu10pl."\n".
			'nvidia-smi -i 11 -pl '.$gpu11pl."\n".
			'nvidia-smi -i 12 -pl '.$gpu12pl."\n".
			'nvidia-smi -i 13 -pl '.$gpu13pl."\n".
			'nvidia-smi -i 14 -pl '.$gpu14pl."\n".
			'nvidia-smi -i 15 -pl '.$gpu15pl."\n");
			}
		elseif ($plswitch == "no") {
		file_put_contents('/nvezos/scripts/gpu/pl.sh', '#!/bin/bash'."\n".
			'nvidia-smi -pm 0'."\n");
			}
		else { echo "Error, please try again"; }
		exec('chmod +x /nvezos/scripts/gpu/oc.sh');
		exec('chmod +x /nvezos/scripts/gpu/fan.sh');
		exec('chmod +x /nvezos/scripts/gpu/pl.sh');
		exec('/nvezos/scripts/gpu/restartgpuservices.sh');

	?>
</body>
</html>
