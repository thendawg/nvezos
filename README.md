# nvezos
NvEZOS v.6 Beta

This version is for closed release only.

NvEZOS is an nVidia GPU Mining OS based on Ubuntu-GNOME 16.04.2 LTS. It is configurable completely from webUI and features the latest genoil CUDA ethminer. The WebUI provides an easy interface to switch between currencies you're currently mining, check hashrate, and even configure network and overclocking settings!

For more info checkout https://www.reddit.com/r/nvezos

This software is available for free use, however, donations are always appreciated!
MEW Address - 0x3d454b7b858335805f83D30842d9f0fACd50e545

**INSTALLATION INSTRUCTIONS**

**IMPORTANT** The total size of the install is around 9GB. Due to expansion of the CUDA8 deb during install, around 11.5-12GB are needed, thus I recommend a minimum root partition of 12GB.

**IMPORTANT** Your miner must be connected to the internet to run this script as it relies on other repos and git's to install all of the packages. Additionally, CUDA 8 is quite large, so during the course of the install up to 2GB data may be downloaded.

You will also need to insure your monitor is connected to the primary GPU. Once setup, you can disconnect it, but it does need to be on the primary GPU (not onboard) during setup.

1) Download Ubuntu-GNOME 16.04.2 LTS Iso Here - http://cdimage.ubuntu.com/ubuntu-gnome/releases/16.04/release/ubuntu-gnome-16.04.2-desktop-amd64.iso/

2) Install Ubuntu-GNOME as normal (I recommend not installing 3rd party software, or checking any of the other optional elements as it could cause a potential driver conflict - For detailed instructions, see "OS Install" at the bottom)

**EXTREMELY IMPORTANT** If you want the overclocking function to work, the user you setup must be set to "Auto-login" this provides an X session for our scripts to bind to. It's not much of a concern as display output will be disabled anyways after configuration is complete.

3) After the install is complete and you are booted into the gnome graphical environment, open a terminal (Click activities, then start typing terminal) and run the following commands.

hostname -I (This will show your DHCP IP address, note it in case you step away and miss the script finishing)

sudo apt-get -y install git

cd /

sudo git clone https://github.com/thendawg/nvezos.git

cd /nvezos/

sudo chmod +x installscript.sh

sudo ./installscript.sh


NOTE: During the script, the nvidia driver may prompt you to select the display manager, you should be able to simply hit enter twice, but to be certain the correct display manager to choose is gdm3.
NOTE: You may see various errors/warnings throughout the script, unless it halts, please ignore these - the ethminer build particularly tends to have several warnings/errors.
NOTE: This script is quite lengthy and may take up to 30 minutes or so to run, dont abort if something appears to hang for several minutes.

4) At this point the miner will auto reboot after 60 seconds (or you can manually restart). You can now disonnect your monitor from the miner, all configuration will be performed via the WebUI with backup access via SSH for debugging/advanced config. The WebUI will be available at https://dhcpipaddress default login credentials are below. I highly recommend changing the password on the Network Settings page.

Default Credentials -

User - miner

Password - nvezos

Finally, this is the install procedure for now. When a public version is release I tend to put it all in a neatly packed ISO.

**NOTES**

To start mining, go to the settings page and setup the miner command for one of the miners. This is the command you use typically to start the miner, such as ethminer --farm-recheck 200 -U -S us2.ethermine.org:4444 -O <Your_Ethereum_Address>.<RigName> except in this case, you must provide the full path to ethminer. Unless you modified the file system after install, this will stay the same. The path is /ethminer/cpp-ethereum/build/ethminer/ethminer - so using our previous example command you would enter - /ethminer/cpp-ethereum/build/ethminer/ethminer --farm-recheck 200 -U -S us2.ethermine.org:4444 -O <Your_Ethereum_Address>.<RigName>

Once you set the mining path you'll need to set the service at the top of the miner page and hit "Set and Restart Mining Service". Additional documentation will be added as I can, although the Network Settings and Overclocking pages are pretty well documented within.

**KNOWN ISSUES**

1. Occasionally when setting overclock settings, not all are applied. Restarting the daemons that execute the OC scripts corrects this - still investigating although it seems it's due to conflicting X commands (Ive added some sleep commands to the script which tends to help) - if this does occur simply applying the settings again will fix it as it causes the daemons to restart.

2. After applying overclocking and then rebooting the system you will notice the OC settings do not come back immediately. This is due to the daemons that initiate the settings trying to run before Xorg starts. Ive tried several targets but am unable to correct this. Ive put a workaround in place using crontab which restarts the associated daemons every 3 minutes. Thus, if you reboot the miner, your overclocking settings will return, but it could take several minutes, to apply them instantly just use the overclocking page. This also may be a lifesaver if you push the overclock a bit too far, simply reboot and make the changes within a minute or two and you should be able to catch it before they're applied.

**v.6 UPDATE**
 
1. Fixed network ip script - you can now change the IP via the WebUI as intended (now using a command to set IP via Network Manager rather than disabling it, seems to work much better)

2. Updated version number on all pages.

3. Clarified command usage on miner settings page.

4. Added script to rebuild xorg.conf in case it gets borked at install or new GPU's are added. It can be ran from the Overclocking page in the WebUI.

5. See HOWTOUPDATE for instructions on how to apply the update to an existing install.

**OS INSTALL**

1) Write ISO to USB drive and make bootable. The easiest way in Windows is to use Rufus - https://rufus.akeo.ie/ - just check "Create a bootable disk using" then select ISO Image. Hit the icon to the right to select your ISO. Make sure Quick Format and Create extended labels are checked.

2) Boot from USB media. You can install to a USB drive, however, you will need 2 USB drives at this point, one to install to and one to install from.

3) After Ubuntu-GNOME installer boots, select Install Ubuntu

4) On the "Preparing to install" screens be sure to leave Download updates and Install thirs-party software unchecked.

5) The easiest installation type to use is Erase disk and install Ubuntu (provided you only have one disk other than your USB drive), otherwise you'll need to use "Something Else"

6) Confirm the disk changes, set your time zone, and setup your user account with password. DO NOT CHECK ENCRYPT HOME FOLDER. Also you must set this user to auto-login (see note below). This user is seperate from the WebUI user, feel free to make them the same, but the passwords wont be linked.

**EXTREMELY IMPORTANT** If you want the overclocking function to work, the user you setup must be set to "Auto-login" this provides an X session for our scripts to bind to. It's not much of a concern as display output will be disabled anyways after configuration is complete.

7) Installation should complete on its own, it will prompt you to reboot. Ive noticed the reboot screen often hangs, if it does, just power cycle the system - I've never had an issue.

8) Be sure to remove the USB drive used for installation before the system boots again, it should now boot into the OS.


