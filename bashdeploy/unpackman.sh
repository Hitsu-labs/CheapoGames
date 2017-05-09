#!/usr/bin/sh
cd ..
cd ..
tar -zxvf fulldeploy$1.tar.gz -C /tmp
echo $1>'cman'
cd /tmp
ls -la
echo "Everything is there (hopefully)\n"
echo "checking if there is a download folder present\n"
cd /var/www/html
if [ ! -d "download"];
then
	mkdir "download"
fi
mv /tmp/CheapoGames/* /var/www/html/download
echo "Completed file move\n"

echo "Attempting to boot up php server\n"
cd /var/www/html/download

case $2 in
"backend")
	./testRabbitMQServer.php
	;;
esac
