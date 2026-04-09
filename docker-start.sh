#!/bin/sh
# DEBUG
echo "=== PORT value is: $PORT ==="
echo "=== Nginx config BEFORE substitution ==="
cat /etc/nginx/http.d/default.conf

# Substitute $PORT into nginx config
envsubst '${PORT}' < /etc/nginx/http.d/default.conf > /etc/nginx/http.d/default.conf.tmp
mv /etc/nginx/http.d/default.conf.tmp /etc/nginx/http.d/default.conf

echo "=== Nginx config AFTER substitution ==="
cat /etc/nginx/http.d/default.conf

# Run migrations and cache
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start supervisor
exec supervisord -c /etc/supervisor.d/supervisord.ini