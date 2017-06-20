FROM php:5-fpm-alpine

# Set the working directory to /app
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY ./app /app
COPY ./caddy /app/caddy
COPY ./Caddyfile /app/Caddyfile
COPY ./starter_script.sh /app/starter_script.sh

# Make port2015 available to the world outside this container
EXPOSE 2015

# Define environment variable
# ENV NAME World

# Run app.py when the container launches
# ENTRYPOINT ["php5-fpm","&&", "caddy"]
CMD ./starter_script.sh
