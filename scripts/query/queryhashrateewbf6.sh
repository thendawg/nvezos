#!/bin/bash
grep  Total /nvezos/logs/miner6.log | tail -n 1 | cut -c19-28
