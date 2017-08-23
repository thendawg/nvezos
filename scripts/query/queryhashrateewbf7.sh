#!/bin/bash
grep  Total /nvezos/logs/miner7.log | tail -n 1 | cut -c19-28
