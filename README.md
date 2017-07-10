# nvezos
##If you stumble upon this, it is not currently working, ETA 7-11/12##

NvEZOS v.5 Beta

This version is for closed release only.

NvEZOS is an nVidia GPU Mining OS based on Ubuntu-GNOME 16.04 LTS. It is configurable completely from webUI and features the latest genoil CUDA ethminer. The WebUI provides an easy interface to switch between currencies you're currently mining, check hashrate, and even configure network and overclocking settings!

For more info checkout https://www.reddit.com/r/nvezos

This software is available for free use, however, donations are always appreciated!
MEW Address - 0x3d454b7b858335805f83D30842d9f0fACd50e545

Installation Instructions

IMPORTANT - Your miner must be connected to the internet to run this script as it relies on other repos and git's to install all of the packages. Additionally, CUDA 8 is quite large, so during the install, it may download 2-2.5GB data.

You will also need to insure your monitor is connected to the primary GPU. Once setup, you can disconnect it, but it does need to be on the primary GPU (not onboard) during setup.

1) Download Ubuntu-GNOME 16.04 LTS Iso Here - http://cdimage.ubuntu.com/ubuntu-gnome/releases/16.04/release/

2) Install Ubuntu-GNOME as normal (I recommend not installing 3rd party software, or checking any of the other optional elements as it could cause a potential driver conflict)

a) Make bootable USB drive using Rufus (recommende) or another utility

b) Boot from USB and choose Install Ubuntu

c) Dont select to add any additional drivers or 3rd party utilities - just stick with default options.

d) The only thing youll need to select is where to perform the install. In most cases for a miner, you can simply set to erase the      current OS and install. Otherwise you may need to use custom options.

e) Setup a username and password for admin access, at this point you need to set this user to login automatically. Im working on a way around this, but for now, it's required for overclocking to work correctly. This username/pw is not linked to the WebUI username/password, however, feel free to set it the same if you like. NOTE: Once setup is complete, the miner will not output local display even if a monitor is connected, so this lessons the security concern of using auto-login.

f) When the install completes, it will prompt to reboot, sometimes it will hang on the final screen, if it does just power off the system, remove the install media, and boot it back up.

3) After the install is complete and you are booted into the gnome graphical environment, open a terminal (Click activities, then start typing terminal) and run the following commands.


sudo apt-get -y install git

cd /

sudo git clone https://github.com/thendawg/nvezos.git

cd /nvezos/

sudo chmod +x installscript.sh

sudo ./installscript.sh


NOTE: During the script, the nvidia driver may prompt you to select the display manager, you should be able to simply hit enter twice, but to be certain the correct display manager to choose is gdm3.
NOTE: You may see various errors/warnings throughout the script, unless it halts, please ignore these - the ethminer build particularly tends to have several warnings/errors.
NOTE: This script is quite lengthy and may take up to 30 minutes or so to run, dont abort if something appears to hang for several minutes. It may take significantly longer if your internet connection is slow. In the future I plan to distribute this with the CUDA 8 deb stored locally, so if you have to deploy to multiple systems, it wont have to be downloaded multiple times.

4) At this point it should prompt you to reboot, after the reboot the system will boot and become headless (no display output). You can now disonnect your monitor from the miner, all configuration will be performed via the WebUI with backup access via SSH for debugging/advanced config.

Finally, this is the install procedure for now. When a public version is release I tend to put it all in a neatly packed ISO.
