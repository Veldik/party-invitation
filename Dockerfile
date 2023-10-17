FROM php:8.1.3-apache

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf 


RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf  


RUN apt-get clean
RUN apt-get update && apt-get install -y \
        zlib1g-dev libicu-dev g++ \
        libjpeg62-turbo-dev \
        libzip-dev \
        libpng-dev \
        libwebp-dev \
        libfreetype6-dev \
    	libxml2-dev \
    	git \
    	zip \
    	unzip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-configure gd --with-webp=/usr/include/webp --with-jpeg=/usr/include --with-freetype=/usr/include/freetype2/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl


    
RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \ 
    && docker-php-ext-enable redis
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
RUN a2enmod rewrite
RUN a2enmod expires

WORKDIR /var/www/html/
EXPOSE 8050
