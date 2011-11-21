<?php

error_reporting(E_ALL | E_STRICT);

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'shell' . DIRECTORY_SEPARATOR . 'Bootstrap.php');

Dispatcher::create(include getDomenPath('config.php'))
        ->execute(Request::create());