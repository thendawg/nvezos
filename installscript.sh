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








