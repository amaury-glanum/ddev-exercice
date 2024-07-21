FROM php:8.1.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite \
    && a2enmod ssl

RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    unzip \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev  \

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html/

ADD /conf/els-togo.conf /etc/apache2/sites-available/
RUN ln -s /etc/apache2/sites-available/els-togo.conf /etc/apache2/sites-enabled/

# Adjust directory permissions (e.g., read, write, execute for everyone)
RUN chmod -R 777 /var/www/html/assets/data/
RUN chmod -R 777 /var/www/html/uploads/

# Adjust file permissions (e.g., read, write for everyone)
RUN chmod 666 /var/www/html/assets/data/project.json

# Node.js 18
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

#Install project dependencies
RUN npm install

#Run the Webpack build (modify the command according to your needs)
RUN npm run build

RUN composer install

RUN composer dump-autoload

# Make port 80 available to the world outside this container
EXPOSE 80

# Define environment variable
ENV URL "https://els-togo.onrender.com"
ENV ELS_SITE_URL "https://els-togo.onrender.com"
# Run apache when the container launches
CMD ["apache2-foreground"]
