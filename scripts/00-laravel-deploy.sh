#!/usr/bin/env bash
echo "Running composer"
composer global remove hirak/prestissimo
composer global update

echo "Caching config..."
php artisan config:cache
echo "Caching routes..."
php artisan route:cache
echo "Running migrations..."
php artisan migrate --force
