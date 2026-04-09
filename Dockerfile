FROM php:8.1-fpm-alpine

WORKDIR /var/www/html

# Install dependencies
RUN apk add --no-cache \
    git \
    curl \
    zip \
    npm \
    nginx \
    supervisor \
    composer

# Install PHP extensions
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    xml \
    ctype

# Copy project
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader && \
    npm install && npm run production

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Create nginx config
RUN mkdir -p /etc/nginx/http.d && echo 'server {
    listen 80;
    server_name _;
    root /var/www/html/public;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}' > /etc/nginx/http.d/default.conf

# Create supervisor config
RUN mkdir -p /etc/supervisor.d && echo '[supervisord]
nodaemon=true

[program:php-fpm]
command=php-fpm
autorestart=true

[program:nginx]
command=nginx -g "daemon off;"
autorestart=true' > /etc/supervisor.d/supervisord.ini

# Run migrations and start services
RUN mkdir -p /app && echo '#!/bin/sh
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force || true
exec /usr/bin/supervisord -c /etc/supervisor.d/supervisord.ini' > /app/start.sh && \
    chmod +x /app/start.sh

EXPOSE 80

CMD ["/app/start.sh"]
