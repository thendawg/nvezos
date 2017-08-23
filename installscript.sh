#!/bin/bash

# Make sure git is installed
apt-get -y install git

# Install SSH Daemon for management first
apt-get -y install openssh-server
apt-get -y install fail2ban

# Setup CUDA 8 / Nvidia375 Drivers
mkdir /cuda/
cd /cuda/
wget https://developer.nvidia.com/compute/cuda/8.0/Prod2/local_installers/cuda-repo-ubuntu1604-8-0-local-ga2_8.0.61-1_amd64-deb
dpkg -i cuda-repo-ubuntu1604-8-0-local-ga2_8.0.61-1_amd64-deb
apt-get -y update
apt-get -y install cuda

# Install Apache/PHP
apt-get -y install apache2
apt-get -y install libapache2-mod-php
systemctl restart apache2

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

# Setup ethminer
apt-get -y install software-properties-common
add-apt-repository -y ppa:ethereum/ethereum
apt-get -y update
apt-get -y install cmake libcryptopp-dev libleveldb-dev libjsoncpp-dev libjsonrpccpp-dev libboost-all-dev libgmp-dev libreadline-dev libcurl4-gnutls-dev ocl-icd-libopencl1 opencl-headers mesa-common-dev libmicrohttpd-dev build-essential
mkdir /ethminer/
cd /ethminer/
git clone "https://github.com/davilizh/cpp-ethereum.git"
cd cpp-ethereum
git checkout optimized_for_some_nvidian_cards
mkdir build
cd build
cmake -DBUNDLE=cudaminer ..
make -j8
chown -R www-data /ethminer/
chmod -R 755 /ethminer/

# Extract EWBF
mkdir /ewbf/
mv /nvezos/installpayload/miners/ewbf/* /ewbf/
chown -R www-data /ewbf/
chmod -R 755 /ewbf/

# Extract Claymore
mkdir /claymore/
mv /nvezos/installpayload/miners/claymore/* /claymore/
chown -R www-data /claymore/
chmod -R 755 /claymore/

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
systemctl enable gpuoc.service
systemctl enable gpupl.service
systemctl enable gpufan.service
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
rm -rf /cuda/

# Install is complete - let's reboot'
echo "Installation of NvEZOS is now complete"
echo "The miner will now be rebooted, after reboot you can customize this miner via the WebUI available at:"
hostname -I
echo "System will now reboot in 60 seconds, or you may restart manually"
sleep 60
shutdown -r now
