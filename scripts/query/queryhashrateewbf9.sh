#!/bin/bash
grep  Total /nvezos/logs/miner9.log | tail -n 1 | cut -c19-28
