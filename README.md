# nvezos
NvEZOS v.5 Beta

This version is for closed release only.

NvEZOS is an nVidia GPU Mining OS based on Ubuntu-GNOME 16.04 LTS. It is configurable completely from webUI and features the latest genoil CUDA ethminer. The WebUI provides an easy interface to switch between currencies you're currently mining, check hashrate, and even configure network and overclocking settings!

For more info checkout https://www.reddit.com/r/nvezos

This software is available for free use, however, donations are always appreciated!
MEW Address - 0x3d454b7b858335805f83D30842d9f0fACd50e545

Installation Instructions

IMPORTANT - Your miner must be connected to the internet to run this script as it relies on other repos and git's to install all of the packages. Additionally, CUDA 8 is quite large, so during the cour

You will also need to insure your monitor is connected to the primary GPU. Once setup, you can disconnect it, but it does need to be on the primary GPU (not onboard) during setup.

1) Download Ubuntu-GNOME 16.04 LTS Iso Here - http://cdimage.ubuntu.com/ubuntu-gnome/releases/16.04/release/

2) Install Ubuntu-GNOME as normal (I recommend not installing 3rd party software, or checking any of the other optional elements as it could cause a potential driver conflict)

3) During your install, the username you pick will only be to login via ssh for administrative purposes, it will not effect the WebUI. Feel free to make it the same (miner) if you like, however the passwords will not be linked.

*EXTREMELY IMPORTANT* Due to long term stability issues with remote X calls, the most stable way Ive found to get overclocking to work consistently is to have the default user setup during install set to auto login. This provides a local xsession whcih can be called by the overclocking scripts. No need to worry about security as the system will boot with no display output once setup is complete anyways.

4) After the install is complete and you are booted into the gnome graphical environment, open a terminal (Click activities, then start typing terminal) and run the following commands.

sudo apt-get -y install git

cd /

sudo git clone https://github.com/thendawg/nvezos.git

cd /nvezos/

sudo chmod +x installscript.sh

sudo ./installscript.sh


NOTE: During the script, the nvidia driver may prompt you to select the display manager, you should be able to simply hit enter twice, but to be certain the correct display manager to choose is gdm3.
NOTE: You may see various errors/warnings throughout the script, unless it halts, please ignore these - the ethminer build particularly tends to have several warnings/errors.
NOTE: This script is quite lengthy and may take up to 30 minutes or so to run, dont abort if something appears to hang for several minutes.

5) At this point it should prompt you to reboot, after the reboot the system will boot and become headless (no display output). You can now disonnect your monitor from the miner, all configuration will be performed via the WebUI with backup access via SSH for debugging/advanced config.

Finally, this is the install procedure for now. When a public version is release I tend to put it all in a neatly packed ISO.

**KNOWN ISSUES**

1. Occasionally when setting overclock settings, not all are applied. Restarting the daemons that execute the OC scripts corrects this - still investigating although it seems it's due to conflicting X commands (Ive added some sleep commands to the script which tends to help) - if this does occur simply applying the settings again will fix it as it causes the daemons to restart.

2. After applying overclocking and then rebooting the system you will notice the OC settings do not come back immediately. This is due to the daemons the initiate the settings trying to run before Xorg starts. Ive tried several targets but am unable to correct this. Ive put a workaround in place using crontab which restarts the associated daemons every 3 minutes. Thus, if you reboot the miner, your overclocking settings will return, but it could take several minutes, to apply them instantly just use the overclocking page.

3. Cannot change IP via WebUI - the static address is being applied incorrectly or an interface isn't getting flushed - still working on this, expect it to be fixed soon. For now if you want to change the IP you'll have to do it via SSH.


