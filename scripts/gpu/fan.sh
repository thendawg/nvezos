#!/bin/bash
export DISPLAY=:0
xhost +
nvidia-settings -a [gpu:0]/GPUFanControlState=1 -a [fan-0]/GPUTargetFanSpeed=0
nvidia-settings -a [gpu:1]/GPUFanControlState=1 -a [fan-1]/GPUTargetFanSpeed=0
nvidia-settings -a [gpu:2]/GPUFanControlState=1 -a [fan-2]/GPUTargetFanSpeed=0
nvidia-settings -a [gpu:3]/GPUFanControlState=1 -a [fan-3]/GPUTargetFanSpeed=0
nvidia-settings -a [gpu:4]/GPUFanControlState=1 -a [fan-4]/GPUTargetFanSpeed=0
nvidia-settings -a [gpu:5]/GPUFanControlState=1 -a [fan-5]/GPUTargetFanSpeed=0
nvidia-settings -a [gpu:6]/GPUFanControlState=1 -a [fan-6]/GPUTargetFanSpeed=0
nvidia-settings -a [gpu:7]/GPUFanControlState=1 -a [fan-7]/GPUTargetFanSpeed=0
xhost -
