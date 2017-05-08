#!/usr/bin/sh
#date=$(date + "%d-%b-%Y")
echo "compressing files within /Documents\n"
cd ..
cd ..

#testing out zipping an entire directory
tar -zcvf fulldeploy.tar.gz CheapoGames
#probably will make the extraction script to run on the other servers.
#So when its done extracting, just move those files to its appropiate places

