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
				This page configures the miner daemons. See documentation <a target="_blank" href="settingshelp.php">here</a> for setup help.
				</div>
                </div>                       
            </div>
		<br>
		</div>
        <div class="row">
            <div class="col-lg-3">
			<h4><br></h4>
			<div class="panel panel-primary">
				<div class="panel-heading">
                <div class="text-center">
                     Enable Multi-Mining?
				</div>
				</div>
				<div class="panel-body">
				<div class="text-center">
				<form name="multiminesetup" method="Post" ACTION ="setmultimine.php">
				WARNING: Please read doc <a target="_blank" href="settingshelp.php">HERE</a> before enabling.
				<input type="radio" name="multiswitch" value="enabled" <?php echo exec('cat /nvezos/set/multimine/switch.set'); ?> > Yes <br>
				<input type="radio" name="multiswitch" value="disabled" <?php echo exec('cat /nvezos/set/multimine/switchno.set'); ?> > No <br>
				<input type="submit" name="submit" value="Save">
				</form>
				</div>
				</div>
			</div>
			<center><h4><a href="stopservices.php">STOP AND DISABLE ALL MINING SERVICES</a></h4></center>
            </div>
			<div class="col-lg-5">
			<div class="text-center">
			<h4>Set Active Mining Service(s)</h4>
			<?php 
			$ismultienabled = exec('cat /nvezos/set/multimine/multimine.set');
			if ($ismultienabled=="disabled"): ?>
			<form name="setminer" method="Post" ACTION ="setminer.php">
			<table class="table table-striped table-bordered table-hover">
			<thead>
			<th>Miner Name</th>
			<th>Enabled?</th>
			<th>Miner Name</th>
			<th>Enabled?</th>
			</thead>
			<tbody>
			<tr> 
				<td> <?php echo exec('cat /nvezos/set/miners/minername1.set'); ?> </td>
				<td> <input type="radio" name="minerenswitch" value="miner1" <?php echo exec('cat /nvezos/set/miners/miner1en.set'); ?> > </td>
				<td> <?php echo exec('cat /nvezos/set/miners/minername2.set'); ?> </td>
				<td> <input type="radio" name="minerenswitch" value="miner2" <?php echo exec('cat /nvezos/set/miners/miner2en.set'); ?> > </td>
			</tr>
			<tr> 
				<td> <?php echo exec('cat /nvezos/set/miners/minername3.set'); ?> </td>
				<td> <input type="radio" name="minerenswitch" value="miner3" <?php echo exec('cat /nvezos/set/miners/miner3en.set'); ?> > </td>
				<td> <?php echo exec('cat /nvezos/set/miners/minername4.set'); ?> </td>
				<td> <input type="radio" name="minerenswitch" value="miner4" <?php echo exec('cat /nvezos/set/miners/miner4en.set'); ?> > </td>
			</tr>
			<tr>
				<td> <?php echo exec('cat /nvezos/set/miners/minername5.set'); ?> </td>
				<td> <input type="radio" name="minerenswitch" value="miner5" <?php echo exec('cat /nvezos/set/miners/miner5en.set'); ?> > </td>
				<td> <?php echo exec('cat /nvezos/set/miners/minername6.set'); ?> </td>
				<td> <input type="radio" name="minerenswitch" value="miner6" <?php echo exec('cat /nvezos/set/miners/miner6en.set'); ?> > </td>
			</tr>
			<tr> 
				<td> <?php echo exec('cat /nvezos/set/miners/minername7.set'); ?> </td>
				<td> <input type="radio" name="minerenswitch" value="miner7" <?php echo exec('cat /nvezos/set/miners/miner7en.set'); ?> > </td>
				<td> <?php echo exec('cat /nvezos/set/miners/minername8.set'); ?> </td>
				<td> <input type="radio" name="minerenswitch" value="miner8" <?php echo exec('cat /nvezos/set/miners/miner8en.set'); ?> > </td>
			</tr>
			<tr> 
				<td> <?php echo exec('cat /nvezos/set/miners/minername9.set'); ?> </td>
				<td> <input type="radio" name="minerenswitch" value="miner9" <?php echo exec('cat /nvezos/set/miners/miner9en.set'); ?> > </td>
				<td> <?php echo exec('cat /nvezos/set/miners/minername10.set'); ?> </td>
				<td> <input type="radio" name="minerenswitch" value="miner10" <?php echo exec('cat /nvezos/set/miners/miner10en.set'); ?> > </td>
			</tr>
			<tr>
				<td> Dev Mining </td>
				<td> <input type="radio" name="minerenswitch" value="devminer" <?php echo exec('cat /nvezos/set/miners/devmineren.set'); ?> > </td>
				<td> </td>
				<td> </td>
			</tr>
			</tbody>
			</table>
			<input type="submit" name="submitminerenable" value="Enable Selected Miner(s) and Restart Mining">
			</form>
			<?php elseif ($ismultienabled=="enabled"): ?>
			<form name="setminermulti" method="Post" ACTION ="setminer.php">
			<table class="table table-striped table-bordered table-hover">
			<thead>
			<th>Miner Name</th>
			<th>Enabled?</th>
			<th>Miner Name</th>
			<th>Enabled?</th>
			</thead>
			<tbody>
			<tr> 
				<td> <?php echo exec('cat /nvezos/set/miners/minername1.set'); ?> </td>
				<td> <input type="checkbox" name="minerenswitchmulti1" <?php echo exec('cat /nvezos/set/miners/miner1multien.set'); ?> > </td>
				<td> <?php echo exec('cat /nvezos/set/miners/minername2.set'); ?> </td>
				<td> <input type="checkbox" name="minerenswitchmulti2" <?php echo exec('cat /nvezos/set/miners/miner2multien.set'); ?> > </td>
			</tr>
			<tr> 
				<td> <?php echo exec('cat /nvezos/set/miners/minername3.set'); ?> </td>
				<td> <input type="checkbox" name="minerenswitchmulti3" <?php echo exec('cat /nvezos/set/miners/miner3multien.set'); ?> > </td>
				<td> <?php echo exec('cat /nvezos/set/miners/minername4.set'); ?> </td>
				<td> <input type="checkbox" name="minerenswitchmulti4" <?php echo exec('cat /nvezos/set/miners/miner4multien.set'); ?> > </td>
			</tr>
			<tr> 
				<td> <?php echo exec('cat /nvezos/set/miners/minername5.set'); ?> </td>
				<td> <input type="checkbox" name="minerenswitchmulti5" <?php echo exec('cat /nvezos/set/miners/miner5multien.set'); ?> > </td>
				<td> <?php echo exec('cat /nvezos/set/miners/minername6.set'); ?> </td>
				<td> <input type="checkbox" name="minerenswitchmulti6" value="miner6" <?php echo exec('cat /nvezos/set/miners/miner6multien.set'); ?> > </td>
			</tr>
			<tr> 
				<td> <?php echo exec('cat /nvezos/set/miners/minername7.set'); ?> </td>
				<td> <input type="checkbox" name="minerenswitchmulti7" <?php echo exec('cat /nvezos/set/miners/miner7multien.set'); ?> > </td>
				<td> <?php echo exec('cat /nvezos/set/miners/minername8.set'); ?> </td>
				<td> <input type="checkbox" name="minerenswitchmulti8" <?php echo exec('cat /nvezos/set/miners/miner8multien.set'); ?> > </td>
			</tr>
			<tr> 
				<td> <?php echo exec('cat /nvezos/set/miners/minername9.set'); ?> </td>
				<td> <input type="checkbox" name="minerenswitchmulti9" <?php echo exec('cat /nvezos/set/miners/miner9multien.set'); ?> > </td>
				<td> <?php echo exec('cat /nvezos/set/miners/minername10.set'); ?> </td>
				<td> <input type="checkbox" name="minerenswitchmulti10" <?php echo exec('cat /nvezos/set/miners/miner10multien.set'); ?> > </td>
			</tr>
			<tr>
				<td> Dev Mining </td>
				<td> <input type="checkbox" name="minerenswitchmultidev" <?php echo exec('cat /nvezos/set/miners/devminermultien.set'); ?> > </td>
				<td> </td>
				<td> </td>
			</tr>
			</tbody>
			</table>
			<input type="submit" name="submitminerenablemulti" value="Enable Selected Miner(s) and Restart Mining">
			</form>
			<?php else: ?>
			<center>Something is wrong - multi-miner value likely not set - set multi-miner to Enabled or Disabled and save to correct this.</center>
			<?php endif; ?>
			</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">
			<div class="text-center">
			<br>
			<h4>Miner Daemon Config</h4>
			<?php 
			function MinerType1() {
				$minertype1 = exec('cat /nvezos/set/miners/minertype1.set');
				if ($minertype1=="ewbf") {
					echo '<select name="minertype1"><option value="ewbf" selected>EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype1=="ethminer") {
					echo '<select name="minertype1"><option value="ewbf">EWBF</option><option value="ethminer" selected>Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype1=="claymore") {
					echo '<select name="minertype1"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore" selected>Claymore</option></select>';
				}
				else {
					echo '<select name="minertype1"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
			}
			function MinerType2() {
				$minertype2 = exec('cat /nvezos/set/miners/minertype2.set');
				if ($minertype2=="ewbf") {
					echo '<select name="minertype2"><option value="ewbf" selected>EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype2=="ethminer") {
					echo '<select name="minertype2"><option value="ewbf">EWBF</option><option value="ethminer" selected>Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype2=="claymore") {
					echo '<select name="minertype2"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore" selected>Claymore</option></select>';
				}
				else {
					echo '<select name="minertype2"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
			}
			function MinerType3() {
				$minertype3 = exec('cat /nvezos/set/miners/minertype3.set');
				if ($minertype3=="ewbf") {
					echo '<select name="minertype3"><option value="ewbf" selected>EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype3=="ethminer") {
					echo '<select name="minertype3"><option value="ewbf">EWBF</option><option value="ethminer" selected>Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype3=="claymore") {
					echo '<select name="minertype3"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore" selected>Claymore</option></select>';
				}
				else {
					echo '<select name="minertype3"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
			}
			function MinerType4() {
				$minertype4 = exec('cat /nvezos/set/miners/minertype4.set');
				if ($minertype4=="ewbf") {
					echo '<select name="minertype4"><option value="ewbf" selected>EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype4=="ethminer") {
					echo '<select name="minertype4"><option value="ewbf">EWBF</option><option value="ethminer" selected>Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype4=="claymore") {
					echo '<select name="minertype4"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore" selected>Claymore</option></select>';
				}
				else {
					echo '<select name="minertype4"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
			}
			function MinerType5() {
				$minertype5 = exec('cat /nvezos/set/miners/minertype5.set');
				if ($minertype5=="ewbf") {
					echo '<select name="minertype5"><option value="ewbf" selected>EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype5=="ethminer") {
					echo '<select name="minertype5"><option value="ewbf">EWBF</option><option value="ethminer" selected>Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype5=="claymore") {
					echo '<select name="minertype5"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore" selected>Claymore</option></select>';
				}
				else {
					echo '<select name="minertype5"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
			}
			function MinerType6() {
				$minertype6 = exec('cat /nvezos/set/miners/minertype6.set');
				if ($minertype6=="ewbf") {
					echo '<select name="minertype6"><option value="ewbf" selected>EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype6=="ethminer") {
					echo '<select name="minertype6"><option value="ewbf">EWBF</option><option value="ethminer" selected>Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype6=="claymore") {
					echo '<select name="minertype6"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore" selected>Claymore</option></select>';
				}
				else {
					echo '<select name="minertype6"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
			}
			function MinerType7() {
				$minertype7 = exec('cat /nvezos/set/miners/minertype7.set');
				if ($minertype7=="ewbf") {
					echo '<select name="minertype7"><option value="ewbf" selected>EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype7=="ethminer") {
					echo '<select name="minertype7"><option value="ewbf">EWBF</option><option value="ethminer" selected>Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype7=="claymore") {
					echo '<select name="minertype7"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore" selected>Claymore</option></select>';
				}
				else {
					echo '<select name="minertype7"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
			}
			function MinerType8() {
				$minertype8 = exec('cat /nvezos/set/miners/minertype8.set');
				if ($minertype8=="ewbf") {
					echo '<select name="minertype8"><option value="ewbf" selected>EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype8=="ethminer") {
					echo '<select name="minertype8"><option value="ewbf">EWBF</option><option value="ethminer" selected>Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype8=="claymore") {
					echo '<select name="minertype8"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore" selected>Claymore</option></select>';
				}
				else {
					echo '<select name="minertype8"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
			}
			function MinerType9() {
				$minertype9 = exec('cat /nvezos/set/miners/minertype9.set');
				if ($minertype9=="ewbf") {
					echo '<select name="minertype9"><option value="ewbf" selected>EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype9=="ethminer") {
					echo '<select name="minertype9"><option value="ewbf">EWBF</option><option value="ethminer" selected>Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype9=="claymore") {
					echo '<select name="minertype9"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore" selected>Claymore</option></select>';
				}
				else {
					echo '<select name="minertype9"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
			}
			function MinerType10() {
				$minertype10 = exec('cat /nvezos/set/miners/minertype10.set');
				if ($minertype10=="ewbf") {
					echo '<select name="minertype10"><option value="ewbf" selected>EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype10=="ethminer") {
					echo '<select name="minertype10"><option value="ewbf">EWBF</option><option value="ethminer" selected>Ethminer</option><option value="claymore">Claymore</option></select>';
				}
				elseif ($minertype10=="claymore") {
					echo '<select name="minertype10"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore" selected>Claymore</option></select>';
				}
				else {
					echo '<select name="minertype10"><option value="ewbf">EWBF</option><option value="ethminer">Ethminer</option><option value="claymore">Claymore</option></select>';
				}
			}
			?>
			<form name="minersetup" method="Post" ACTION ="saveminersetup.php">
			<table class="table table-striped table-bordered table-hover">
			<thead>
			<th>Miner Name</th>
			<th>Miner Type</th>
			<th>Miner Command</th>
			<th>Miner Status Page</th>
			</thead>
			<tbody>
			<tr>
			<td><input name="minername1" type="text" style="width: 100px;" value='<?php echo exec('cat /nvezos/set/miners/minername1.set'); ?>'  /></td>
			<td><?php MinerType1(); ?></td>
			<td><input name="minercommand1" type="text" style="width: 400px;" value='<?php echo exec('cat /nvezos/set/miners/minercommand1.set'); ?>'  /></td>
			<td><input name="minerpage1" type="text" style="width: 225px;" value='<?php echo exec('cat /nvezos/set/miners/minerpage1.set'); ?>'  /></td>
			</tr>
			<tr>
			<td><input name="minername2" type="text" style="width: 100px;" value='<?php echo exec('cat /nvezos/set/miners/minername2.set'); ?>'  /></td>
			<td><?php MinerType2(); ?></td>
			<td><input name="minercommand2" type="text" style="width: 400px;" value='<?php echo exec('cat /nvezos/set/miners/minercommand2.set'); ?>'  /></td>
			<td><input name="minerpage2" type="text" style="width: 225px;" value='<?php echo exec('cat /nvezos/set/miners/minerpage2.set'); ?>'  /></td>
			</tr>
			<tr>
			<td><input name="minername3" type="text" style="width: 100px;" value='<?php echo exec('cat /nvezos/set/miners/minername3.set'); ?>'  /></td>
			<td><?php MinerType3(); ?></td>
			<td><input name="minercommand3" type="text" style="width: 400px;" value='<?php echo exec('cat /nvezos/set/miners/minercommand3.set'); ?>'  /></td>
			<td><input name="minerpage3" type="text" style="width: 225px;" value='<?php echo exec('cat /nvezos/set/miners/minerpage3.set'); ?>'  /></td>
			</tr>
			<tr>
			<td><input name="minername4" type="text" style="width: 100px;" value='<?php echo exec('cat /nvezos/set/miners/minername4.set'); ?>'  /></td>
			<td><?php MinerType4(); ?></td>
			<td><input name="minercommand4" type="text" style="width: 400px;" value='<?php echo exec('cat /nvezos/set/miners/minercommand4.set'); ?>'  /></td>
			<td><input name="minerpage4" type="text" style="width: 225px;" value='<?php echo exec('cat /nvezos/set/miners/minerpage4.set'); ?>'  /></td>
			</tr>
			<tr>
			<td><input name="minername5" type="text" style="width: 100px;" value='<?php echo exec('cat /nvezos/set/miners/minername5.set'); ?>'  /></td>
			<td><?php MinerType5(); ?></td>
			<td><input name="minercommand5" type="text" style="width: 400px;" value='<?php echo exec('cat /nvezos/set/miners/minercommand5.set'); ?>'  /></td>
			<td><input name="minerpage5" type="text" style="width: 225px;" value='<?php echo exec('cat /nvezos/set/miners/minerpage5.set'); ?>'  /></td>
			</tr>
			<tr>
			<td><input name="minername6" type="text" style="width: 100px;" value='<?php echo exec('cat /nvezos/set/miners/minername6.set'); ?>'  /></td>
			<td><?php MinerType6(); ?></td>
			<td><input name="minercommand6" type="text" style="width: 400px;" value='<?php echo exec('cat /nvezos/set/miners/minercommand6.set'); ?>'  /></td>
			<td><input name="minerpage6" type="text" style="width: 225px;" value='<?php echo exec('cat /nvezos/set/miners/minerpage6.set'); ?>'  /></td>
			</tr>
			<tr>
			<td><input name="minername7" type="text" style="width: 100px;" value='<?php echo exec('cat /nvezos/set/miners/minername7.set'); ?>'  /></td>
			<td><?php MinerType7(); ?></td>
			<td><input name="minercommand7" type="text" style="width: 400px;" value='<?php echo exec('cat /nvezos/set/miners/minercommand7.set'); ?>'  /></td>
			<td><input name="minerpage7" type="text" style="width: 225px;" value='<?php echo exec('cat /nvezos/set/miners/minerpage7.set'); ?>'  /></td>
			</tr>
			<tr>
			<td><input name="minername8" type="text" style="width: 100px;" value='<?php echo exec('cat /nvezos/set/miners/minername8.set'); ?>'  /></td>
			<td><?php MinerType8(); ?></td>
			<td><input name="minercommand8" type="text" style="width: 400px;" value='<?php echo exec('cat /nvezos/set/miners/minercommand8.set'); ?>'  /></td>
			<td><input name="minerpage8" type="text" style="width: 225px;" value='<?php echo exec('cat /nvezos/set/miners/minerpage8.set'); ?>'  /></td>
			</tr>
			<tr>
			<td><input name="minername9" type="text" style="width: 100px;" value='<?php echo exec('cat /nvezos/set/miners/minername9.set'); ?>'  /></td>
			<td><?php MinerType9(); ?></td>
			<td><input name="minercommand9" type="text" style="width: 400px;" value='<?php echo exec('cat /nvezos/set/miners/minercommand9.set'); ?>'  /></td>
			<td><input name="minerpage9" type="text" style="width: 225px;" value='<?php echo exec('cat /nvezos/set/miners/minerpage9.set'); ?>'  /></td>
			</tr>
			<tr>
			<td><input name="minername10" type="text" style="width: 100px;" value='<?php echo exec('cat /nvezos/set/miners/minername10.set'); ?>'  /></td>
			<td><?php MinerType10(); ?></td>
			<td><input name="minercommand10" type="text" style="width: 400px;" value='<?php echo exec('cat /nvezos/set/miners/minercommand10.set'); ?>'  /></td>
			<td><input name="minerpage10" type="text" style="width: 225px;" value='<?php echo exec('cat /nvezos/set/miners/minerpage10.set'); ?>'  /></td>
			</tr>
			</tbody>
			</table>
			<center>
			<input type="submit" name="submitminersettings" value="Save Miner Settings">
			</center>
			</form>			
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
