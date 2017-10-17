FROM debian:8.6
MAINTAINER Florian Mueller <docker@flmue.de>
# Let the conatiner know that there is no tty
ENV DEBIAN_FRONTEND noninteractive
ENV COMPOSER_NO_INTERACTION 1

# Add Node.js repo
RUN apt-get update \
 && apt-get install --no-install-recommends -y \
 curl \
 apt-transport-https \
 ca-certificates \
 && curl -s https://deb.nodesource.com/gpgkey/nodesource.gpg.key | apt-key add - \
 && echo "deb https://deb.nodesource.com/node_6.x jessie main" > /etc/apt/sources.list.d/nodesource.list \
 # Install tools
 && apt-get update \
 && apt-get install --no-install-recommends -y \
 openssh-client \
 bzip2 \
 rsync \
 git \
 php5-cli \
 php5-curl \
 php5-gd \
 php5-xmlrpc \
 php5-xsl \
 nodejs \
 ant \
 libfontconfig \
 # Slim down image
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/man/?? /usr/share/man/??_*

# Show versions
RUN php -v
RUN node -v
RUN npm -v

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer selfupdate

# Install node tools
RUN npm install -g grunt
RUN npm install -g grunt-cli
RUN grunt --version

WORKDIR /app
COPY . .
RUN npm install

VOLUME ["/app/dist"]

ENTRYPOINT ["node_modules/.bin/grunt", "build", "--force"]