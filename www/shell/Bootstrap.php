<?php

function __autoload($class_name) {
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . $class_name . '.php';
}