#!/usr/bin/env bash

PROJECT_ROOT=$(git rev-parse --show-toplevel)

$PROJECT_ROOT/vendor/bin/phpunit -c "$PROJECT_ROOT/phpunit.xml"