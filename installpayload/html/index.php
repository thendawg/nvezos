<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
	Welcome to NvEZOS
    </title>
</head>
<body>
<center><h3>Welcome to NvEZOS</h3><br><br>
<form action="activate.php" method="POST">
<h5>Set the password for local user "miner"</h5><br>
This only needs to be done for users of the USB image - If you performed a self install or ISO install you can ignore this and just hit "Initialize Miner".<br>
Input Password twice for confirmation.<br><br>
<input name="password" type="password" style="width: 180px;" /><br>
<input name="passwordconf" type="password" style="width: 180px;" /><br>
<br>
<input type="submit" name="submit" value="Initialize Miner"><br><br>
</form>
Once clicking Initialize, the system will appear to hang for up to 30-60 seconds then reboot, after reboot install is complete.
<br>
</center>
</body>
</html> 
