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
        extract($this->data);
        ob_start();
        include $this->tpl;
        return ob_get_clean();
    }

}

