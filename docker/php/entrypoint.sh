#!/bin/sh

set -eu

# Waits for Redis
docker/wait-for-it.sh redis:6379 -t 30

# Executes container command
set -x
exec "$@"