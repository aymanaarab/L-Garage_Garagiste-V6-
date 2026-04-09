#!/bin/sh

# Substitute PORT into nginx config
envsubst '${PORT}' < /etc/nginx/http.d/default.conf > /etc/nginx/http.d/default.conf.tmp
mv /etc/nginx/http.d/default.conf.tmp /etc/nginx/http.d/default.conf

# Fix permissions
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache

# Laravel setup
php artisan storage:link --force
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start supervisor in background temporarily to test
supervisord -c /etc/supervisor.d/supervisord.ini &
sleep 3
echo "=== Testing HTTP response ==="
wget -qO- http://localhost:$PORT/ 2>&1 | head -50
echo "=== wget exit code: $? ==="
sleep infinity

# Start supervisor
exec supervisord -c /etc/supervisor.d/supervisord.ini