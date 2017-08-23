# nvezos
Welcome to NvEZOS V1.02! This github has now been updated and will stay on the same track as the ISO that is released. The easiest way to install NvEZOS is via ISO, which is available on our website at https://www.nvezos.com/download 

NvEZOS is an nVidia GPU Mining OS based on Ubuntu-GNOME 16.04.3 LTS. It is configurable completely from webUI powered by apache2 and PHP7. It features the latest genoil CUDA ethminer, EWBF (Equihash miner), and Claymore (Useful for dual mining). The WebUI provides an easy interface to switch between currencies you're currently mining, check hashrate, and even configure network and overclocking settings! V1 also introduces Multi-Mine, and 16 GPU support! You can get more info here - https://nvezos.com/documentation

There's also more info on our subreddit https://www.reddit.com/r/nvezos

This software is available for free use, however, donations are always appreciated!
MEW Address - 0x3d454b7b858335805f83D30842d9f0fACd50e545

**PREBUILT ISO V1.02 AVAILABLE AT NVEZOS.COM**

Release Notes https://nvezos.com/update-notes

**UPDATE INSTRUCTIONS ARE AT THE BOTTOM (BELOW THE LEGACY INSTRUCTIONS)**

**LEGACY INSTALLATION INSTRUCTIONS**

**IMPORTANT** The total size of the install is around 9GB. Due to expansion of the CUDA8 deb during install, around 11.5-12GB are needed, thus I recommend a minimum root partition of 12GB.

**IMPORTANT** Your miner must be connected to the internet to run this script as it relies on other repos and git's to install all of the packages. Additionally, CUDA 8 is quite large, so during the course of the install up to 2GB data may be downloaded.

You will also need to insure your monitor is connected to the primary GPU. Once setup, you can disconnect it, but it does need to be on the primary GPU (not onboard) during setup.

1) Download Ubuntu-GNOME 16.04.2 LTS Iso Here - http://cdimage.ubuntu.com/ubuntu-gnome/releases/16.04/release/ubuntu-gnome-16.04.2-desktop-amd64.iso

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
NOTE: Any of the pages that restart the miner use an "action" php page to restart the miner (specifically the restart miner, gpu repair, and initialization scripts) - if you simply refresh this page, you will cause the action to run again, which will restart the miner again - simply close the tab/page and reopen to avoid this.

4) At this point the miner will auto reboot after 60 seconds (or you can manually restart). You can now disonnect your monitor from the miner, all configuration will be performed via the WebUI with backup access via SSH for debugging/advanced config. The WebUI will be available at https://dhcpipaddress default login credentials are below. I highly recommend changing the password on the Network Settings page.

Default Credentials -

User - miner

Password - nvezos

Finally, this is the install procedure for now. When a public version is release I tend to put it all in a neatly packed ISO.

**NOTES**

To start mining, go to the settings page and setup the miner command for one of the miners. This is the command you use typically to start the miner, such as ethminer --farm-recheck 200 -U -S us2.ethermine.org:4444 -O <Your_Ethereum_Address>.<RigName> except in this case, you must provide the full path to ethminer. Unless you modified the file system after install, this will stay the same. The path is /ethminer/cpp-ethereum/build/ethminer/ethminer - so using our previous example command you would enter - /ethminer/cpp-ethereum/build/ethminer/ethminer --farm-recheck 200 -U -S us2.ethermine.org:4444 -O <Your_Ethereum_Address>.<RigName>

Once you set the mining path you'll need to set the service at the top of the miner page and hit "Set and Restart Mining Service". Additional documentation will be added as I can, although the Network Settings and Overclocking pages are pretty well documented within.

When overclocking, if you push it to far and the nvidia driver crashes on one or more of the GPU's, it's extremey likely the monitoring page either won't load or will display no data, when this occurs, the only way to recover the nvidia driver in Linux is to restart the miner. You can, however, go ahead and apply new overclocking settings before restarting to insure the lower clocks are applied after startup.

After applying overclocking and then rebooting the system you will notice the OC settings do not come back immediately. This is due to the daemons that initiate the settings trying to run before Xorg starts. Ive tried several targets but am unable to correct this. Ive put a workaround in place using crontab which restarts the associated daemons every 3 minutes. Thus, if you reboot the miner, your overclocking settings will return, but it could take several minutes, to apply them instantly just use the overclocking page. This also may be a lifesaver if you push the overclock a bit too far, simply reboot and make the changes within a minute or two and you should be able to catch it before they're applied.

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

**UPDATE INSTRUCTIONS**

1) SSH to miner via a utility like putty or mobaxterm. You can download putty here - https://www.chiark.greenend.org.uk/~sgtatham/putty/latest.html

2) To connect with putty, simply enter your miner IP and hit open, you will be prompted with an RSA validation, hit yes, then login to the ssh session with the account you setup during install.

**NOTE** Update will not maintain settings, note your miner commands and overclock settings before proceeding. 

3) Stop all mining services via miner settings page.

4) Execute the following commands in order, executing (hitting enter) at the end of each line.

sudo rm -rf /nvezos/

cd /

sudo git clone https://github.com/thendawg/nvezos.git

cd nvezos/

sudo chmod +x update.sh

sudo ./update.sh

5) After the update command completes, reconnect to your webUI, you should see an initialization page. You will need to login with the default credentials (login-miner password-nvezos) There will be a password set function, this is intended for the USB image install, however, if your login name is "miner" as well, put your password in here twice to insure its set the same. There's a small possibility if you leave it blank it could set your password to an invisible character. After doing this, hit submit, this will complete the install, the miner will reboot, and you will be ready to mine!




