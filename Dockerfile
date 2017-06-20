FROM php:5-fpm-alpine

# Set the working directory to /app
WORKDIR /app

# Copy needed content to /app
COPY ./app /app
COPY ./caddy /app/caddy
COPY ./Caddyfile /app/Caddyfile
# starter_script runs php-fpm then caddy, checking for failure of either
COPY ./starter_script.sh /app/starter_script.sh

# Make port2015 available to the world outside this container
EXPOSE 2015

# Run script to start php-fpm and caddy when the container launches
CMD ./starter_script.sh
