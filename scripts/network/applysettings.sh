#!/bin/bash
sudo /bin/cp -rf /nvezos/set/network/ip.set /etc/network/interfaces
sudo chmod 755 /etc/network/interfaces
sleep 3
sudo systemctl stop NetworkManager.service
sudo systemctl disable NetworkManager.service
sudo systemctl stop networking.service
sudo systemctl stop apache2.service
sleep 4
sudo systemctl start networking.service
sleep 3
sudo systemctl start apache2.service

