#!/usr/bin/bash

cd ..
cd ..
declare -A iptable
#iptable=( ["deploy"] = 192.168.1.4 ["front"] = 192.168.1.5 ["backend"]= 192.168.1.7 ["DMZ"] = 192.168.1.6)

case $1 in
"deploy")
	scp fulldeploy.tar.gz shadowbroker@192.168.1.4:
	;;
"front")
	scp fulldeploy.tar.gz shadowbroker@192.168.1.5:
	;;
"backend")
	scp fulldeploy.tar.gz chilado@192.168.1.7:
	;;
"dmz")
	scp fulldeploy.tar.gz mk\5\5\7@192.168.1.6:
	;;
esac
