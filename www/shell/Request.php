<?php

class Request {

    public $method;
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
    }

    public function isPost() {
        return $this->method == 'POST';
    }

    public function isGet() {
        return $this->method == 'GET';
    }

}

