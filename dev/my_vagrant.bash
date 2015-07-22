#!/usr/bin/env bash

sudo ln -s /srv/www/devq/server/apache_dev_vhost.conf /etc/httpd/sites-enabled/devq.conf
sudo ln -s /etc/httpd/sites-enabled/devq.conf /etc/httpd/sites-enabled/devq.conf
sudo /bin/systemctl restart  httpd.service