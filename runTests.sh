#!/bin/bash
php phpunit-6.phar --log-junit $( date '+%Y-%m-%d' ).xml  --configuration  tests/phpunit.xml tests
