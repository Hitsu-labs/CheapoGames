#!/usr/bin/sh

echo "compressing files within /Documents/490projimgonnadie\n"
cd ..
cd ..

#testing out zipping an entire directory
tar -zcvf fulldeploy.tar.gz 490projimgonnadie
#probably will make the extraction script to run on the other servers.
#So when its done extracting, just move those files to its appropiate places
tar -zxvf fulldeploy.tar.gz -C /tmp
cd /tmp
ls -la
echo "Everything is there (hopefully)\n"
echo "checking if there is a download folder present\n"
cd /var/www/html
if [ ! -d "download"];
then
	mkdir "download"
fi
mv /tmp/490projimgonnadie/* /var/www/html/download
echo "Completed file move\n"

echo "Attempting to boot up php server\n"
cd /var/www/html/download

