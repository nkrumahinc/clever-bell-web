#!/bin/bash

sudo pkill -f main.py
pushd pwd
pushd /var/www/cleverbell
sudo git pull
sudo chown -R www-data:www-data *
popd
python3 /var/www/cleverbell/main.py