#!/bin/bash
ipaddress="127.0.0.1";
/usr/local/pgsql/bin/psql -h $ipaddress cservice < ipr.sql
echo "Import ready Your IPR IP is: $ipaddress";
