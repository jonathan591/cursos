#!/usr/bin/env bash
echo "Running composer"
composer global remove hirak/prestissimo
composer clear-cache
composer install --no-dev --optimize-autoloader --working-dir=/var/www/html


