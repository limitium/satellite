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
        $viewFile = getDomenPath('tpl/') . $this->tpl . '.php';
        if (!file_exists($viewFile)) {
            $viewFile = getPath('tpl/') . $this->tpl . '.php';
            if (!file_exists($viewFile)) {
                throw new Exception('View ' . $viewFile . ' not found');
            }
        }
        ob_start();
        extract($this->data);
        include $viewFile;
        return ob_get_clean();
    }

}

