#!/bin/bash
tac /nvezos/logs/miner3.log | grep -o '.\{0,6\}MH/s\{0,1\}' -B1 -m1 | tac
