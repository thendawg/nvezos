#!/bin/bash
ifconfig -a | grep -Eo '^[^ ]+' | head -n 1
