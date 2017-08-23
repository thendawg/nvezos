<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
                    <li>
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
                    <div class="col-lg-9">
                     <h2>Overclocking</h2>   
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
   	<li role="presentation"><a role="menuitem" href="poolstatus.php">Pool Status</a></li>
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
                             This page allows you to set GPU overclocking parameters including core offset, memory offset, and fan speed.	 						 
                        </div>                       
                    </div>
		</div>
		<div class="row">
		  
		     <div class="col-lg-6">
					 <div class="text-center">
		            <div class="panel panel-primary">
                            <div class="panel-heading">
				Set Overclocking Operation
                            </div>
			    </div>
                            <div class="panel-body">
			    <div class="text-center">WARNING: Overclocking can result in system instability, proceed with caution.
			    </div>
                            <form name="OCSetup" method="Post" ACTION ="setoc.php">
				Overclocking Enabled?<br>
				<input type="radio" name="ocswitch" value="yes" <?php echo exec('cat /nvezos/set/gpu/ocswitch.set'); ?> > Yes &nbsp;&nbsp;
				<input type="radio" name="ocswitch" value="no" <?php echo exec('cat /nvezos/set/gpu/ocnoswitch.set'); ?> > No <br>
				Set Manual Fan Speed? (If set to no, fan speed values will be ignored)<br>
				<input type="radio" name="fanswitch" value="yes" <?php echo exec('cat /nvezos/set/gpu/fanswitch.set'); ?> > Yes &nbsp;&nbsp;
				<input type="radio" name="fanswitch" value="no" <?php echo exec('cat /nvezos/set/gpu/fannoswitch.set'); ?> > No <br>
				Set Power Limit? (If set to no, power limit values will be ignored)<br>
				<input type="radio" name="plswitch" value="yes" <?php echo exec('cat /nvezos/set/gpu/plswitch.set'); ?> > Yes &nbsp;&nbsp;
				<input type="radio" name="plswitch" value="no"<?php echo exec('cat /nvezos/set/gpu/plnoswitch.set'); ?> > No <br><br>
				Perf Level setting corrects an issue with 1050ti overclocking. Set to 2 for any 1050ti's, set to 3 for all other GPU's.<br>
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<th>GPU Index</th><th>Core Offset</th><th>Memory Offset</th><th>Fan Speed</th><th>Power Limit</th><th>Perf Level</th>
					</thead>
					<tbody>
					<?php
						exec('nvidia-smi --query-gpu=count --format=csv,noheader > /nvezos/set/gpu/numgpu.data');
						$numgpu = exec('tail -n 1 /nvezos/set/gpu/numgpu.data');
						if ($numgpu >= 1) { ?>	
					<tr>
						<td>0</td>
						<td><input name="gpu0core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu0core.set'); ?>'  /></td>
						<td><input name="gpu0mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu0mem.set'); ?>'  /></td>
						<td><input name="gpu0fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu0fan.set'); ?>'  /></td>
						<td><input name="gpu0pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu0pl.set'); ?>'  /></td>
						<td><input name="gpu0perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu0perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 2) { ?>
					<tr>
						<td>1</td>
						<td><input name="gpu1core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu1core.set'); ?>'  /></td>
						<td><input name="gpu1mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu1mem.set'); ?>'  /></td>
						<td><input name="gpu1fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu1fan.set'); ?>'  /></td>
						<td><input name="gpu1pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu1pl.set'); ?>'  /></td>
						<td><input name="gpu1perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu1perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 3) { ?>
					<tr>
						<td>2</td>
						<td><input name="gpu2core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu2core.set'); ?>'  /></td>
						<td><input name="gpu2mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu2mem.set'); ?>'  /></td>
						<td><input name="gpu2fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu2fan.set'); ?>'  /></td>
						<td><input name="gpu2pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu2pl.set'); ?>'  /></td>
						<td><input name="gpu2perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu2perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 4) { ?>
					<tr>
						<td>3</td>
						<td><input name="gpu3core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu3core.set'); ?>'  /></td>
						<td><input name="gpu3mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu3mem.set'); ?>'  /></td>
						<td><input name="gpu3fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu3fan.set'); ?>'  /></td>
						<td><input name="gpu3pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu3pl.set'); ?>'  /></td>
						<td><input name="gpu3perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu3perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 5) { ?>
					<tr>
						<td>4</td>
						<td><input name="gpu4core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu4core.set'); ?>'  /></td>
						<td><input name="gpu4mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu4mem.set'); ?>'  /></td>
						<td><input name="gpu4fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu4fan.set'); ?>'  /></td>
						<td><input name="gpu4pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu4pl.set'); ?>'  /></td>
						<td><input name="gpu4perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu4perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 6) { ?>
					<tr>
						<td>5</td>
						<td><input name="gpu5core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu5core.set'); ?>'  /></td>
						<td><input name="gpu5mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu5mem.set'); ?>'  /></td>
						<td><input name="gpu5fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu5fan.set'); ?>'  /></td>
						<td><input name="gpu5pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu5pl.set'); ?>'  /></td>
						<td><input name="gpu5perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu5perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 7) { ?>
					<tr>
						<td>6</td>
						<td><input name="gpu6core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu6core.set'); ?>'  /></td>
						<td><input name="gpu6mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu6mem.set'); ?>'  /></td>
						<td><input name="gpu6fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu6fan.set'); ?>'  /></td>
						<td><input name="gpu6pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu6pl.set'); ?>'  /></td>
						<td><input name="gpu6perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu6perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 8) { ?>
					<tr>
						<td>7</td>
						<td><input name="gpu7core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu7core.set'); ?>'  /></td>
						<td><input name="gpu7mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu7mem.set'); ?>'  /></td>
						<td><input name="gpu7fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu7fan.set'); ?>'  /></td>
						<td><input name="gpu7pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu7pl.set'); ?>'  /></td>
						<td><input name="gpu7perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu7perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 9) { ?>
					<tr>
						<td>8</td>
						<td><input name="gpu8core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu8core.set'); ?>'  /></td>
						<td><input name="gpu8mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu8mem.set'); ?>'  /></td>
						<td><input name="gpu8fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu8fan.set'); ?>'  /></td>
						<td><input name="gpu8pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu8pl.set'); ?>'  /></td>
						<td><input name="gpu8perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu8perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 10) { ?>
					<tr>
						<td>9</td>
						<td><input name="gpu9core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu9core.set'); ?>'  /></td>
						<td><input name="gpu9mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu9mem.set'); ?>'  /></td>
						<td><input name="gpu9fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu9fan.set'); ?>'  /></td>
						<td><input name="gpu9pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu9pl.set'); ?>'  /></td>
						<td><input name="gpu9perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu9perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 11) { ?>
					<tr>
						<td>10</td>
						<td><input name="gpu10core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu10core.set'); ?>'  /></td>
						<td><input name="gpu10mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu10mem.set'); ?>'  /></td>
						<td><input name="gpu10fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu10fan.set'); ?>'  /></td>
						<td><input name="gpu10pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu10pl.set'); ?>'  /></td>
						<td><input name="gpu10perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu10perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 12) { ?>
					<tr>
						<td>11</td>
						<td><input name="gpu11core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu11core.set'); ?>'  /></td>
						<td><input name="gpu11mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu11mem.set'); ?>'  /></td>
						<td><input name="gpu11fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu11fan.set'); ?>'  /></td>
						<td><input name="gpu11pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu11pl.set'); ?>'  /></td>
						<td><input name="gpu11perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu11perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 13) { ?>
					<tr>
						<td>12</td>
						<td><input name="gpu12core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu12core.set'); ?>'  /></td>
						<td><input name="gpu12mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu12mem.set'); ?>'  /></td>
						<td><input name="gpu12fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu12fan.set'); ?>'  /></td>
						<td><input name="gpu12pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu12pl.set'); ?>'  /></td>
						<td><input name="gpu12perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu12perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 14) { ?>
					<tr>
						<td>13</td>
						<td><input name="gpu13core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu13core.set'); ?>'  /></td>
						<td><input name="gpu13mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu13mem.set'); ?>'  /></td>
						<td><input name="gpu13fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu13fan.set'); ?>'  /></td>
						<td><input name="gpu13pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu13pl.set'); ?>'  /></td>
						<td><input name="gpu13perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu13perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 15) { ?>
					<tr>
						<td>14</td>
						<td><input name="gpu14core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu14core.set'); ?>'  /></td>
						<td><input name="gpu14mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu14mem.set'); ?>'  /></td>
						<td><input name="gpu14fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu14fan.set'); ?>'  /></td>
						<td><input name="gpu14pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu14pl.set'); ?>'  /></td>
						<td><input name="gpu14perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu14perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					<?php
						if ($numgpu >= 16) { ?>
					<tr>
						<td>15</td>
						<td><input name="gpu15core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu15core.set'); ?>'  /></td>
						<td><input name="gpu15mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu15mem.set'); ?>'  /></td>
						<td><input name="gpu15fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu15fan.set'); ?>'  /></td>
						<td><input name="gpu15pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu15pl.set'); ?>'  /></td>
						<td><input name="gpu15perf" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu15perf.set'); ?>'  /></td>
					</tr>
					<?php }
					?>
					</tbody>
				</table>
				<br>
				Enter default username below (The one you setup at install - this is needed to attach to it's X session)<br>
				<input name="defaultusername" type="text" style="width: 110px;" value='<?php echo exec('cat /nvezos/set/status/defaultuser.set'); ?>'  />
				<br><br>
				The next page may take 10s or so to load, you will then be redirected, please do not cancel or refresh.<br>
				<input type="submit" name="submit" value="Save and Apply OC">					
			    </form>
				</div>
                            </div>
                    	    </div>
			  <div class=col-lg-3>
			  <h5>
			  WARNING: Overclocking via this interface will ONLY function with nvidia GPU's and is performed entirely at the user's risk. <br><br>
			  NOTE: If you're having issues with this overclock settings not applying or have added new GPU's it's likely the xorg.conf is causing the issue. Click <a href="gpufix.php">HERE</a> to run a script that will rebuild xorg.conf and reboot the miner. (After clicking, the site will not reload until the reboot is complete)<br><br>
			  Please note, nvidia is aware of a bug that causes the GPU not to enter it's highest power mode during compute loads, due to this the observed clocks while mining may be lower than what you set 				  here. To offset, simply increase the value here. I.E. with GTX 1060 I use a +1200 memory offset which results in an actual memory offset under a mining load of +600. <br><br>
			   Just ignore the GPU's you dont have, they'll likely be filtered out in a future release. If you wish to disable overclocking simply set to "No" and apply settings, everything in the form will be disregarded. Fan Speed Control and Power Limit are set independently from OC control, so you can have 1, 2, or all 3.<br><br>
			  It's recommended to start with a low overclock then increase in steps. If an overclock results in instability, set lower values here, then reboot the system entirely via the "Network Settings" 				  page.<br><br>
			  All values (other than fan speed and power limits) are entered as offset and must be whole integers. You can decrease clockspeed by using a negative number, in my case I run around -100 core 				  offset on my GTX 1060's.<br><br>
			  Power limits are set in watts, fan speed is set in percent. (NOTE: Do not enter the "%" sign in the form, only the value) If you lower the power limit too far it's likely to cause the card to 	 			  throttle. In order to disable Power Limit setting after it has been enabled, you must disable, then reboot - easier to just set higher if that's what you desire.<br><br>
			  Rarely there is an occasion where not all overclocking settings are applied, if this occurs, just come back to this page and submit again. After a reboot, if you applied OC settings, they will return within 5 min of boot, please do not worry if they return to stock at boot time.<br>
			  </h5>
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
