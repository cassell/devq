#!/usr/bin/env bash

cd `dirname $0`

cd ..

vendor/bin/phinx migrate --environment=development