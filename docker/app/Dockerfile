FROM php:8.0-apache-buster

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Update
RUN apt-get -y update --fix-missing && \
    apt-get upgrade -y && \
    apt-get --no-install-recommends install -y apt-utils && \
    rm -rf /var/lib/apt/lists/*


# Install useful tools and install important libaries
RUN apt-get -y update && \
    apt-get -y --no-install-recommends install unzip && \
    apt-get -y --no-install-recommends install nano wget dialog && \
    apt-get -y --no-install-recommends install zlib1g-dev libzip-dev libicu-dev && \
    apt-get -y --no-install-recommends install --fix-missing apt-utils build-essential git && \
    apt-get -y --no-install-recommends install --fix-missing curl zip openssl zsh
RUN apt-get -y --no-install-recommends install zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Other PHP8 Extensions
RUN docker-php-ext-install zip
RUN docker-php-ext-install gd

# Cleanup
RUN rm -rf /usr/src/*

WORKDIR /var/www


# Create system user
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user

# Oh my zsh
RUN wget -qO- https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh | zsh || true