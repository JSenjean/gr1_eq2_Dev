#!/bin/bash
php phpunit --log-junit $( date '+%Y-%m-%d' ).xml  --configuration  tests/phpunit.xml tests
