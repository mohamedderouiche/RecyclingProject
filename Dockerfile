FROM php:8.2

# Update and install necessary packages
RUN apt-get update -y && apt-get install -y \
    openssl zip unzip git \
    libonig-dev default-mysql-client \
    curl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Set working directory
WORKDIR /app
COPY . /app

COPY .env /app/.env

# Install PHP dependencies via Composer
RUN composer install

# Install npm dependencies
RUN npm install

# Expose the port for the application
EXPOSE 8001

# Command to run your application and listen on all network interfaces
CMD php artisan serve --host=0.0.0.0 --port=8000
    