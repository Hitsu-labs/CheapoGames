#!/usr/bin/bash


cd ..
ls
#declare -A iptable
#iptable=( ["deploy"] = 192.168.1.4 ["front"] = 192.168.1.5 ["backend"]= 192.168.1.7 ["DMZ"] = 192.168.1.6)

case $1 in
"deploy")
	scp fulldeploy$2.tar.gz vman shadowbroker@192.168.1.4:
	scp vman shadowbroker@192.168.1.4
	;;
"front")
	scp fulldeploy$2.tar.gz vman shadowbroker@192.168.1.5:
	scp vman shadowbroker@192.168.1.5
	;;
"backend")
	scp fulldeploy$2.tar.gz vman chilado@192.168.1.7:
	scp vman chilado@192.168.1.7
	;;
"dmz")
	scp fulldeploy$2.tar.gz vman mk\5\5\7@192.168.1.6:
	scp vman mk\5\5\7@192.168.1.6
	;;
esac
pwd
