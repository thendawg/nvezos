#!/bin/bash
grep  Total /nvezos/logs/miner1.log | tail -n 1 | cut -c19-28
