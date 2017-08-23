<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		$refreshint = exec('cat /nvezos/set/status/refreshint.set');
		echo '<meta http-equiv="refresh" content="'.$refreshint.'">';
	?>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
   <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style type="text/css">
  	.mobileShow { display: none;}
   	/* Smartphone Portrait and Landscape */
   	@media only screen
   	and (min-device-width : 320px)
   	and (max-device-width : 480px){ .mobileShow { display: inline;}}
	.textred { color: #FF0000; }
    </style>
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
                    <li class="active-link">
                        <a href="index.php" ><i class="fa fa-desktop "></i>Monitor Rig</a>
                    </li>
                    <li>
                        <a href="settings.php"><i class="fa fa-edit "></i>Miner Settings</a>
                    </li>
					<li>
					<?php 
						$poolurl = exec('cat /nvezos/set/status/poolurl.data');
						echo '<a target="_blank" href="'.$poolurl.'"><i class="fa fa-table "></i>Pool Status</a>';
					?>
                    </li>
					<li>
                        <a href="overclock.php"><i class="fa fa-edit "></i>Overclocking</a>
					<li>
                        <a href="networksettings.php"><i class="fa fa-edit "></i>Network Settings</a>
                    </li>
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
                     <h2>Rig Monitor</h2>   
                    </div>
                </div>                    
	
<!-- /. MOBILE NAV  -->        
	<div class="mobileShow">
	<div class="dropdown">
  	<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Menu
  	<span class="caret"></span></button>
  	<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		<li role="presentation"><a role="menuitem" href="index.php">Monitor</a></li>
		<li role="presentation"><a role="menuitem" href="settings.php">Miner Settings</a></li>
    	<li role="presentation"><a role="menuitem" href="overclock.php">Overclocking</a></li>
    	<li role="presentation"><a role="menuitem" href="networksettings.php">Network Settings</a></li>
    	<li role="presentation"><a role="menuitem" href="http://www.reddit.com/r/nvezos">Help/Subreddit</a></li>
  	</ul>
	</div>
	</div>         
	
<!-- /. ROW  -->
    <hr />
        <div class="row">
            <div class="col-lg-9">
                <div class="alert alert-info">
					<div class="text-center">
                        <strong>Welcome to NvEZOS.</strong> This page allows you to monitor the rig in real time. Please use the "Miner Settings" page to configure. <br>This software is free to use, but donations are always appreciated.<br>Eth Address (MEW) - 0x3d454b7b858335805f83D30842d9f0fACd50e545
					</div>
                </div>                       
            </div>
		</div>
	<div class="row">
	<?php
	function MinerHashrate1() {
		$m1enabled = exec('cat /nvezos/set/miners/1status.set');
		if ($m1enabled=="yes") {
			exec('ps cax | grep miner1.sh > /nvezos/set/miners/minerup1.set');
			$minerup1 = filesize('/nvezos/set/miners/minerup1.set');
			$minertype1 = exec('cat /nvezos/set/miners/minertype1.set');
			if ($minerup1 >= '2') {
				if ($minertype1=="ewbf") {
					exec('/nvezos/scripts/query/queryhashrateewbf1.sh > /nvezos/set/status/hashrate/ewbf1.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/ewbf1.set > /nvezos/set/status/hashrate/ewbf1sant.set');
					$hashrate1 = exec('cat /nvezos/set/status/hashrate/ewbf1sant.set');
					}
				elseif ($minertype1=="ethminer") {
					exec('/nvezos/scripts/query/queryhashrateeth1.sh > /nvezos/set/status/hashrate/eth1.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/eth1.set > /nvezos/set/status/hashrate/eth1sant.set');
					$hashrate1 = exec('cat /nvezos/set/status/hashrate/eth1sant.set');
					}
				elseif ($minertype1=="claymore") {
					$hashrate1 = 'Claymore - See Log';
					}
				else {
					$hashrate1 = "Not Configured";
					}
			}
			else {
				echo '<div class="textred">Process Dead - Check Log</div>';
			}		
		}
		else {
		$hashrate1 = "Disabled";
		}
		echo $hashrate1;
	}
	function MinerHashrate2() {
		$m2enabled = exec('cat /nvezos/set/miners/2status.set');
		if ($m2enabled=="yes") {
			exec('ps cax | grep miner2.sh > /nvezos/set/miners/minerup2.set');
			$minerup2 = filesize('/nvezos/set/miners/minerup2.set');
			$minertype2 = exec('cat /nvezos/set/miners/minertype2.set');
			if ($minerup2 >= '2') {
				if ($minertype2=="ewbf") {
					exec('/nvezos/scripts/query/queryhashrateewbf2.sh > /nvezos/set/status/hashrate/ewbf2.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/ewbf2.set > /nvezos/set/status/hashrate/ewbf2sant.set');
					$hashrate2 = exec('cat /nvezos/set/status/hashrate/ewbf2sant.set');
					}
				elseif ($minertype2=="ethminer") {
					exec('/nvezos/scripts/query/queryhashrateeth2.sh > /nvezos/set/status/hashrate/eth2.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/eth2.set > /nvezos/set/status/hashrate/eth2sant.set');
					$hashrate2 = exec('cat /nvezos/set/status/hashrate/eth2sant.set');
					}
				elseif ($minertype2=="claymore") {
					$hashrate2 = 'Claymore - See Log';
					}
				else {
					$hashrate2 = "Not Configured";
					}
				}
			else {
				echo '<div class="textred">Process Dead - Check Log</div>';
			}		
		}
		else {
		$hashrate2 = "Disabled";
		}
		echo $hashrate2;
	}
	function MinerHashrate3() {
		$m3enabled = exec('cat /nvezos/set/miners/3status.set');
		if ($m3enabled=="yes") {
			exec('ps cax | grep miner3.sh > /nvezos/set/miners/minerup3.set');
			$minerup3 = filesize('/nvezos/set/miners/minerup3.set');
			$minertype3 = exec('cat /nvezos/set/miners/minertype3.set');
			if ($minerup3 >= '2') {
				if ($minertype3=="ewbf") {
					exec('/nvezos/scripts/query/queryhashrateewbf3.sh > /nvezos/set/status/hashrate/ewbf3.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/ewbf3.set > /nvezos/set/status/hashrate/ewbf3sant.set');
					$hashrate3 = exec('cat /nvezos/set/status/hashrate/ewbf3sant.set');
					}
				elseif ($minertype3=="ethminer") {
					exec('/nvezos/scripts/query/queryhashrateeth3.sh > /nvezos/set/status/hashrate/eth3.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/eth3.set > /nvezos/set/status/hashrate/eth3sant.set');
					$hashrate3 = exec('cat /nvezos/set/status/hashrate/eth3sant.set');
					}
				elseif ($minertype3=="claymore") {
					$hashrate3 = 'Claymore - See Log';
					}
				else {
					$hashrate3 = "Not Configured";
					}
			}
			else {
				echo '<div class="textred">Process Dead - Check Log</div>';
			}		
		}
		else {
		$hashrate3 = "Disabled";
		}
		echo $hashrate3;
	}
	function MinerHashrate4() {
		$m4enabled = exec('cat /nvezos/set/miners/4status.set');
		if ($m4enabled=="yes") {
			exec('ps cax | grep miner4.sh > /nvezos/set/miners/minerup4.set');
			$minerup4 = filesize('/nvezos/set/miners/minerup4.set');
			$minertype4 = exec('cat /nvezos/set/miners/minertype4.set');
			if ($minerup4 >= '2') {
				if ($minertype4=="ewbf") {
					exec('/nvezos/scripts/query/queryhashrateewbf4.sh > /nvezos/set/status/hashrate/ewbf4.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/ewbf4.set > /nvezos/set/status/hashrate/ewbf4sant.set');
					$hashrate4 = exec('cat /nvezos/set/status/hashrate/ewbf4sant.set');
					}
				elseif ($minertype4=="ethminer") {
					exec('/nvezos/scripts/query/queryhashrateeth4.sh > /nvezos/set/status/hashrate/eth4.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/eth4.set > /nvezos/set/status/hashrate/eth4sant.set');
					$hashrate4 = exec('cat /nvezos/set/status/hashrate/eth4sant.set');
					}
				elseif ($minertype4=="claymore") {
					$hashrate4 = 'Claymore - See Log';
					}
				else {
					$hashrate4 = "Not Configured";
					}
			}
			else {
				echo '<div class="textred">Process Dead - Check Log</div>';
			}		
		}
		else {
		$hashrate4 = "Disabled";
		}
		echo $hashrate4;
	}
	function MinerHashrate5() {
		$m5enabled = exec('cat /nvezos/set/miners/5status.set');
		if ($m5enabled=="yes") {
			exec('ps cax | grep miner5.sh > /nvezos/set/miners/minerup5.set');
			$minerup5 = filesize('/nvezos/set/miners/minerup5.set');
			$minertype5 = exec('cat /nvezos/set/miners/minertype5.set');
			if ($minerup5 >= '2') {
				if ($minertype5=="ewbf") {
					exec('/nvezos/scripts/query/queryhashrateewbf5.sh > /nvezos/set/status/hashrate/ewbf5.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/ewbf5.set > /nvezos/set/status/hashrate/ewbf5sant.set');
					$hashrate5 = exec('cat /nvezos/set/status/hashrate/ewbf5sant.set');
					}
				elseif ($minertype5=="ethminer") {
					exec('/nvezos/scripts/query/queryhashrateeth5.sh > /nvezos/set/status/hashrate/eth5.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/eth5.set > /nvezos/set/status/hashrate/eth5sant.set');
					$hashrate5 = exec('cat /nvezos/set/status/hashrate/eth5sant.set');
					}
				elseif ($minertype5=="claymore") {
					$hashrate5 = 'Claymore - See Log';
					}
				else {
					$hashrate5 = "Not Configured";
					}
			}
			else {
				echo '<div class="textred">Process Dead - Check Log</div>';
			}		
		}
		else {
		$hashrate5 = "Disabled";
		}
		echo $hashrate5;
	}
	function MinerHashrate6() {
		$m6enabled = exec('cat /nvezos/set/miners/6status.set');
		if ($m6enabled=="yes") {
			exec('ps cax | grep miner6.sh > /nvezos/set/miners/minerup6.set');
			$minerup6 = filesize('/nvezos/set/miners/minerup6.set');
			$minertype6 = exec('cat /nvezos/set/miners/minertype6.set');
			if ($minerup6 >= '2') {
				if ($minertype6=="ewbf") {
					exec('/nvezos/scripts/query/queryhashrateewbf6.sh > /nvezos/set/status/hashrate/ewbf6.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/ewbf6.set > /nvezos/set/status/hashrate/ewbf6sant.set');
					$hashrate6 = exec('cat /nvezos/set/status/hashrate/ewbf6sant.set');
					}
				elseif ($minertype6=="ethminer") {
					exec('/nvezos/scripts/query/queryhashrateeth6.sh > /nvezos/set/status/hashrate/eth6.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/eth6.set > /nvezos/set/status/hashrate/eth6sant.set');
					$hashrate6 = exec('cat /nvezos/set/status/hashrate/eth6sant.set');
					}
				elseif ($minertype6=="claymore") {
					$hashrate6 = 'Claymore - See Log';
					}
				else {
					$hashrate6 = "Not Configured";
					}
			}
			else {
				echo '<div class="textred">Process Dead - Check Log</div>';
			}		
		}
		else {
		$hashrate6 = "Disabled";
		}
		echo $hashrate6;
	}
	function MinerHashrate7() {
		$m7enabled = exec('cat /nvezos/set/miners/7status.set');
		if ($m7enabled=="yes") {
			exec('ps cax | grep miner7.sh > /nvezos/set/miners/minerup7.set');
			$minerup7 = filesize('/nvezos/set/miners/minerup7.set');
			$minertype7 = exec('cat /nvezos/set/miners/minertype7.set');
			if ($minerup7 >= '2') {
				if ($minertype7=="ewbf") {
					exec('/nvezos/scripts/query/queryhashrateewbf7.sh > /nvezos/set/status/hashrate/ewbf7.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/ewbf7.set > /nvezos/set/status/hashrate/ewbf7sant.set');
					$hashrate7 = exec('cat /nvezos/set/status/hashrate/ewbf7sant.set');
					}
				elseif ($minertype7=="ethminer") {
					exec('/nvezos/scripts/query/queryhashrateeth7.sh > /nvezos/set/status/hashrate/eth7.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/eth7.set > /nvezos/set/status/hashrate/eth7sant.set');
					$hashrate7 = exec('cat /nvezos/set/status/hashrate/eth7sant.set');
					}
				elseif ($minertype7=="claymore") {
					$hashrate7 = 'Claymore - See Log';
					}
				else {
					$hashrate7 = "Not Configured";
					}
			}
			else {
				echo '<div class="textred">Process Dead - Check Log</div>';
			}		
		}
		else {
		$hashrate7 = "Disabled";
		}
		echo $hashrate7;
	}
	function MinerHashrate8() {
		$m8enabled = exec('cat /nvezos/set/miners/8status.set');
		if ($m8enabled=="yes") {
			exec('ps cax | grep miner8.sh > /nvezos/set/miners/minerup8.set');
			$minerup8 = filesize('/nvezos/set/miners/minerup8.set');
			$minertype8 = exec('cat /nvezos/set/miners/minertype8.set');
			if ($minerup8 >= '2') {
				if ($minertype8=="ewbf") {
					exec('/nvezos/scripts/query/queryhashrateewbf8.sh > /nvezos/set/status/hashrate/ewbf8.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/ewbf8.set > /nvezos/set/status/hashrate/ewbf8sant.set');
					$hashrate8 = exec('cat /nvezos/set/status/hashrate/ewbf8sant.set');
					}
				elseif ($minertype8=="ethminer") {
					exec('/nvezos/scripts/query/queryhashrateeth8.sh > /nvezos/set/status/hashrate/eth8.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/eth8.set > /nvezos/set/status/hashrate/eth8sant.set');
					$hashrate8 = exec('cat /nvezos/set/status/hashrate/eth8sant.set');
					}
				elseif ($minertype8=="claymore") {
					$hashrate8 = 'Claymore - See Log';
					}
				else {
					$hashrate8 = "Not Configured";
					}
			}
			else {
				echo '<div class="textred">Process Dead - Check Log</div>';
			}		
		}
		else {
		$hashrate8 = "Disabled";
		}
		echo $hashrate8;
	}
	function MinerHashrate9() {
		$m9enabled = exec('cat /nvezos/set/miners/9status.set');
		if ($m9enabled=="yes") {
			exec('ps cax | grep miner9.sh > /nvezos/set/miners/minerup9.set');
			$minerup9 = filesize('/nvezos/set/miners/minerup9.set');
			$minertype9 = exec('cat /nvezos/set/miners/minertype9.set');
			if ($minerup9 >= '2') {
				if ($minertype9=="ewbf") {
					exec('/nvezos/scripts/query/queryhashrateewbf9.sh > /nvezos/set/status/hashrate/ewbf9.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/ewbf9.set > /nvezos/set/status/hashrate/ewbf9sant.set');
					$hashrate9 = exec('cat /nvezos/set/status/hashrate/ewbf9sant.set');
					}
				elseif ($minertype9=="ethminer") {
					exec('/nvezos/scripts/query/queryhashrateeth9.sh > /nvezos/set/status/hashrate/eth9.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/eth9.set > /nvezos/set/status/hashrate/eth9sant.set');
					$hashrate9 = exec('cat /nvezos/set/status/hashrate/eth9sant.set');
					}
				elseif ($minertype9=="claymore") {
					$hashrate9 = 'Claymore - See Log';
					}
				else {
					$hashrate9 = "Not Configured";
					}
			}
			else {
				echo '<div class="textred">Process Dead - Check Log</div>';
			}		
		}
		else {
		$hashrate9 = "Disabled";
		}
		echo $hashrate9;
	}
	function MinerHashrate10() {
		$m10enabled = exec('cat /nvezos/set/miners/10status.set');
		if ($m10enabled=="yes") {
			exec('ps cax | grep miner10.sh > /nvezos/set/miners/minerup10.set');
			$minerup10 = filesize('/nvezos/set/miners/minerup10.set');
			$minertype10 = exec('cat /nvezos/set/miners/minertype10.set');
			if ($minerup10 >= '2') {
				if ($minertype10=="ewbf") {
					exec('/nvezos/scripts/query/queryhashrateewbf10.sh > /nvezos/set/status/hashrate/ewbf10.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/ewbf10.set > /nvezos/set/status/hashrate/ewbf10sant.set');
					$hashrate10 = exec('cat /nvezos/set/status/hashrate/ewbf10sant.set');
					}
				elseif ($minertype10=="ethminer") {
					exec('/nvezos/scripts/query/queryhashrateeth10.sh > /nvezos/set/status/hashrate/eth10.set');
					exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/eth10.set > /nvezos/set/status/hashrate/eth10sant.set');
					$hashrate10 = exec('cat /nvezos/set/status/hashrate/eth10sant.set');
					}
				elseif ($minertype10=="claymore") {
					$hashrate10 = 'Claymore - See Log';
					}
				else {
					$hashrate10 = "Not Configured";
					}
			}
			else {
				echo '<div class="textred">Process Dead - Check Log</div>';
			}		
		}
		else {
		$hashrate10 = "Disabled";
		}
		echo $hashrate10;
	}	
	function DevHashrate() {
		$devenabled = exec('cat /nvezos/set/miners/devstatus.set');
		if ($devenabled=="yes") {
			$minertypedev = exec('cat /nvezos/set/miners/minertypedev.set');
			if ($minertypedev=="ewbf") {
				exec('/nvezos/scripts/query/queryhashrateewbfdev.sh > /nvezos/set/status/hashrate/ewbfdev.set');
				exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/ewbfdev.set > /nvezos/set/status/hashrate/ewbfdevsant.set');
				$hashratedev = exec('cat /nvezos/set/status/hashrate/ewbfdevsant.set');
				}
			elseif ($minertypedev=="ethminer") {
				exec('/nvezos/scripts/query/queryhashrateethdev.sh > /nvezos/set/status/hashrate/ethdev.set');
				exec('sed "s/\x1b//g" /nvezos/set/status/hashrate/ethdev.set > /nvezos/set/status/hashrate/ethdevsant.set');
				$hashratedev = exec('cat /nvezos/set/status/hashrate/ethdevsant.set');
				}
			elseif ($minertypedev=="claymore") {
				$hashratedev = 'Claymore - See Log';
				}
			else {
				$hashratedev = "Not Configured";
				}
		}
		else {
		$hashratedev = "Disabled";
		}
		echo $hashratedev;
	}
	?>
	
	<div class="col-lg-9">
	<div class="text-center">
			<h3>Miner Status</h3>
	<table class="table table-striped table-bordered table-hover">
		<thead>
            <tr>
			<th><center>Miner Name</center></th>
			<th><center>Hashrate</center></th>
			<th><center>Miner Name</center></th>
			<th><center>Hashrate</center></th>
			<th><center>Miner Name</center></th>
			<th><center>Hashrate</center></th>
			</tr>
		</thead>
		<tbody>
			<tr>
			<td><?php echo exec('cat /nvezos/set/miners/minername1.set'); ?></td>
			<td><?php MinerHashrate1(); ?></td>
			<td><?php echo exec('cat /nvezos/set/miners/minername2.set'); ?></td>
			<td><?php MinerHashrate2(); ?></td>
			<td><?php echo exec('cat /nvezos/set/miners/minername3.set'); ?></td>
			<td><?php MinerHashrate3(); ?></td>
			</tr>
			<tr>
			<td><?php echo exec('cat /nvezos/set/miners/minername4.set'); ?></td>
			<td><?php MinerHashrate4(); ?></td>
			<td><?php echo exec('cat /nvezos/set/miners/minername5.set'); ?></td>
			<td><?php MinerHashrate5(); ?></td>
			<td><?php echo exec('cat /nvezos/set/miners/minername6.set'); ?></td>
			<td><?php MinerHashrate6(); ?></td>
			</tr>
			<tr>
			<td><?php echo exec('cat /nvezos/set/miners/minername7.set'); ?></td>
			<td><?php MinerHashrate7(); ?></td>
			<td><?php echo exec('cat /nvezos/set/miners/minername8.set'); ?></td>
			<td><?php MinerHashrate8(); ?></td>
			<td><?php echo exec('cat /nvezos/set/miners/minername9.set'); ?></td>
			<td><?php MinerHashrate9(); ?></td>
			</tr>
			<tr>
			<td><?php echo exec('cat /nvezos/set/miners/minername10.set'); ?></td>
			<td><?php MinerHashrate10(); ?></td>
			<td>Dev Miner</td>
			<td><?php DevHashrate(); ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
	</div>
	</div>
	</div>
		<div class="row">
			<div class="col-lg-9">
				<div class="text-center">
				<h3>GPU Monitoring</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9">	
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>GPU Index</th>
                                    <th>GPU Identifier</th>
                                    <th>Temp</th>
                                    <th>Fan Speed</th>
                                    <th>Core Freq</th>
                                    <th>Memory Freq</th>
                                    <th>Power Util</th>
                                </tr>
                            </thead>
                            <tbody>
			<?php
				exec('nvidia-smi --query-gpu=count --format=csv,noheader > /nvezos/set/gpu/numgpu.data');
				$numgpu = exec('tail -n 1 /nvezos/set/gpu/numgpu.data');
			 	if ($numgpu >= 1) { ?>
				
				<tr>
                                    <td>0</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 0 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 0 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 0 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 0 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 0 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 0 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }	
			?>
			<?php
				if ($numgpu >= 2) { ?>	
                                <tr>
                                    <td>1</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 1 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 1 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 1 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 1 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 1 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 1 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 3) { ?>	
                                <tr>
                                    <td>2</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 2 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 2 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 2 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 2 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 2 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 2 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 4) { ?>	
                                <tr>
                                    <td>3</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 3 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 3 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 3 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 3 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 3 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 3 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
			        </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 5) { ?>	
                                <tr>
                                    <td>4</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 4 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 4 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 4 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 4 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 4 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 4 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 6) { ?>	
                                <tr>
                                    <td>5</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 5 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 5 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 5 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 5 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 5 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 5 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 7) { ?>	
                                <tr>
                                    <td>6</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 6 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 6 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 6 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 6 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 6 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 6 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 8) { ?>	
                                <tr>
                                    <td>7</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 7 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 7 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 7 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 7 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 7 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 7 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 9) { ?>	
                                <tr>
                                    <td>8</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 8 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 8 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 8 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 8 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 8 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 8 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 10) { ?>	
                                <tr>
                                    <td>9</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 9 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 9 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 9 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 9 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 9 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 9 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 11) { ?>	
                                <tr>
                                    <td>10</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 10 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 10 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 10 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 10 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 10 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 10 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 12) { ?>	
                                <tr>
                                    <td>11</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 11 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 11 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 11 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 11 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 11 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 11 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 13) { ?>	
                                <tr>
                                    <td>12</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 12 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 12 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 12 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 12 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 12 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 12 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 14) { ?>	
                                <tr>
                                    <td>13</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 13 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 13 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 13 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 13 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 13 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 13 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 15) { ?>	
                                <tr>
                                    <td>14</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 14 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 14 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 14 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 14 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 14 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 14 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
			<?php
				if ($numgpu >= 16) { ?>	
                                <tr>
                                    <td>15</td>
                                    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 15 --query-gpu=gpu_name --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 15 --query-gpu=temperature.gpu --format=csv,noheader');
 				    ?>&#8451
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 15 --query-gpu=fan.speed --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 15 --query-gpu=clocks.gr --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 15 --query-gpu=clocks.mem --format=csv,noheader');
 				    ?>
				    </td>
				    <td>
				    <?php
			     	    echo exec('nvidia-smi -i 15 --query-gpu=power.draw --format=csv,noheader');
 				    ?>
				    </td>
                                </tr>
			<?php }
			?>
                            </tbody>
                        </table>
			</div>
		</div>
		<br>
		<div class="col-lg-9">
		      <div class="panel panel-primary">
                            <div class="panel-heading">
                            <div class="text-center">
							<?php  
								$minerloglocation = exec('cat /nvezos/set/status/minerloglocation.set');
								echo $minerloglocation.' Output';
							?>
							</div>
							</div>
							<div class="panel-body">
							<div class="text-center">
							<center>
							<?php
								exec('tail -n 10 /nvezos/logs/'.$minerloglocation.' > /nvezos/set/status/consoleoutput.set');
								exec('sed "s,\x1B\[[0-9;]*[a-zA-Z],,g" /nvezos/set/status/consoleoutput.set > /nvezos/set/status/consoleoutputsant.set');
								echo exec('sed -n 1p /nvezos/set/status/consoleoutputsant.set'); ?><br>
							<?php echo exec('sed -n 2p /nvezos/set/status/consoleoutputsant.set'); ?><br>
							<?php echo exec('sed -n 3p /nvezos/set/status/consoleoutputsant.set'); ?><br>
							<?php echo exec('sed -n 4p /nvezos/set/status/consoleoutputsant.set'); ?><br>
							<?php echo exec('sed -n 5p /nvezos/set/status/consoleoutputsant.set'); ?><br>
							<?php echo exec('sed -n 6p /nvezos/set/status/consoleoutputsant.set'); ?><br> 
							<?php echo exec('sed -n 7p /nvezos/set/status/consoleoutputsant.set'); ?><br> 
							<?php echo exec('sed -n 8p /nvezos/set/status/consoleoutputsant.set'); ?><br> 
							<?php echo exec('sed -n 9p /nvezos/set/status/consoleoutputsant.set'); ?><br> 
							<?php echo exec('sed -n 10p /nvezos/set/status/consoleoutputsant.set'); ?><br>
							</center>
							</div>
							</div>
				</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-9">
			<div class="text-center">
			<center>
			<h5>Set Refresh Interval (In seconds - Put number only!)</h5>
			<form name="SetRefreshInt" method="Post" ACTION ="setrefresh.php">
			<input name="refreshinterval" type="text" style="width: 40px;" value='<?php echo exec('cat /nvezos/set/status/refreshint.set'); ?>'  />&nbsp;&nbsp;
			<input type="submit" value="Set"><br>
			</form>
			<h5>Choose log to display on page:</h5>
			<form name="SetLog" method="Post" ACTION ="setlog.php">
			<select name="WhichLog">
				<option value="miner1" <?php echo exec('cat /nvezos/set/status/logset1.set'); ?>><?php echo exec('cat /nvezos/set/miners/minername1.set'); ?></option>
				<option value="miner2" <?php echo exec('cat /nvezos/set/status/logset2.set'); ?>><?php echo exec('cat /nvezos/set/miners/minername2.set'); ?></option>
				<option value="miner3" <?php echo exec('cat /nvezos/set/status/logset3.set'); ?>><?php echo exec('cat /nvezos/set/miners/minername3.set'); ?></option>
				<option value="miner4" <?php echo exec('cat /nvezos/set/status/logset4.set'); ?>><?php echo exec('cat /nvezos/set/miners/minername4.set'); ?></option>
				<option value="miner5" <?php echo exec('cat /nvezos/set/status/logset5.set'); ?>><?php echo exec('cat /nvezos/set/miners/minername5.set'); ?></option>
				<option value="miner6" <?php echo exec('cat /nvezos/set/status/logset6.set'); ?>><?php echo exec('cat /nvezos/set/miners/minername6.set'); ?></option>
				<option value="miner7" <?php echo exec('cat /nvezos/set/status/logset7.set'); ?>><?php echo exec('cat /nvezos/set/miners/minername7.set'); ?></option>
				<option value="miner8" <?php echo exec('cat /nvezos/set/status/logset8.set'); ?>><?php echo exec('cat /nvezos/set/miners/minername8.set'); ?></option>
				<option value="miner9" <?php echo exec('cat /nvezos/set/status/logset9.set'); ?>><?php echo exec('cat /nvezos/set/miners/minername9.set'); ?></option>
				<option value="miner10" <?php echo exec('cat /nvezos/set/status/logset10.set'); ?>><?php echo exec('cat /nvezos/set/miners/minername10.set'); ?></option>
				<option value="minerdev" <?php echo exec('cat /nvezos/set/status/logsetdev.set'); ?>>Dev Miner</option>
			</select>&nbsp;&nbsp;
			<input type="submit" value="Select"><br>
			</form>
			</center>
			<br>
			<?php
				echo exec('date');
			?>
			</div>
			</div>
		</div>		
 
<!-- /. PAGE INNER  -->
        </div>

<!-- /. PAGE WRAPPER  -->
    </div>
    <div class="footer">    
			<div class="row">
                <div class="col-lg-12" >
                    &copy;  2017 NPMining | NvEZOS v1.02</a>
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
