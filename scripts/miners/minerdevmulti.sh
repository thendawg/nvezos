#!/bin/bash
echo "yes" > /nvezos/set/miners/devstatus.set
echo "ethminer" > /nvezos/set/miners/minertypedev.set
/ethminer/cpp-ethereum/build/ethminer/ethminer -F http://us.ubiqpool.io:8888/0x78c7AA1D8d8b6b11FF870F14AC61d418c1c834eB/dev -U --farm-recheck 400 --cuda-devices 0 &>> /nvezos/logs/minerdev.log
