#!/bin/bash

echo "Downloading composer..."
curl -sS https://getcomposer.org/installer | php

echo "Setup rights to app/logs, app/cache..."
HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs

echo "Install dependencies..."
./composer.phar install

echo "Create database..."
app/console doctrine:database:create
app/console doctrine:schema:create

echo "Load fixtures..."
app/console doctrine:fixtures:load -n

echo "Install assets..."
app/console assets:install
app/console assetic:dump

echo "Clear cache..."
app/console cache:clear --env=prod
app/console cache:clear --env=dev