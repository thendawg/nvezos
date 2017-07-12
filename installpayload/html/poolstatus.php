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
  	            <li class="active-link">
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
                     <h2>Pool Status</h2>   
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
                             This page allows you to monitor your mining pool from within the NvEZOS GUI. You must first configure your pool monitoring url for each mining service on the "Miner Settings" page.
                        </div>                       
                    </div>
		</div>
		<div class="row">
		    <div class="col-lg-12 ">
			<?php 
				$poolurl = exec('cat /nvezos/set/status/poolurl.data');
				echo '<iframe src="'.$poolurl.'" name="targetframe" width="1250" height="1000" allowTransparency="true" scrolling="yes" frameborder="0" > </iframe>';
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
