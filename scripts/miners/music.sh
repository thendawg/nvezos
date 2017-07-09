#!/bin/bash
echo "music.service" > /nvezos/logs/currentservicename.log
echo "Musicoin" > /nvezos/logs/whatarewemining.log
ethminer 1 &>> /nvezos/logs/miner.log
