# Use official PHP image as a base
FROM php:8.2-fpm

# Install necessary system packages
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . .

# Create a non-root user
RUN useradd -ms /bin/bash ubuntu && chown -R ubuntu:ubuntu /var/www

# Switch to non-root user
USER ubuntu

# Default command to run at startup
CMD if [ ! -f "composer.json" ]; then \
        composer create-project --prefer-dist laravel/laravel .; \
    fi && \
    if [ ! -f "vendor/autoload.php" ]; then \
        composer install --optimize-autoloader --no-dev; \
    fi && \
    php-fpm
