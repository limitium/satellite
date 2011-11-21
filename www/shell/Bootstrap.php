<?php

function __autoload($class_name) {
    require_once __DIR__ . DIRECTORY_SEPARATOR . $class_name . '.php';
}

function getPath($path = "") {
    $path = str_replace("/", DIRECTORY_SEPARATOR, $path);
    return __DIR__ . DIRECTORY_SEPARATOR . $path;
}

function getDomen() {
    return str_replace(".ru", "", $_SERVER['HTTP_HOST']);
}

function getDomenPath($path = "") {
    return getPath("../data/" . getDomen() . "/" . $path);
}