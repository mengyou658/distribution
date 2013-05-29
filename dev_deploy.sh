#!/usr/bin/env sh
# Only for Ubuntu server 12.04 LTS
# Need sudo

# file: sources.list
#deb http://packages.dotdeb.org wheezy all
#deb-src http://packages.dotdeb.org wheezy all
##wget http://www.dotdeb.org/dotdeb.gpg
##cat dotdeb.gpg | sudo apt-key add -
#
#deb http://mirrors.163.com/ubuntu/ precise main restricted universe multiverse
#deb http://mirrors.163.com/ubuntu/ precise-security main restricted universe multiverse
#deb http://mirrors.163.com/ubuntu/ precise-updates main restricted universe multiverse
#deb http://mirrors.163.com/ubuntu/ precise-proposed main restricted universe multiverse
#deb http://mirrors.163.com/ubuntu/ precise-backports main restricted universe multiverse
#deb-src http://mirrors.163.com/ubuntu/ precise main restricted universe multiverse
#deb-src http://mirrors.163.com/ubuntu/ precise-security main restricted universe multiverse
#deb-src http://mirrors.163.com/ubuntu/ precise-updates main restricted universe multiverse
#deb-src http://mirrors.163.com/ubuntu/ precise-proposed main restricted universe multiverse
#deb-src http://mirrors.163.com/ubuntu/ precise-backports main restricted universe multiverse
## or
#deb http://mirrors.xmu.edu.cn/ubuntu/archive precise main restricted universe multiverse
#deb http://mirrors.xmu.edu.cn/ubuntu/archive precise-backports main restricted universe multiverse
#deb http://mirrors.xmu.edu.cn/ubuntu/archive precise-proposed main restricted universe multiverse
#deb http://mirrors.xmu.edu.cn/ubuntu/archive precise-security main restricted universe multiverse
#deb http://mirrors.xmu.edu.cn/ubuntu/archive precise-updates main restricted universe multiverse 
#deb-src http://mirrors.xmu.edu.cn/ubuntu/archive precise main restricted universe multiverse
#deb-src http://mirrors.xmu.edu.cn/ubuntu/archive precise-backports main restricted universe multiverse
#deb-src http://mirrors.xmu.edu.cn/ubuntu/archive precise-proposed main restricted universe multiverse
#deb-src http://mirrors.xmu.edu.cn/ubuntu/archive precise-security main restricted universe multiverse
#deb-src http://mirrors.xmu.edu.cn/ubuntu/archive precise-updates main restricted universe multiverse

# phpunit walkround
#apt-get remove phpunit
## already installed phpunit
#pear upgrade pear
#pear channel-discover pear.phpunit.de
#pear channel-discover pear.symfony-project.com
#pear channel-discover pear.symfony.com
#pear channel-discover components.ez.no
#pear update-channels
#pear upgrade-all
#pear install --alldeps phpunit/PHPUnit

apt-get update -y

echo 'mysql-server-5.5 mysql-server/root_password password root' | debconf-set-selections 
echo 'mysql-server-5.5 mysql-server/root_password_again password root' | debconf-set-selections 

apt-get install git nginx php5 php5-cli php5-curl php5-fpm php5-mcrypt php5-sqlite php5-mysql mysql-server-5.5 samba -y

mkdir -p /var/www
cd /var/www

git clone https://github.com/Gwill/distribution.git distribution
cd /var/www/distribution
git checkout -b develop origin/develop

chown -R www-data:www-data /var/www/distribution
chmod -R 777 /var/www/distribution

sed -i 's/#   security = user/   security = share/' /etc/samba/smb.conf

cat>>/etc/samba/smb.conf<<EOF
[distribution]
  public=yes
  browseable=yes
  guest ok=yes
  writable=yes
  path=/var/www/distribution
  create mask=0777
  directory mask=0777
EOF

cat>/etc/nginx/sites-available/distribution<<EOF
server {
    listen 9527;

    root /var/www/distribution/public;
    index index.php index.html index.htm;

    server_name localhost;

    location / {
        try_files \$uri \$uri/ /index.php?\$args;
    }
    
    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        include fastcgi_params;
    }
}     
EOF

ln -s /etc/nginx/sites-available/distribution /etc/nginx/sites-enabled/distribution

sed -i 's/# Here is entries for some specific programs/default-character-set = utf8\n# Here is entries for some specific programs/' /etc/mysql/my.cnf
sed -i 's/# Instead of skip-networking/character-set-server = utf8\n# Instead of skip-networking/' /etc/mysql/my.cnf

service mysql restart
service nginx restart
service php5-fpm restart
service smbd restart

echo "create user distribution identified by 'distribution';create database distribution;grant all privileges on distribution.* to distribution@'localhost' identified by 'distribution';flush privileges;" | mysql -uroot -proot

curl http://localhost:9527/scheme/up

