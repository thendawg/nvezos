#!/bin/bash
grep  Total /nvezos/logs/minerdev.log | tail -n 1 | cut -c19-28
