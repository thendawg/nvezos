!#/bin/bash

# Install SSH Daemon for management first
apt-get -y install openssh-server

# Setup CUDA 8
mkdir /cuda/
cd /cuda/
wget https://developer.nvidia.com/compute/cuda/8.0/Prod2/local_installers/cuda-repo-ubuntu1604-8-0-local-ga2_8.0.61-1_amd64-deb
dpkg -i cuda-repo-ubuntu1604-8-0-local-ga2_8.0.61-1_amd64-deb
apt-get -y update
apt-get -y install cuda

# Setup nVidia Drivers
add-apt-repository -y ppa:graphics-drivers
apt-get -y update
apt-get -y install nvidia-375

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

# Set Default WebUI Password
echo nvezos | htpasswd -c -i /nvezos/set/password/passwords miner

# Move PHP/WebUI files into place
/bin/cp -rf /nvezos/installpayload/html/ /var/www/
rm -rf /var/www/html/index.html
chown -R www-data /var/www/html/
chmod -R 775 /var/www/html/

# Setup ethminer
mkdir /ethminer/
chown www-data /ethminer/
chmod 755 /ethminer/
cd /ethminer/
sudo -u www-data git clone "https://github.com/davilizh/cpp-ethereum.git"
cd cpp-ethereum
sudo -u www-data git checkout optimized_for_some_nvidian_cards
sudo -u www-data mkdir build
cd build
sudo -u www-data cmake -DBUNDLE=cudaminer ..
sudo -u www-data make -j8

# Setup crontab (log cleanup script)
/bin/cp -f /nvezos/installpayload/crontab /etc/crontab
chmod 755 /etc/crontab

# Setup miner services
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
systemctl enable gpuoc.service
systemctl enable gpupl.service
systemctl enable gpufan.service

# Fix nvezos Ownership and Permissions
chown -R www-data /nvezos/
chmod -R 755 /nvezos/

# Cleanup
rm -rf /nvezos/installpayload/
rm -rf /cuda/

# Setup xorg.conf
nvidia-xconfig -a --cool-bits=31 --allow-empty-initial-configuration

# Setup passwordless sudo for www-data
echo "www-data  ALL=(ALL:ALL) NOPASSWD: ALL" | (EDITOR="tee -a" visudo)

# Install is complete - let's reboot'
echo "Installation of NvEZOS is now complete"
echo "After reboot you can customize this miner via the WebUI available at:"
hostname -I
echo "Press any key to reboot"
read -n 1 -t 30
shutdown -r now








