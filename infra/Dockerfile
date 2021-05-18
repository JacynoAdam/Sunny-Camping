FROM php:fpm

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install NodeJS
RUN curl -L https://raw.githubusercontent.com/tj/n/master/bin/n -o n && bash n lts

# Install Packages
RUN apt-get update && apt-get install -y git zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install PHP Extensions
RUN docker-php-ext-install pdo pdo_mysql
