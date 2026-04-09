#!/bin/bash
set -e

echo "Running Laravel optimizations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Running database migrations..."
php artisan migrate --force

echo "Starting Apache..."
apache2-foreground
