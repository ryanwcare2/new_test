#!/bin/bash

composer --no-interaction install

# ll exec the CMD from your Dockerfile, i.e. "npm start"
exec "$@"
