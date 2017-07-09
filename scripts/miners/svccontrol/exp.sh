#!/bin/bash
sudo systemctl stop ethminer.service
sudo systemctl stop musicminer.service
sudo systemctl stop etcminer.service
sudo systemctl stop ubiqminer.service
sudo systemctl stop expminer.service
sudo systemctl disable ethminer.service
sudo systemctl disable musicminer.service
sudo systemctl disable etcminer.service
sudo systemctl disable ubiqminer.service
sudo systemctl disable expminer.service
sudo systemctl enable expminer.service
sudo systemctl start expminer.service
