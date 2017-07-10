!#/bin/bash
# Install SSH Daemon for management first
apt-get -y install openssh-server

# Setup nVidia Drivers
add-apt-repository -y ppa:graphics-drivers
apt-get -y update
apt-get -y install nvidia-375

# Setup CUDA 8
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

# Move PHP/WebUI files into place
/bin/cp -rf /nvezos/installpayload/html/ /var/www/
rm -rf /var/www/html/index.html
chown -R www-data /var/www/html/
chmod -R 775 /var/www/html/

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

# Make some directories/files and fix nvezos Ownership and Permissions
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
chown -R www-data /nvezos/
chmod -R 755 /nvezos/

# Setup xorg.conf
nvidia-xconfig -a --cool-bits=31 --allow-empty-initial-configuration
/bin/cp -rf /nvezos/installpayload/dfp0.edid /etc/X11/
sed -i '/Option         "AllowEmptyInitialConfiguration" "True"/a    Option         "ConnectedMonitor" "DFP-0"' /etc/X11/xorg.conf
sed -i '/Option         "ConnectedMonitor" "DFP-0"/a    Option         "CustomEDID" "DFP-0:/etc/X11/dfp0.edid"' /etc/X11/xorg.conf
sudo -u $SUDO_USER xhost +SI:localuser:gpuservice

# Set Default WebUI Password
echo nvezos | htpasswd -c -i /nvezos/set/password/passwords miner

# Setup passwordless sudo for www-data
echo "www-data  ALL=(ALL:ALL) NOPASSWD: ALL" | (EDITOR="tee -a" visudo)

# Cleanup
rm -rf /nvezos/installpayload/
rm -rf /cuda/

# Install is complete - let's reboot'
echo "Installation of NvEZOS is now complete"
echo "The miner will now be rebooted, after reboot you can customize this miner via the WebUI available at:"
hostname -I
read  -n 1 -p "Press Enter to Restart" mainmenuinput
shutdown -r now


