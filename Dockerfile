FROM php:7.3-apache
#Install git
RUN apt-get update && apt-get install -y git
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
RUN cd /var/www/html/
RUN mkdir application
RUN mkdir public
RUN mkdir web
COPY application /var/www/html/application
COPY public /var/www/html/public
COPY web /var/www/html/web
RUN cd /var/www/html/web && NG_CLI_ANALYTICS=false npm install && npm run build
EXPOSE 80