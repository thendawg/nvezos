#!/bin/bash
sudo nvidia-xconfig -a --cool-bits=31 --allow-empty-initial-configuration
sudo sed -i '/Option         "AllowEmptyInitialConfiguration" "True"/a    Option         "ConnectedMonitor" "DFP-0"' /etc/X11/xorg.conf
sudo sed -i '/Option         "ConnectedMonitor" "DFP-0"/a    Option         "CustomEDID" "DFP-0:/etc/X11/dfp0.edid"' /etc/X11/xorg.conf
sleep 2
sudo shutdown -r now

