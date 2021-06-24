FROM php:8.0-fpm

RUN apt-get update && apt-get install -y --no-install-recommends\
        git \
        wget \
        unzip \
        libaio1 \
        libpq-dev \
        libssh-dev \
        libonig-dev \
    && docker-php-ext-install \
        pcntl \
        mbstring \
        mysqli \
        pdo pdo_mysql

RUN wget https://get.symfony.com/cli/installer -O - | bash && mv /root/.symfony/bin/symfony /usr/local/bin/symfony
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN chown -R www-data:www-data /var/www
RUN usermod -u 1000 www-data
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
RUN ["chmod", "+x", "/usr/local/bin/docker-php-entrypoint"]
CMD composer install ; wait-for-it database:3306 -- bin/console doctrine:schema:update --force; php bin/console doctrine:fixtures:load;
WORKDIR /var/www/