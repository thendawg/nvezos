#!/bin/bash
echo "eth.service" > /nvezos/logs/currentservicename.log
echo "Eth" > /nvezos/logs/whatarewemining.log
/ethminer/cpp-ethereum/build/ethminer/ethminer -U -S us-east.ethash-hub.miningpoolhub.com:20585 -O npound.Miner1 &>> /nvezos/logs/miner.log
