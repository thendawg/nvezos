<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="refresh" content="5;url=index.php">
    <title>
	NvEZOS -  
	<?php
	echo exec('hostname');
	?>
    </title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">

                        <img src="assets/img/logonew.png" class="headerimage"/>

                </div>
              
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li>
                        <a href="index.php" ><i class="fa fa-desktop "></i>Monitor Rig</a>
                    </li>
                    <li>
                        <a href="settings.php"><i class="fa fa-edit "></i>Miner Settings</a>
                    </li>
  	            <li>
                        <a href="poolstatus.php"><i class="fa fa-table "></i>Pool Status</a>
                    </li>
  		    <li class="active-link">
                        <a href="overclock.php"><i class="fa fa-edit "></i>Overclocking</a>
                    </li>
		   <li>
                        <a href="networksettings.php"><i class="fa fa-edit "></i>Network Settings</a>
                    </li>
                    <li>
                        <a target="_blank" href="http://www.reddit.com/r/nvezos"><i class="fa fa-table "></i>Help/Subreddit</a>
                    </li>

                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>Overclock Settings</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                             Applying Overclock settings... You will be redirected back to the monitoring page momentarilly...
                        </div>                       
                    </div>
		</div>
	<?php
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
			'nvidia-settings -a "[gpu:0]/GPUGraphicsClockOffset[3]='.$gpu0core.'"'."\n".
			'nvidia-settings -a "[gpu:1]/GPUGraphicsClockOffset[3]='.$gpu1core.'"'."\n".
			'nvidia-settings -a "[gpu:2]/GPUGraphicsClockOffset[3]='.$gpu2core.'"'."\n".
			'nvidia-settings -a "[gpu:3]/GPUGraphicsClockOffset[3]='.$gpu3core.'"'."\n".
			'nvidia-settings -a "[gpu:4]/GPUGraphicsClockOffset[3]='.$gpu4core.'"'."\n".
			'nvidia-settings -a "[gpu:5]/GPUGraphicsClockOffset[3]='.$gpu5core.'"'."\n".
			'nvidia-settings -a "[gpu:6]/GPUGraphicsClockOffset[3]='.$gpu6core.'"'."\n".
			'nvidia-settings -a "[gpu:7]/GPUGraphicsClockOffset[3]='.$gpu7core.'"'."\n".
			'nvidia-settings -a "[gpu:0]/GPUMemoryTransferRateOffset[3]='.$gpu0mem.'"'."\n".
			'nvidia-settings -a "[gpu:1]/GPUMemoryTransferRateOffset[3]='.$gpu1mem.'"'."\n".
			'nvidia-settings -a "[gpu:2]/GPUMemoryTransferRateOffset[3]='.$gpu2mem.'"'."\n".
			'nvidia-settings -a "[gpu:3]/GPUMemoryTransferRateOffset[3]='.$gpu3mem.'"'."\n".
			'nvidia-settings -a "[gpu:4]/GPUMemoryTransferRateOffset[3]='.$gpu4mem.'"'."\n".
			'nvidia-settings -a "[gpu:5]/GPUMemoryTransferRateOffset[3]='.$gpu5mem.'"'."\n".
			'nvidia-settings -a "[gpu:6]/GPUMemoryTransferRateOffset[3]='.$gpu6mem.'"'."\n".
			'nvidia-settings -a "[gpu:7]/GPUMemoryTransferRateOffset[3]='.$gpu7mem.'"'."\n".
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
			'nvidia-settings -a "[gpu:0]/GPUGraphicsClockOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:1]/GPUGraphicsClockOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:2]/GPUGraphicsClockOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:3]/GPUGraphicsClockOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:4]/GPUGraphicsClockOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:5]/GPUGraphicsClockOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:6]/GPUGraphicsClockOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:7]/GPUGraphicsClockOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:0]/GPUMemoryTransferRateOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:1]/GPUMemoryTransferRateOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:2]/GPUMemoryTransferRateOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:3]/GPUMemoryTransferRateOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:4]/GPUMemoryTransferRateOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:5]/GPUMemoryTransferRateOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:6]/GPUMemoryTransferRateOffset[3]=0"'."\n".
			'nvidia-settings -a "[gpu:7]/GPUMemoryTransferRateOffset[3]=0"'."\n".
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
			'nvidia-smi -i 7 -pl '.$gpu7pl."\n");
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
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2017 NPMining | NvEZOS Beta v0.1</a>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
