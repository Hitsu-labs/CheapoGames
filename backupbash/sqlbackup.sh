#!/usr/bin/sh

user="root"
password="swag1"
host="localhost"
db_name="Games"

date=$(date + "%d-%b-%Y")
mysqldump --user=$user --password=$password --host=$host $db_name >$db_name-$date.sql

find /*.sql -mtime +30 -exec rm {} \;
