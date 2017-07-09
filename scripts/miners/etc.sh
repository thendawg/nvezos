#!/bin/bash
echo "etc.service" > /nvezos/logs/currentservicename.log
echo "ETC" > /nvezos/logs/whatarewemining.log
ethminer 2 &>> /nvezos/logs/miner.log
