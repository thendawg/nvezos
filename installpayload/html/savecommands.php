<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="refresh" content="3;url=settings.php">
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
                    <li class="active-link">
                        <a href="settings.php"><i class="fa fa-edit "></i>Miner Settings</a>
                    </li>
  	            <li>
                        <a href="poolstatus.php"><i class="fa fa-table "></i>Pool Status</a>
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
                     <h2>Miner Settings</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                             Applying settings... You will be redirected back to the settings page once complete
                        </div>                       
                    </div>
		</div>
		<div class="row">
		    <div class="col-lg-12">
			<div class="alert alert-info">
		            <?php
			    $ethcommand = $_POST['ethcommand'];
			    $musiccommand = $_POST['musiccommand'];
			    $etccommand = $_POST['etccommand'];
			    $ubiqcommand = $_POST['ubiqcommand'];
			    $expcommand = $_POST['expcommand'];
				file_put_contents('/nvezos/logs/ethcommandbox.log', "".$ethcommand."\n");
				file_put_contents('/nvezos/logs/musiccommandbox.log', "".$musiccommand."\n");
				file_put_contents('/nvezos/logs/etccommandbox.log', "".$etccommand."\n");
				file_put_contents('/nvezos/logs/ubiqcommandbox.log', "".$ubiqcommand."\n");
				file_put_contents('/nvezos/logs/expcommandbox.log', "".$expcommand."\n");
			    file_put_contents('/nvezos/scripts/miners/eth.sh', '#!/bin/bash'."\n".
					'/bin/cp -rf /nvezos/set/network/ethpoolpage.set /nvezos/set/status/poolurl.data'."\n". 
					'echo "eth.service" > /nvezos/set/status/currentservicename.set'."\n".
					'echo "Eth" > /nvezos/set/status/whatarewemining.set'."\n".
					$ethcommand.' &>> /nvezos/logs/miner.log'."\n");
			    file_put_contents('/nvezos/scripts/miners/music.sh', '#!/bin/bash'."\n".
					'/bin/cp -rf /nvezos/set/network/musicpoolpage.set /nvezos/set/status/poolurl.data'."\n".
					'echo "music.service" > /nvezos/set/status/currentservicename.set'."\n".
					'echo "Musicoin" > /nvezos/set/status/whatarewemining.set'."\n".
					$musiccommand.' &>> /nvezos/logs/miner.log'."\n");
			    file_put_contents('/nvezos/scripts/miners/etc.sh', '#!/bin/bash'."\n".
					'/bin/cp -rf /nvezos/set/network/etcpoolpage.set /nvezos/set/status/poolurl.data'."\n".
					'echo "etc.service" > /nvezos/set/status/currentservicename.set'."\n".
					'echo "ETC" > /nvezos/set/status/whatarewemining.set'."\n".
					$etccommand.' &>> /nvezos/logs/miner.log'."\n");
			    file_put_contents('/nvezos/scripts/miners/ubiq.sh', '#!/bin/bash'."\n".
					'/bin/cp -rf /nvezos/set/network/ubiqpoolpage.set /nvezos/set/status/poolurl.data'."\n".
					'echo "ubiq.service" > /nvezos/set/status/currentservicename.set'."\n".
					'echo "Ubiq" > /nvezos/set/status/whatarewemining.set'."\n".
					$ubiqcommand.' &>> /nvezos/logs/miner.log'."\n");
			    file_put_contents('/nvezos/scripts/miners/exp.sh', '#!/bin/bash'."\n". 
					'/bin/cp -rf /nvezos/set/network/exppoolpage.set /nvezos/set/status/poolurl.data'."\n".
					'echo "exp.service" > /nvezos/set/status/currentservicename.set'."\n".
					'echo "Expanse" > /nvezos/set/status/whatarewemining.set'."\n".
					$expcommand.' &>> /nvezos/logs/miner.log'."\n");
				exec('chmod +x /nvezos/scripts/miners/eth.sh');
				exec('chmod +x /nvezos/scripts/miners/music.sh');
				exec('chmod +x /nvezos/scripts/miners/etc.sh');
				exec('chmod +x /nvezos/scripts/miners/ubiq.sh');
				exec('chmod +x /nvezos/scripts/miners/exp.sh');
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
