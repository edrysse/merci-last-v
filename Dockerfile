FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libpq-dev \
    libzip-dev \
    unzip \
    zip \
    git

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Expose port
EXPOSE 80

# Start the PHP-FPM service
CMD ["php-fpm"]
