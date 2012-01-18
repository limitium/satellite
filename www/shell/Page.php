<?php
class Page {

    private $filePath;
    public $title;
    public $body;

    public function __construct($filePath, $pageData) {
        $this->filePath = $filePath;
        $this->title = $pageData['title'];
        $this->body = $pageData['body'];
    }


    public function getId() {
        $parts = explode(DIRECTORY_SEPARATOR, $this->filePath);
        return array_pop($parts);
    }

    public function getFilePath() {
        return $this->filePath;
    }

    public function asArray() {
        return array('title' => $this->title, 'body' => $this->body);
    }
}
