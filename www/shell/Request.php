<?php

class Request {

    public $method;
    public $controller;
    public $action;
    public $params = array();
    public $cfg;

    public function __construct() {
        $this->parse();
    }

    private function parse() {
        $this->method = $_SERVER['REQUEST_METHOD'];

        $urlParts = array();
        foreach (explode('/', strtolower($_SERVER['REQUEST_URI'])) as $p) {
            $p = trim($p);
            if ($p) {
                $urlParts[] = $p;
            }
        }

        $this->params = $this->manageRoutes($urlParts);

    }

    private function manageRoutes($urlParts) {
        $params = array();

        /**
         * get satellite
         */
        $this->controller = 'post';
        $this->action = 'list';

        switch (sizeof($urlParts)) {
            /**
             * get satellite/:id
             * post satellite/(post|page)
             */
            case 1:
                if ($this->isGet()) {
                    $params['id'] = $urlParts[0];
                    $this->controller = 'page';
                    $this->action = 'page';
                } else {
                    if ($urlParts[0] == 'page' || $urlParts[0] == 'post') {
                        $this->controller = $urlParts[0];
                        $this->action = $urlParts[0];
                        $params = $_POST;
                    }
                }
                break;
            /**
             * get satellite/post/:id
             * get satellite/page/:page
             */
            case 2:
                if ($urlParts[0] == 'post') {
                    $params['id'] = $urlParts[1];
                    $this->action = 'post';
                }
                if ($urlParts[0] == 'page') {
                    $params['page'] = (int)$urlParts[1];
                }
                break;
            /**
             * get satellite/archive/:year/:month
             */
            case 3:
                if ($urlParts[0] == 'archive') {
                    $this->action = 'archive';
                    $params['year'] = (int)$urlParts[1];
                    $params['month'] = (int)$urlParts[2];
                }
                break;
        }
        return $params;
    }

    public function isPost() {
        return $this->method == 'POST';
    }

    public function isGet() {
        return $this->method == 'GET';
    }

    public function has($k) {
        return isset($this->params[$k]);
    }

    public function get($k) {
        if (!isset($this->params[$k])) {
            throw new Exception("Param $k not found");
        }
        return $this->params[$k];
    }

}