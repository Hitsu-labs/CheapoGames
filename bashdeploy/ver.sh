#!/usr/bin/sh

cd ..
cd ..

while read -r lines
do
	echo $lines
done < 'cman'
