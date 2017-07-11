#!/bin/bash
nmcli connection | head -n2 | cut -d' ' -f1-3 | tail -n 1
