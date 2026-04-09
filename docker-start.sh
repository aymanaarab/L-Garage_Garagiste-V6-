#!/bin/sh
set -e

echo "Running migrations..."
php artisan migrate --force || true

echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting services..."
exec /usr/bin/supervisord -c /etc/supervisor.d/supervisord.ini
