FROM php:7.4-apache
RUN apt-get update && apt-get install -y libssl-dev && rm -rf /var/lib/apt/lists/* \
	&& pecl install mongodb \
	&& docker-php-ext-enable mongodb
