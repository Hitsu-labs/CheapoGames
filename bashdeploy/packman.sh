#!/usr/bin/sh
#date=$(date + "%d-%b-%Y")
echo "compressing files within /Documents\n"
cd ..
cd ..
printf "What is the version of the file"
echo $1>>"vman"
tar -zcvf fulldeploy$1.tar.gz CheapoGames

