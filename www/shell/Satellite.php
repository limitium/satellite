<?php
class Satellite {

    private $domain;
    private $config;
    private $fm;
    private $cache = array();

    public function __construct() {
        $this->domain = $domain = str_replace(".", "", $_SERVER['HTTP_HOST']);
        $this->fm = new FileManager();
        $this->config = $config = include $this->getPath('config.php');
    }

    public function getPath($path) {
        return $this->fm->getPath("data/" . $this->getDomain() . "/$path");
    }

    public function getDomain() {
        return $this->domain;
    }

    public function getConfig() {
        return $this->config;
    }

    public function get($type, $sortBy = 'byDate') {
        return $this->fm->getFiles($this->getPath("$type/"), $sortBy);
    }

    public function loadData($fileName, $class) {
        if (!isset($this->cache[$fileName])) {
            if (!file_exists($fileName)) {
                throw new Exception("404 $class not found!");
            }
            $data = include $fileName;
            $this->cache[$fileName] = new $class($fileName, $data, filemtime($fileName));
        }
        return $this->cache[$fileName];
    }

    public function save(Page $page) {
        $this->fm->saveFile($page->getFilePath(), "<?php return " . var_export($page->asArray(), 1).";");
    }

    public function getTpl($tpl) {
        $viewFile = $this->getPath("tpl/{$tpl}.php");
        if (!file_exists($viewFile)) {
            $viewFile = $this->fm->getPath("/shell/tpl/{$tpl}.php");
            if (!file_exists($viewFile)) {
                throw new Exception('View ' . $viewFile . ' not found');
            }
        }
        return $viewFile;
    }

    public function getCfg($k) {
        return $this->config[$k];
    }
}
