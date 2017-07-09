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
  		    <li>
                        <a href="overclock.php"><i class="fa fa-edit "></i>Overclocking</a>
                    </li>
		   <li class="active-link">
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
                     <h2>Network Settings</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                             This page allows you to manage the network settings. After you submit the IP changes, you should be directed to the new IP. <br> All IP changes are processed at once, so please insure all 				     settings are correct before submitting. <BR> WARNING: Improper settings on this page could cause loss of access to mining rig. Proceed carefully. 
                        </div>                       
                    </div>
		</div>
		<div class="row">
		  
		     <div class="col-lg-4">
		            <div class="panel panel-primary">
                            <div class="panel-heading">
                            <div class="text-center">
				IP Settings
			    </div>
                            </div>
			    </div>
                            <div class="panel-body">
			    <div class="text-center">Set IP Type:<br>
               	    <form name="ipsettings" method="POST" ACTION ="setip.php">
				<input type="radio" name="ipselector" value="dhcp"> DHCP <br>
				<input type="radio" name="ipselector" value="static"> Static <br>
				If set to DHCP, any settings below will not be applied. <br>
				IP<br><input name="ipaddress" type="text" style="width: 225px;" /><br>
				Subnet Mask<br><input name="subnetmask" type="text" style="width: 225px;" /><br>
				Gateway<br><input name="gateway" type="text" style="width: 225px;" /><br>
				DNS Server 1<br><input name="dns1" type="text" style="width: 225px;" /><br>
				DNS Server 2<br><input name="dns2" type="text" style="width: 225px;" /><br><br>
				<input type="submit" name="submit" value="Set and Restart Networking/Apache"><br><br>
				</div>
			    </form>
                            </div>
                    	    </div>

   		     <div class="col-lg-4">
		            <div class="panel panel-primary">
                            <div class="panel-heading">
                            <div class="text-center">
				Set Hostname
			    </div>
                            </div>
			    </div>
                            <div class="panel-body">
			    <div class="text-center">Enter the hostname below. <br> You MUST restart the system to apply this change.
                <form name="sethostname" action="sethostname.php" method="POST">
    				Hostname<br><input name="hostname" type="text" style="width: 275px;" value='<?php echo exec('hostname'); ?>'  /><br><br>
   				<input type="submit" name="submit" value="Save">
			    </form>
			    </div>
                            </div>
                    	    </div>

		</div>
		<div class="row">
   		     <div class="col-lg-4">
		            <div class="panel panel-primary">
                            <div class="panel-heading">
                            <div class="text-center">
				Restart Miner WARNING: This will cause the entire system to reboot
			    </div>
                            </div>
			    </div>
                            <div class="panel-body">
			    <div class="text-center">Type "restart" in the text box below to confirm.
                            <form action="restartminer.php" method="POST">
    				<input name="confirmation" type="text" style="width: 180px;" /><br><br>
   				<input type="submit" name="submit" value="Restart Miner">
			    </form>
			    </div>
                            </div>
                    	    </div>
  			    <div class="col-lg-4">
		            <div class="panel panel-primary">
                            <div class="panel-heading">
                            <div class="text-center">
				Change WebUI Password
			    </div>
                            </div>
			    </div>
                            <div class="panel-body">
			    <div class="text-center">Enter new password below.
                            <form action="changepw.php" method="POST">
    				<input name="newpw" type="text" style="width: 180px;" /><br><br>
   				<input type="submit" name="submit" value="Change Password">
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
