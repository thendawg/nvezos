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
                <li class="active-link">
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
                     <h2>Miner Settings Documentation</h2>   
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
            <div class="col-lg-8">
                <div class="alert alert-info">
				<div class="text-center">
				Please read this before configuring miners!
				</div>
                </div>                       
            </div>
		<br>
		</div>
        <div class="row">
		<div class="col-lg-6">
		<h4>MultiMine Info</h4><br>
		The V1.0 interface now allows you to run multiple miner instances at once. In order to do this efficiently, you must use the appropriate commands for each miner such that each miner instance uses it's own GPU(s).
		With ewbf you use the --cuda_devices flag, with ethminer you will use the --cuda-devices flag. You simply specifiy the device indexes you wish for that instance to use after the flag with spaces to delimit them. If 
		you choose to enable Dev Mining while using multi-mining, it will only use GPU 0, so that you can give back while still mining normally. Here are a couple examples, in the first example only GPU 0 is used, in the second GPUs 0,1,2, and 3 are used: 
		<br>
		<br>
		/ewbf/miner --server zen.suprnova.cc --user removed --pass removed --port 3618 --cuda_devices 0
		<br>
		/ethminer/cpp-ethereum/build/ethminer/ethminer -F http://us.ubiqpool.io:8888/Removed -U --cuda-devices 0 1 2 3
		<br>
		<br>
		<h4>General Miner Daemon Config</h4>
		<br>
		<br>
		Each line is the full path and command needed to launch each miner. The full paths to the different miners are as follows:
		<br>
		<br>
		Ethminer - /ethminer/cpp-ethereum/build/ethminer/ethminer
		<br>EWBF - /ewbf/miner
		<br>Claymore - /claymore/ethdcrminer64
		<br>
		<br>
		For all three miners, you can pass all of the same arguments on this line that you would in a config file, however, there is no need to set any variables. The command you use will be the same as if you were using the 3 various
		miners outside of NvEZOS - for reference this is the same exact procedure as in the Beta releases. For further help visit the subreddit, <a href="https://www.reddit.com/r/nvezos">HERE</a>.
		<br>
		<br>
		<h4>Miner Status Page</h4>
		<br>
		<br>
		This simply gives you a way to easilly access your status page for the miner you have running, simply enter the URL to the dashboard for that miner and when that miner is running the Pool Status link will take you to that page. This does not currently work with multi-mining - it will simply use the first miner enabled.
		<br>
		<br>
		<h4>Notes</h4>
		<br>
		<br>
		EWBF Hashrate - The log is slow to update, so the hashrate and log often will not update until 5-10 min after start.
		<br>
		<br>
		Claymore Hashrate - Due to the way hashrate is pulled from logfiles, and the large combination of different Claymore hashrate outputs to the log, I have yet to find a way to make the hashrate display work, so for now you will just need to use the log at the bottom of the page.
		<br>
		<br>
		Dev Mining is enabled on first boot, however, as soon as you start your own miner, or hit disable all services, it will be disabled, and will not auto-run in the future. If you wish to give back, feel free to donate or run the dev miner service manually!
		<br>
		You can find more documentation and tutorials <a href="https://www.nvezos.com/documentation">HERE</a>.
		<br>
		</div>
		</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">  
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2017 NPMining | NvEZOS Beta v1.02</a>
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