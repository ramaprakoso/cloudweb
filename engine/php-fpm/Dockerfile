FROM phpdockerio/php72-fpm:latest
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install php7.2-mysql php7.2-gd cron \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*


# Install composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install package.json with composer
# RUN cd project-tracker && composer install --no-plugins --no-scripts
# RUN pwd
# RUN ls -a

# add cron job
# ADD crontab /etc/cron.d/project-tracker-cron
# RUN chmod 0644 /etc/cron.d/project-tracker-cron

# RUN apt-get -y --no-install-recommends install cron
# CMD cron && tail -f /application/logs/cron.log