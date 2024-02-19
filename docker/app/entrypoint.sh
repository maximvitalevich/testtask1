#!/usr/bin/env bash
set -e

>&2 echo "App run"

composer install --no-interaction

/usr/bin/supervisord -n -c /etc/supervisor/supervisord.conf

exec "$@"
