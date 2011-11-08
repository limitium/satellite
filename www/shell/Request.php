<?php

class Request {

    public $method;
    public $controller;
    public $action;
    public $args = array();

    /**
     *
     * @return Request 
     */
    public static function create() {
        return new self();
    }

    private function __construct() {
        $this->parse();
    }

    private function parse() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        foreach (explode('/', $_SERVER['REQUEST_URI']) as $p) {
            $p = trim($p);
            if ($p) {
                $this->args[] = $p;
            }
        }

        $asoc = array();

        switch (sizeof($this->args)) {
            case 2:
                if ($this->args[0] == 'page') {
                    $asoc['page'] = $this->args[1];
                    $this->controller = 'post';
                    $this->action = 'list';
                }
                if ($this->args[0] == 'post') {
                    $asoc['id'] = $this->args[1];
                    $this->controller = 'post';
                    $this->action = 'post';
                }
                break;
            default:
                $this->controller = 'post';
                $this->action = 'list';
                break;
        }
        $this->args = $asoc;
    }

    public function isPost() {
        return $this->method == 'POST';
    }

    public function isGet() {
        return $this->method == 'GET';
    }

    public function has($k) {
        return isset($this->args[$k]);
    }

    public function get($k) {
        if (!isset($this->args[$k])) {
            throw new Exception('arg not found');
        }
        return $this->args[$k];
    }

}

