#!/usr/bin/sh

echo "compressing files within /Documents/490projimgonnadie"
cd ..
cd ..

#testing out zipping an entire directory
tar -zcvf fulldeploy.tar.gz 490projimgonnadie
#probably will make the extraction script to run on the other servers.
#So when its done extracting, just move those files to its appropiate places
tar -zxvf fulldeploy.tar.gz -C /tmp

cd /tmp
ls -la
