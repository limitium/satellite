<?php

class View {

    private $tpl;
    private $data;

    private function __construct($tpl, $data = array()) {
        $this->tpl = $tpl;
        $this->data = $data;
    }

    /**
     *
     * @param String $tpl
     * @param array $data
     * @return View 
     */
    public static function create($tpl, $data = array()) {
        return new self($tpl, $data);
    }

    public function render() {
        ob_start();
        extract($this->data);
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'tpl' . DIRECTORY_SEPARATOR . $this->tpl . '.html';
        return ob_get_clean();
    }

}

