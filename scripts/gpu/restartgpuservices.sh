#!/bin/bash
sudo systemctl stop gpuoc.service
sudo systemctl stop gpufan.service
sudo systemctl stop gpupl.service
sudo systemctl start gpuoc.service
sudo systemctl start gpufan.service
sudo systemctl start gpupl.service
