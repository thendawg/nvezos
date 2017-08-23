#!/bin/bash

# Wait for system to finish booting
sleep 25

# Install SSH Daemon for management first
apt-get -y install openssh-server
apt-get -y install fail2ban

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

# Setup crontab (log cleanup script)
/bin/cp -f /nvezos/installpayload/crontab /etc/crontab
chmod 755 /etc/crontab

# Setup miner services
useradd -m gpuservice
/bin/cp /nvezos/installpayload/services/miner1.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/miner2.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/miner3.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/miner4.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/miner5.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/miner6.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/miner7.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/miner8.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/miner9.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/miner10.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/minerdev.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/minerdevmulti.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/gpuoc.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/gpupl.service /etc/systemd/system/
/bin/cp /nvezos/installpayload/services/gpufan.service /etc/systemd/system/
chmod 755 /etc/systemd/system/miner1.service
chmod 755 /etc/systemd/system/miner2.service
chmod 755 /etc/systemd/system/miner3.service
chmod 755 /etc/systemd/system/miner4.service
chmod 755 /etc/systemd/system/miner5.service
chmod 755 /etc/systemd/system/miner6.service
chmod 755 /etc/systemd/system/miner7.service
chmod 755 /etc/systemd/system/miner8.service
chmod 755 /etc/systemd/system/miner9.service
chmod 755 /etc/systemd/system/miner10.service
chmod 755 /etc/systemd/system/minerdev.service
chmod 755 /etc/systemd/system/minerdevmulti.service
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
mkdir /nvezos/set/status/hashrate
mkdir /nvezos/set/multimine
mkdir /nvezos/set/miners
touch /nvezos/set/gpu/numgpu.data
touch /nvezos/logs/miner1.log
touch /nvezos/logs/miner2.log
touch /nvezos/logs/miner3.log
touch /nvezos/logs/miner4.log
touch /nvezos/logs/miner5.log
touch /nvezos/logs/miner6.log
touch /nvezos/logs/miner7.log
touch /nvezos/logs/miner8.log
touch /nvezos/logs/miner9.log
touch /nvezos/logs/miner10.log
touch /nvezos/logs/minerdev.log
touch /nvezos/set/status/defaultuser.set
echo 'miner1' > /nvezos/set/miners/minername1.set
echo 'miner2' > /nvezos/set/miners/minername2.set
echo 'miner3' > /nvezos/set/miners/minername3.set
echo 'miner4' > /nvezos/set/miners/minername4.set
echo 'miner5' > /nvezos/set/miners/minername5.set
echo 'miner6' > /nvezos/set/miners/minername6.set
echo 'miner7' > /nvezos/set/miners/minername7.set
echo 'miner8' > /nvezos/set/miners/minername8.set
echo 'miner9' > /nvezos/set/miners/minername9.set
echo 'miner10' > /nvezos/set/miners/minername10.set
echo 'checked' > /nvezos/set/multimine/switchno.set
echo 'disabled' > /nvezos/set/multimine/multimine.set
echo '5' > /nvezos/set/status/refreshint.set
echo 'minerdev.log' > /nvezos/set/status/minerloglocation.set

# Move EDID Into Place
/bin/cp -rf /nvezos/installpayload/dfp0.edid /etc/X11/

# Set Default WebUI Password
echo nvezos | htpasswd -c -i /nvezos/set/password/passwords miner

# Fix permissions
chown -R www-data /nvezos/
chmod -R 755 /nvezos/

# Setup passwordless sudo for www-data and gpuservice
echo "www-data  ALL=(ALL:ALL) NOPASSWD: ALL" | (EDITOR="tee -a" visudo)
echo "gpuservice  ALL=(ALL:ALL) NOPASSWD: ALL" | (EDITOR="tee -a" visudo)

# Cleanup service
systemctl disable runonce.service

# Move PHP/WebUI files into place
sleep 10
/bin/cp -rf /nvezos/installpayload/html/ /var/www/
rm -rf /var/www/html/index.html
chown -R www-data /var/www/html/
chmod -R 775 /var/www/html/

# Cleanup files
rm -rf /nvezos/installpayload/
