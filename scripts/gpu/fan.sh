#!/bin/bash
un="$(cat /nvezos/set/status/defaultuser.set)"
export DISPLAY=:0
sudo -u $un xhost +
nvidia-settings -a [gpu:0]/GPUFanControlState=0
nvidia-settings -a [gpu:1]/GPUFanControlState=0
nvidia-settings -a [gpu:2]/GPUFanControlState=0
nvidia-settings -a [gpu:3]/GPUFanControlState=0
nvidia-settings -a [gpu:4]/GPUFanControlState=0
nvidia-settings -a [gpu:5]/GPUFanControlState=0
nvidia-settings -a [gpu:6]/GPUFanControlState=0
nvidia-settings -a [gpu:7]/GPUFanControlState=0
sudo -u $un xhost -
