<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="refresh" content="12;url=<?php $newip = $_POST['ipaddress']; echo "https://".$newip."/index.php"; ?>">
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
                     <h2>IP Settings</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                             Applying IP settings... You will be redirected to the new address once the settings are updated. (Approx. 10 seconds)
			     <br>If you encounter any issues after performing an IP change here, consider rebooting the miner.
                        </div>                       
                    </div>
		</div>
	<?php
		$ipselection = $_POST['ipselector'];
		$subnetmask = $_POST['subnetmask'];
		$gateway = $_POST['gateway'];	
		$dns1 = $_POST['dns1'];
		$dns2 = $_POST['dns2'];
		$intname = exec('/nvezos/scripts/network/getinterface.sh');
		if ($ipselection == "static") {
			file_put_contents('/nvezos/set/network/ip.set', '# This IP config created by NvEZOS WebUI'."\n \n".
				'source /etc/network/interfaces.d/*'."\n \n".
				'auto lo'."\n".
				'iface lo inet loopback'."\n \n".
				'auto '.$intname."\n".
				'iface '.$intname.' inet static'."\n".
				'address '.$newip."\n".
				'netmask '.$subnetmask."\n".
				'gateway '.$gateway."\n".
				'dns-nameservers '.$dns1." ".$dns2."\n"); 
					    }
		elseif ($ipselection == "dhcp") {					
			file_put_contents('/nvezos/testip.config', '# This IP config created by NvEZOS WebUI'."\n \n".
				'source /etc/network/interfaces.d/*'."\n \n".
				'auto lo'."\n".
				'iface lo inet loopback'."\n \n".
				'auto '.$intname."\n".
				'iface '.$intname.' inet dhcp'."\n");
					      }
		else { echo "Something went wrong!"; }
		exec('/nvezos/scripts/network/applysettings.sh');
		exec('sudo ip addr flush enp0s3 && sudo systemctl restart networking.service');
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
