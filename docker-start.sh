#!/bin/sh

echo "=== All nginx files ==="
find /etc/nginx -type f

# Substitute PORT into nginx config (DON'T delete it first!)
envsubst '${PORT}' < /etc/nginx/http.d/default.conf > /etc/nginx/http.d/default.conf.tmp
mv /etc/nginx/http.d/default.conf.tmp /etc/nginx/http.d/default.conf

echo "=== Nginx config after substitution ==="
cat /etc/nginx/http.d/default.conf

echo "=== nginx test ==="
nginx -t 2>&1

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
php artisan view:clear
php artisan view:cache

supervisord -c /etc/supervisor.d/supervisord.ini &
sleep 3
echo "=== Active ports ==="
netstat -tlnp 2>/dev/null
echo "=== Nginx error log ==="
cat /var/log/nginx/error.log 2>/dev/null
echo "=== Nginx pid ==="
cat /var/run/nginx.pid 2>/dev/null
echo "=== Testing ==="
wget -qO- http://127.0.0.1:$PORT/ 2>&1
echo "=== Laravel log ==="
cat /var/www/html/storage/logs/laravel.log 2>/dev/null | tail -50
sleep infinity

# Start supervisor
exec supervisord -c /etc/supervisor.d/supervisord.ini