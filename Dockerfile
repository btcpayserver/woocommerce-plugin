FROM php:5.6-cli

RUN apt-get update && apt-get install -my wget gnupg

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -

RUN apt-get update \
    && apt-get install -y \
        nodejs \
		build-essential \
        npm \
        git \
        libmcrypt-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install mcrypt \
    && apt-get remove -y \
        libmcrypt-dev \
    && apt-get install -y \
        libmcrypt4 \
    && apt-get autoremove -y


# Let the conatiner know that there is no tty
ENV DEBIAN_FRONTEND noninteractive
ENV COMPOSER_NO_INTERACTION 1

# RUN ln -s "$(which nodejs)" /usr/bin/node
# Show versions
RUN php -v && node -v && npm -v

WORKDIR /app
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer selfupdate

# Install node tools
RUN npm install -g n && n stable
RUN npm install -g grunt
RUN grunt --version

RUN docker-php-ext-install bcmath

COPY composer.json composer.json
RUN php /usr/local/bin/composer install --no-dev

COPY package.json package.json
RUN npm install

COPY . .
VOLUME ["/app/dist"]

ENTRYPOINT ["node_modules/.bin/grunt", "build", "--force"]