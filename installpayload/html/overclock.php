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
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                     <h2>Miner Settings</h2>   
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
                    <div class="col-lg-12">
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
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<th>GPU Index</th><th>Core Offset</th><th>Memory Offset</th><th>Fan Speed</th><th>Power Limit</th>
					</thead>
					<tbody>
					<tr>
						<td>0</td>
						<td><input name="gpu0core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu0core.set'); ?>'  /></td>
						<td><input name="gpu0mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu0mem.set'); ?>'  /></td>
						<td><input name="gpu0fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu0fan.set'); ?>'  /></td>
						<td><input name="gpu0pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu0pl.set'); ?>'  /></td>
					</tr>
					<tr>
						<td>1</td>
						<td><input name="gpu1core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu1core.set'); ?>'  /></td>
						<td><input name="gpu1mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu1mem.set'); ?>'  /></td>
						<td><input name="gpu1fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu1fan.set'); ?>'  /></td>
						<td><input name="gpu1pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu1pl.set'); ?>'  /></td>
					</tr>
					<tr>
						<td>2</td>
						<td><input name="gpu2core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu2core.set'); ?>'  /></td>
						<td><input name="gpu2mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu2mem.set'); ?>'  /></td>
						<td><input name="gpu2fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu2fan.set'); ?>'  /></td>
						<td><input name="gpu2pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu2pl.set'); ?>'  /></td>
					</tr>
					<tr>
						<td>3</td>
						<td><input name="gpu3core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu3core.set'); ?>'  /></td>
						<td><input name="gpu3mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu3mem.set'); ?>'  /></td>
						<td><input name="gpu3fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu3fan.set'); ?>'  /></td>
						<td><input name="gpu3pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu3pl.set'); ?>'  /></td>
					</tr>
					<tr>
						<td>4</td>
						<td><input name="gpu4core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu4core.set'); ?>'  /></td>
						<td><input name="gpu4mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu4mem.set'); ?>'  /></td>
						<td><input name="gpu4fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu4fan.set'); ?>'  /></td>
						<td><input name="gpu4pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu4pl.set'); ?>'  /></td>
					</tr>
					<tr>
						<td>5</td>
						<td><input name="gpu5core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu5core.set'); ?>'  /></td>
						<td><input name="gpu5mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu5mem.set'); ?>'  /></td>
						<td><input name="gpu5fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu5fan.set'); ?>'  /></td>
						<td><input name="gpu5pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu5pl.set'); ?>'  /></td>
					</tr>
					<tr>
						<td>6</td>
						<td><input name="gpu6core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu6core.set'); ?>'  /></td>
						<td><input name="gpu6mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu6mem.set'); ?>'  /></td>
						<td><input name="gpu6fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu6fan.set'); ?>'  /></td>
						<td><input name="gpu6pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu6pl.set'); ?>'  /></td>
					</tr>
					<tr>
						<td>7</td>
						<td><input name="gpu7core" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu7core.set'); ?>'  /></td>
						<td><input name="gpu7mem" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu7mem.set'); ?>'  /></td>
						<td><input name="gpu7fan" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu7fan.set'); ?>'  /></td>
						<td><input name="gpu7pl" type="text" style="width: 70px;" value='<?php echo exec('cat /nvezos/set/gpu/gpu7pl.set'); ?>'  /></td>
					</tr>
					</tbody>
				</table>
				<br>
				The next page may take 10s or so to load, please do not cancel.<br>
				<input type="submit" name="submit" value="Save and Apply OC">					
			    </form>
				</div>
                            </div>
                    	    </div>
			  <div class=col-lg-3>
			  <h5>
			  WARNING: Overclocking via this interface will ONLY function with nvidia GPU's and is performed entirely at the user's risk. <br><br>
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
