#!/bin/bash
echo "ubiq.service" > /nvezos/logs/currentservicename.log
echo "Ubiq" > /nvezos/logs/whatarewemining.log
ethminer 3 &>> /nvezos/logs/miner.log
