#!/bin/bash

composer --no-interaction install

# This wi
# ll exec the CMD from your Dockerfile, i.e. "npm start"

/usr/sbin/php-fpm7.2 -F

exec "$@"
