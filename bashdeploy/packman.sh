#!/usr/bin/sh

echo "compressing files within /Documents/490projimgonnadie"
cd ..
cd ..
tar -zcvf fulldeploy.tar.gz 490projimgonnadie
tar -zxvf fulldeploy.tar.gz -C /tmp

cd /tmp
ls -la
