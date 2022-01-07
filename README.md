      ____                     _             __        __   _
     / ___|___  ___ _ ____   _(_) ___ ___    \ \      / /__| |__
    | |   / __|/ _ \ '__\ \ / / |/ __/ _ \____\ \ /\ / / _ \ '_ \
    | |___\__ \  __/ |   \ V /| | (_|  __/_____\ V  V /  __/ |_) |
     \____|___/\___|_|    \_/ |_|\___\___|      \_/\_/ \___|_.__/ 

SPECIAL NOTE: Take in consideration we had to modify a few things to get this part of GNUWORLD working.
The code becomes from the official version, but with bug fixes and a new theme.
OFFICIAL THEME is gone. 

SPECIAL NOTE 2: SINCE UNDERNET IS NOW UNDER TAKEOVER STATUS, this repository will not be updated anymore. 

You are able to start GNUWORLD 1st. from gnuworld.sh if you located it like this: /home/gnuworld/gnuworld/bin
(Remember to give permission the first time with chmod +x gnuworld.sh)

--------------------------------------------------------------------------
		OS: Ubuntu 20.04.2 LTS \n \l - Server
			[ by: y2k | ARI3L ]
--------------------------------------------------------------------------

#1. Prepare the system by installing the necessary components.

	root@ircd:~# apt install apache2 apache2-bin apache2-data apache2-dev apache2-doc apache2-ssl-dev apache2-utils libapache2-mod-php
	php7.4 php7.4-cgi php7.4-cli php7.4-common php7.4-curl php7.4-dev php7.4-gd php7.4-json php7.4-mysql php7.4-pgsql php7.4-readline
	php7.4-sqlite3 php7.4-xml php7.4-xmlrpc libreadline-dev libssl-dev openssl zlib1g zlib1g-dev postfix
        
	IF YOU WANT TO USE NGINX just install this: 
	root@ircd:~# apt install nginx php7.4 php7.4-cgi php7.4-cli php7.4-common php7.4-curl php7.4-dev php7.4-gd php7.4-json php7.4-mysql php7.4-pgsql php7.4-readline
	php7.4-sqlite3 php7.4-xml php7.4-xmlrpc libreadline-dev libssl-dev openssl zlib1g zlib1g-dev postfix
	
	root@ircd:~# updatedb	
	root@ircd:~# nano /etc/php/7.4/apache2/php.ini 
	root@ircd:~# nano /etc/php/7.4/fpm/php.ini (if you use nginx)
	NOW: Go to the line 187 and change short_open_tag (from Off to On)
	Save the file with (CTRL+O)

	root@ircd:~# service apache2 restart
	root@ircd:~# service nginx restart (if you use nginx)
        
	root@ircd:~# curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

#2. Now We going to download the GNUWorld cservice-web part!
	
	 root@ircd:~#
	 root@ircd:~# su - gnuworld
	 gnuworld@ircd:~$ 
	 gnuworld@ircd:~$ git clone https://github.com/GNUWorldChannel/cservice-web-php7.4.git
	 gnuworld@ircd:~$ mv cservice-web-php7.4 cservice-web
	 gnuworld@ircd:~$ cd cservice-web
	 gnuworld@ircd:~/gnuworld/cservice-web$ composer install
	 gnuworld@ircd:~/gnuworld/cservice-web$ cd php_includes
	 gnuworld@ircd:~/gnuworld/cservice-web/php_includes$ cp config.inc.dist config.inc
	 gnuworld@ircd:~/gnuworld/cservice-web/php_includes$ cp cmaster.inc.dist cmaster.inc
	 gnuworld@ircd:~/gnuworld/cservice-web/php_includes$ cp blackhole.inc.dist blackhole.inc
	 EDIT: inc files (With your own values)
	 
	 gnuworld@ircd:~/gnuworld/cservice-web/php_includes$ cd ..
	 gnuworld@ircd:~/gnuworld/cservice-web/ cd ..
	 gnuworld@ircd:~/gnuworld$

#3. Now we back to root user, for some user permission.
	 
	 gnuworld@ircd:~/gnuworld$ su
	 root@ircd:~# cd /var/www/html/
         root@ircd:/var/www/html# 
         root@ircd:/var/www/html# chmod 711 ~gnuworld
  	 root@ircd:/var/www/html# chmod 711 ~gnuworld/cservice-web
  	 root@ircd:/var/www/html# chmod 755 ~gnuworld/cservice-web/php_includes
  	 root@ircd:/var/www/html# chmod 644 ~gnuworld/cservice-web/php_includes/config.inc
  	 root@ircd:/var/www/html# chmod 755 ~gnuworld/cservice-web/docs/gnuworld/
  	 root@ircd:/var/www/html# ln -s /home/gnuworld/cservice-web/docs/gnuworld 
 	 root@ircd:/var/www/html# cd ..
  	 root@ircd:/var/www# cd ..
   	 root@ircd:/var# cd ..
   	 root@ircd~# 
	
	 root@ircd~# cd /etc/apache2/sites-enabled
	 root@ircd~# cd /etc/nginx/sites-enabled (If you use nginx)
 	 root@ircd~# nano 000-default.conf
         (check the correct shortcut there where is located cservice-web.)
        
#4. We back again into gnuworld user (Now we add into the IPR the first IP).		 	 
         
     root@ircd:~# cd
	 root@ircd:~# su - gnuworld
	 gnuworld@ircd:~/gnuworld$ cd cservice-web/php_includes
	 gnuworld@ircd:~/gnuworld/cservice-web/php_includes$ nano ipr.sql
	 
	 NOTE: This entry is for the first username created in the db. (Admin or your custom username)
	  
	 Write your own ip. We show you as an example the first entry if you are trying to access locally.
	 insert into ip_restrict (id, user_id, added_by, added, type, expiry, value) values (1, 1, 1, now()::abstime::int4, 1, 0, '192.168.1.0/24');
	 Save the file with (CTRL+O)
	 
	 With the gnuworld running, perform:
	 gnuworld@ircd:~/gnuworld/cservice-web/php_includes$ /usr/local/pgsql/bin/psql -h 127.0.0.1 cservice < ipr.sql
	 
	 Or perform:
	 gnuworld@ircd:~/gnuworld/cservice-web/php_includes$ ./add-ip.sh 
	 
	 NOW you are able to login into cservice-web with Admin + temPass if you didn´t change it with the ip provided.
	 You can add more ips from user edit via web, so no need to use twice ipr.sql.
