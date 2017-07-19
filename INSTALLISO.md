**ISO INSTALL INSTRUCTIONS BETA v.9**

I highly advise you first thoroughly read the README.md for all notes on usage and various quirks you should be aware of. The WebUI also contains documentation on each page to aid in setup, I especially recommend thoroughly reading through the documentation on the right of the Overclocking page before performing any overclocking.

ISO Link - https://drive.google.com/open?id=0BzfJzE5EOPsUM2xlTTVGZ3VmYVk

To verify you are using the correct (most up to date) link, the filename should be nvezosv9beta.iso

**INSTALL REQUIREMENTS**

1. Nvidia GPU(s) - None of the overclocking or monitoring functions will work with AMD

2. At least 2GB Ram

3. Minimum 12GB root partition (you should be fine with a 16GB flash drive, but 8GB is not enough)

4. You can install this OS to a USB flash drive you will just need two flash drives, one for the install and one as the destination. Im working on getting a ready to go bootable drive image available, but the size has made it a bit prohibitive for now.

**DEFAULT WEBUI LOGIN**

Username - miner

Password - nvezos

**INSTRUCTIONS**

1. Write ISO image to USB drive. I recommend using Rufus for this in Windows (https://rufus.akeo.ie/) - you can leave the default options, simply select your drive in the device menu and change "Create a bootable disk using" to "ISO Image" than click on the disk symbol on the right to point it to the iso downloaded above.

2. When the write begins it will ask you to choose ISO or DD mode, chose ISO.

3. Once the drive is created, boot your miner from this drive and select the default (Live) option, it may take quite awhile to boot (up to 5 minutes in some cases) - this can be improved by using a USB 3.0 flash drive.

4. Once in the OS, you need to perform the persistent install, click Activities in the top left, then in the taskbar on the left the top icon should be Install.

5. This will launch the standard Ubuntu install wizard, On the "Preparing to install" screens be sure to leave Download updates and Install third-party software unchecked.

6. The easiest installation type to use is Erase disk and install Ubuntu (provided you only have one disk/flash drive other than your USB install drive), otherwise you'll need to use "Something Else".

7. Confirm the disk changes, set your time zone, and setup your user account with password. DO NOT CHECK ENCRYPT HOME FOLDER. Also you must set this user to log in automatically (see note below). This user is seperate from the WebUI user, feel free to make them the same, but the passwords wont be linked.

**EXTREMELY IMPORTANT** If you want the overclocking function to work, the user you setup must be set to log-in automatically, this provides an X session for our scripts to bind to. It's not much of a concern as display output will be disabled anyways after configuration is complete.

8. The actual install process will take a bit longer than the typical Ubuntu install as CUDA, drivers, etc are preloaded in the ISO (saving you time and bandwidth), if an error pops up under the installer, hit continue or ignore it, its an error in a dependency of one of the modules required to build ethminer, Im working on fixing this, but as of this time it doesnt cause any issues, it's simply an annoyance.

9. Once the process completes, it should prompt you to reboot, during the reboot (wait for the system to go down completely) youll want to remove the USB install drive.

10. The OS will now boot into the persistent install - again this first boot will likely take quite awhile (up to 5 min) - where you may see black screen, blinking cursor, etc. 

11. Once on the desktop, your miner is ready to be initialized. Connect to the WebUI at https://ipaddress - the default login is miner/nvezos - **NOTE** You MUST use https - if you do not know your miner's IP, you can hit activities in the top left, search for terminal, then use the command hostname -I. Again, you may see a system error that comes up - its the same dependency issue as before and can be safely ignored.

12. Once connected to the WebUI, hit the link to initialize your miner, it will take a second or two, then reboot. After this reboot it should come up headless and ready to mine. Be sure to close the tab/page then reopen, do not hit refresh as it could cause a second reboot. Now you will need to configure your settings. Each page in the WebUI contains information on how to configure the settings within, however, I plan to create a detailed user guide shortly.

**IMPORTANT NOTE** Any of the pages that restart the miner use an "action" php page to restart the miner (specifically the restart miner, gpu repair, and initialization scripts) - if you simply refresh this page, you will cause the action to run again, which will restart the miner again - simply close the tab/page and reopen to avoid this. **THIS HAS BEEN FIXED IN V.9+ LEAVING NOTE FOR REFERENCE ONLY**
