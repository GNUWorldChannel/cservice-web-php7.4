#!/bin/bash
cd /home/gnuworld/gnuworld/bin
/usr/local/pgsql/bin/postmaster -B 64 -N 32 -i -D /usr/local/pgsql/data -o -F -h 127.0.0.1 >/dev/null 2>&1 &
read -t 7 -rsp $'Wait 7 secs...\n' 
./gnuworld -f GNUWorld.conf
cd ..
cd ..
clear
ps x
