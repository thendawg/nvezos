<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="refresh" content="5">
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
                 


                    <li class="active-link">
                        <a href="index.php" ><i class="fa fa-desktop "></i>Monitor Rig</a>
                    </li>
                    <li>
                        <a href="settings.php"><i class="fa fa-edit "></i>Miner Settings</a>
                    </li>
  	            <li>
                        <a href="poolstatus.php"><i class="fa fa-table "></i>Pool Status</a>
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
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome to NvEZOS.</strong> This page allows you to monitor the rig in real time. Please use the "Miner Settings" page to configure 					this miner. <br> <strong> <a target="_blank" href="minerlog.php">View Miner Log Output</a> </strong> <br>This software is free to use, but donations are always appreciated. Eth Address (MEW) - 0x3d454b7b858335805f83D30842d9f0fACd50e545
                        </div>                       
                    </div>
		</div>


		<div class="row">
                    <div class="col-lg-2">
		      <div class="panel panel-primary">
                            <div class="panel-heading">
                            <div class="text-center">
				Current Hashrate
			    </div>
                            </div>
                            <div class="panel-body">
			    <div class="text-center">
				<?php
				$gpu0util = exec('/nvezos/scripts/system/gpu0util.sh');
				$hashrate = exec('/nvezos/scripts/query/queryhashrate.sh');
				if ($gpu0util > "50") {
					echo '<div class="shadedboxgreen"><h3> '.$hashrate.' </h3></div>';
						}
				else {
					echo '<div class="shadedboxred"> Hashrate invalid - check miner log if this persists. </div>';
						}
				?>
			    </div>
                            </div>
                    </div>
		</div>
		<div class="col-lg-2">
		      <div class="panel panel-primary">
                            <div class="panel-heading">
                            <div class="text-center">
				Currently Mining
			    </div>
                            </div>
                            <div class="panel-body">
			    <div class="text-center">
                            <h3>
				<?php
				$miner = exec('cat /nvezos/set/status/whatarewemining.set');
			        echo exec('cat /nvezos/set/status/whatarewemining.set');
				?>
			    </h3>
			    </div>
                            </div>
                    </div>
		</div>
		<div class="col-lg-2">
		      <div class="panel panel-primary">
                            <div class="panel-heading">
                            <div class="text-center">
				Service Status
			    </div>
                            </div>
                            <div class="panel-body">
			    <div class="text-center">
                            <h3>
				<?php
				$servicename = exec('cat /nvezos/set/status/currentservicename.set');
			        exec('systemctl status '.$servicename.'', $output, $service_status);			
					if ($service_status==0) { echo '<font color="green"> UP </font>'; }
					else { echo '<font color="red"> DOWN </font>'; } 
				
				?>
			    </h3>
			    </div>
                            </div>
                    </div>
		</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="text-center">
				<h3>GPU Monitoring</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">	
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
                            </tbody>
                        </table>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
			<?php
				echo exec('date');
			?>
			</div>
		</div>
		
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2017 NPMining | NvEZOS Beta v0.6</a>
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
