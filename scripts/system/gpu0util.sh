#!/bin/bash
nvidia-smi -i 0 --query-gpu=utilization.gpu --format=noheader,csv | cut -d " " -f 1
