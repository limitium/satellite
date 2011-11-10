<?php

class Request {

    public $method;
    public $controller;
    public $action;
    public $args = array();
    public $cfg;

    /**
     *
     * @return Request 
     */
    public static function create($cfg) {
        return new self($cfg);
    }

    private function __construct($cfg) {
        $this->cfg = $cfg;
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

        $this->controller = 'post';
        $this->action = 'list';

        switch (sizeof($this->args)) {
            case 1:
                if (isset($this->cfg['pages'][$this->args[0]])) {
                    $asoc['page'] = $this->args[0];
                    $this->action = 'page';
                }
                break;
            case 2:
                if ($this->args[0] == 'page') {
                    $asoc['page'] = $this->args[1];
                    $this->action = 'list';
                }
                if ($this->args[0] == 'post') {
                    $asoc['id'] = $this->args[1];
                    $this->action = 'post';
                }
                break;
            case 3:
                if ($this->args[0] == 'archive') {
                    $this->action = 'archive';
                    $asoc['year'] = (int) $this->args[1];
                    $asoc['month'] = (int) $this->args[2];
                }
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

