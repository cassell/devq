<?php

return new \Devq\Container\Container(array_replace_recursive(
    \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/container.yml')),
    \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/../config.yml'))
), new \League\Container\Container());
