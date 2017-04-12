#!/bin/bash

user=""
password=""
host=""
db_name=""

date=$(date + "%d-%b-%Y")
mysqldump --user=$user --password=$password --host=$host $db_name >$db_name-$date.sql

find /* -mtime +30 -exec rm {} \;
