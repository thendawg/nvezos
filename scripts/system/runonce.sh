#!/bin/bash

# Wait for system to finish booting
sleep 20

# Install SSH Daemon for management first
apt-get -y install openssh-server

# Setup SSL and make some certs
a2enmod ssl
systemctl restart apache2
mkdir /etc/apache2/ssl
openssl req -x509 -nodes -days 2000 -newkey rsa:2048 -keyout /etc/apache2/ssl/apache.key -out /etc/apache2/ssl/apache.crt -subj "/C=US/ST=AnyState/L=AnyCity/O=Nvezos/CN=www.nvezos.com"
chmod -R 755 /etc/apache2/ssl

# Configure Apache2 Sites/Ports
/bin/cp -f /nvezos/installpayload/apache/default-ssl.conf /etc/apache2/sites-available/
/bin/cp -f /nvezos/installpayload/apache/ports.conf /etc/apache2/
chown www-data /etc/apache2/sites-available/default-ssl.conf
chmod 755 /etc/apache2/sites-available/default-ssl.conf
chown www-data /etc/apache2/ports.conf
chmod 755 /etc/apache2/ports.conf
a2dissite 000-default.conf
a2ensite default-ssl.conf
systemctl restart apache2

# Move PHP/WebUI files into place
/bin/cp -rf /nvezos/installpayload/html/ /var/www/
rm -rf /var/www/html/index.html
chown -R www-data /var/www/html/
chmod -R 775 /var/www/html/

# Setup crontab (log cleanup script)
/bin/cp -f /nvezos/installpayload/crontab /etc/crontab
chmod 755 /etc/crontab

# Setup miner services
useradd -m gpuservice
/bin/cp /nvezos/installpayload/services/ethminer.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/etcminer.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/expminer.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/musicminer.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/ubiqminer.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/gpuoc.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/gpupl.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/gpufan.service /etc/systemd/system/
chmod 755 /etc/systemd/system/ethminer.service
chmod 755 /etc/systemd/system/etcminer.service
chmod 755 /etc/systemd/system/expminer.service
chmod 755 /etc/systemd/system/musicminer.service
chmod 755 /etc/systemd/system/ubiqminer.service
chmod 755 /etc/systemd/system/gpuoc.service
chmod 755 /etc/systemd/system/gpupl.service
chmod 755 /etc/systemd/system/gpufan.service
systemctl daemon-reload

# Make some directories/files
mkdir /nvezos/logs/
mkdir /nvezos/set/
mkdir /nvezos/set/gpu/
mkdir /nvezos/set/network/
mkdir /nvezos/set/password
mkdir /nvezos/set/status
touch /nvezos/set/gpu/numgpu.data
touch /nvezos/set/status/currentservicename.set
touch /nvezos/set/status/whatarewemining.set
touch /nvezos/logs/miner.log
touch /nvezos/set/status/defaultuser.set

# Set Default WebUI Password
echo nvezos | htpasswd -c -i /nvezos/set/password/passwords miner

# Fix permissions
chown -R www-data /nvezos/
chmod -R 755 /nvezos/

# Setup passwordless sudo for www-data and gpuservice
echo "www-data  ALL=(ALL:ALL) NOPASSWD: ALL" | (EDITOR="tee -a" visudo)
echo "gpuservice  ALL=(ALL:ALL) NOPASSWD: ALL" | (EDITOR="tee -a" visudo)

# Cleanup
rm -rf /nvezos/installpayload/
systemctl disable runonce.service

