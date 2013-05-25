#!/usr/bin/env sh
# Only for Ubuntu server 12.04 LTS
# Need sudo

cd /var/www/distribution

git checkout develop
git pull origin develop:develop

chown -R www-data:www-data /var/www/distribution
chmod -R 755 /var/www/distribution
