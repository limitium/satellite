<?php

error_reporting(E_ALL | E_STRICT);

require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'shell' . DIRECTORY_SEPARATOR . 'Bootstrap.php');

Dispatcher::create(new Satellite())
        ->execute(new Request())
        ->printPage();