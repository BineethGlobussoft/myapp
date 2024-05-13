FROM debian:bookworm-20210816-slim

# Install Apache and PHP packages
RUN apt-get update && \
    apt-get install -y \
        apache2 \
        libapache2-mod-php \
        php \
        php-mysql \
        php-cli \
        php-curl \
        php-dev \
        php-fpm \
        php-gd \
        php-imap \
        php-mbstring \
        php-xml \
        php-xsl \
        php-zip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Remove the default index.html file from Apache's document root
RUN rm -f /var/www/html/index.html

# Copy your application files to Apache's document root
COPY . /var/www/html

# Enable PHP module in Apache
RUN a2enmod php*

# Restart Apache service
RUN service apache2 restart

# Expose port 8081 to the outside world
EXPOSE 8081

# Run Apache in the foreground when the container starts
CMD ["apache2ctl", "-D", "FOREGROUND"]

