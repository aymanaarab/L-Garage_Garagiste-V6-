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
    composer \
    libxml2-dev \
    oniguruma-dev

# Install PHP extensions
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    xml \
    ctype \
    mbstring \
    session

# Copy project
COPY . .

# Remove vendor and node_modules to rebuild
RUN rm -rf vendor node_modules

# Install dependencies
RUN composer install --no-dev --optimize-autoloader --ignore-platform-req=ext-session && \
    npm install && npm run production

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Copy nginx config
COPY nginx.conf /etc/nginx/http.d/default.conf

# Copy supervisor config
RUN mkdir -p /etc/supervisor.d
COPY supervisord.ini /etc/supervisor.d/supervisord.ini

# Copy startup script
COPY docker-start.sh /usr/local/bin/docker-start.sh
RUN chmod +x /usr/local/bin/docker-start.sh

EXPOSE 80

CMD ["/usr/local/bin/docker-start.sh"]
