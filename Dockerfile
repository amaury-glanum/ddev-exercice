FROM php:8.1.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite \
    && a2enmod ssl

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html/

ADD /conf/els-togo.conf /etc/apache2/sites-available/
RUN ln -s /etc/apache2/sites-available/els-togo.conf /etc/apache2/sites-enabled/

# Node.js 18
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

#Install project dependencies
RUN npm install

#Run the Webpack build (modify the command according to your needs)
RUN npm run prod

# Make port 80 available to the world outside this container
EXPOSE 80

# Define environment variable
ENV URL "http://local.els-togo.com"

# Run apache when the container launches
CMD ["apache2-foreground"]
