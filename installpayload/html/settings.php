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
                             This page allows you to manage the miner settings.
                        </div>                       
                    </div>
		</div>
		<div class="row">
		  
		     <div class="col-lg-3">
		            <div class="panel panel-primary">
                            <div class="panel-heading">
                            <div class="text-center">
				Set Operational Miner
			    </div>
                            </div>
			    </div>
                            <div class="panel-body">
			    <div class="text-center">Currently running: 
				<?php
					echo exec('cat /nvezos/set/status/whatarewemining.set');
				?>
			    </div>
                            <form name="MiningServiceSelection" method="Post" ACTION ="setminingservice.php">
				<input type="radio" name="miningselector" value="eth"> Eth <br>
				<input type="radio" name="miningselector" value="music"> Musicoin <br>
				<input type="radio" name="miningselector" value="etc"> ETC <br>
				<input type="radio" name="miningselector" value="ubiq"> Ubiq <br>
				<input type="radio" name="miningselector" value="exp"> Expanse <br><br>
				<div class="text-center"><input type="submit" value="Set and Restart Mining Service"></div>
			    </form>
			    	<br><br>
				<div class="text-center"> <h4> <a target="_blank" href="stopservices.php">Stop All Mining Services</a> </h4> </div>
                            </div>
                    	    </div>

   		     <div class="col-lg-4">
		            <div class="panel panel-primary">
                            <div class="panel-heading">
                            <div class="text-center">
				Set Pool Status Pages
			    </div>
                            </div>
			    </div>
                            <div class="panel-body">
			    <div class="text-center">Enter below the direct links to your various mining pool dashboards. <br> Website must allow iframe embedding.
                            <form action="savelandingpages.php" method="POST">
    				Eth<br><input name="eth" type="text" style="width: 350px;" value='<?php echo exec('cat /nvezos/set/network/ethpoolpage.set'); ?>'  /><br>
    				Music<br><input name="music" type="text" style="width: 350px;" value='<?php echo exec('cat /nvezos/set/network/musicpoolpage.set'); ?>' /><br>
    				ETC<br><input name="etc" type="text" style="width: 350px;" value='<?php echo exec('cat /nvezos/set/network/etcpoolpage.set'); ?>' /><br>
    				Ubiq<br><input name="ubiq" type="text" style="width: 350px;" value='<?php echo exec('cat /nvezos/set/network/ubiqpoolpage.set'); ?>' /><br>
    				Expanse<br><input name="exp" type="text" style="width: 350px;" value='<?php echo exec('cat /nvezos/set/network/exppoolpage.set'); ?>' /><br><br>
   				<input type="submit" name="submit" value="Save">
			    </form>
			    </div>
                            </div>
                    	    </div>

		</div>
		<div class="row">
   		     <div class="col-lg-7">
		            <div class="panel panel-primary">
                            <div class="panel-heading">
                            <div class="text-center">
				Miner Setup
			    </div>
                            </div>
			    </div>
                            <div class="panel-body">
			    <div class="text-center">This controls the ethminer command for each coin you wish to mine. Enter the full command including the path to ethminer.<br>The default path is /ethminer/cpp-ethereum/build/ethminer/ethminer (and should be populated in the box below by default)
                            <form action="savecommands.php" method="POST">
    				Eth<br><input name="ethcommand" type="text" style="width: 700px;" value='<?php echo exec('cat /nvezos/logs/ethcommandbox.log'); ?>'  /><br>
    				Music<br><input name="musiccommand" type="text" style="width: 700px;" value='<?php echo exec('cat /nvezos/logs/musiccommandbox.log'); ?>' /><br>
    				ETC<br><input name="etccommand" type="text" style="width: 700px;" value='<?php echo exec('cat /nvezos/logs/etccommandbox.log'); ?>' /><br>
    				Ubiq<br><input name="ubiqcommand" type="text" style="width: 700px;" value='<?php echo exec('cat /nvezos/logs/ubiqcommandbox.log'); ?>' /><br>
    				Expanse<br><input name="expcommand" type="text" style="width: 700px;" value='<?php echo exec('cat /nvezos/logs/expcommandbox.log'); ?>' /><br><br>
   				<input type="submit" name="submit" value="Save">
			    </form>
			    </div>
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
