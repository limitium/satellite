<?php
class FileManager {
    private $cache = array();

    public function get($path) {
        return getDomainPath($path);
    }

    public function getFiles($path, $sortBy) {
        $path = str_replace("/", DIRECTORY_SEPARATOR, $path);
        if (!isset($this->cache[$path])) {
            $sorted = array();
            foreach (scandir($path) as $fileId) {
                if (is_file($path . $fileId)) {
                    $sorted[] = array('fname' => $fileId, 'time' => filemtime($path . $fileId));
                }
            }

            usort($sorted, array('FileManager', $sortBy));
            $this->pagesMeta = $sorted;
        }
        return $this->pagesMeta;
    }

    private static function byDate($a, $b) {
        $a['time'] < $b['time'] ? 1 : -1;
    }

    private static function byName($a, $b) {
        $a['fname'] < $b['fname'] ? 1 : -1;
    }

    public static function getRoot() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
    }

    public function getPath($path = "") {
        return self::getRoot() . str_replace("/", DIRECTORY_SEPARATOR, $path);
    }

    public function saveFile($name, $content) {
        file_put_contents($name,$content);
    }
}
