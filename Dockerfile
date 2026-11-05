# Official lightweight PHP 8.2 with Apache
FROM php:8.2-apache

# Install MySQL extensions for database connectivity
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache rewrite module
RUN a2enmod rewrite

# Support dynamic port binding (for Render, Railway, etc.)
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Set working directory
WORKDIR /var/www/html

# Copy all project files into Apache document root
COPY . /var/www/html/

# Configure file permissions so messages.txt is writable
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && touch /var/www/html/messages.txt \
    && chmod 666 /var/www/html/messages.txt

ENV PORT=80
EXPOSE 80

CMD ["apache2-foreground"]

