#!/usr/bin/env bash
echo "Running composer"
composer global remove hirak/prestissimo
composer clear-cache
composer install --no-dev --optimize-autoloader --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache
echo "Caching routes..."
php artisan route:cache
echo "Running migrations..."
php artisan migrate
