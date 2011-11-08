<?php

function __autoload($class_name) {
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . $class_name . '.php';
}

function getPath($path = "") {
    $path = str_replace("/", DIRECTORY_SEPARATOR, $path);
    return dirname(__FILE__) . DIRECTORY_SEPARATOR . $path;
}