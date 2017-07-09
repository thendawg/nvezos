#!/bin/bash
echo "exp.service" > /nvezos/logs/currentservicename.log
echo "Expanse" > /nvezos/logs/whatarewemining.log
ethminer 4 &>> /nvezos/logs/miner.log
