<?php

class Post {

    private $fileId;
    public $title;
    public $body;
    public $published;
    public $comments = array();

    /**
     *
     * @param String $fileId
     * @return Post
     * @throws Exception 
     */
    public static function load($fileId) {
        $pageDir = getPath('pages/');
        $commentsDir = getPath('comments/');
        if (file_exists($pageDir . $fileId)) {
            $postData = include $pageDir . $fileId;
            $commentData = array();
            if (file_exists($commentsDir . $fileId)) {
                $commentData = include $commentsDir . $fileId;
            }
            return new self($fileId, $postData['title'], $postData['body'], filemtime($pageDir . $fileId), $commentData);
        }
        throw new Exception('Post not found');
    }

    private function __construct($fileId, $title, $body, $published = 0, $commetns = array()) {
        $this->fileId = $fileId;
        $this->title = $title;
        $this->body = $body;
        $this->published = $published;
        $this->comments = $commetns;
    }

    public function getCommentsCount() {
        return sizeof($this->comments);
    }

    public function getPublished($format = "d.m.Y H:i") {
        return date($format, $this->published);
    }

    public function getTruncateBody($length = 100, $truncate_string = '...', $truncate_lastspace = false) {
        $text = $this->body;
        if ($text == '') {
            return '';
        }

        $mbstring = extension_loaded('mbstring');
        if ($mbstring) {
            $old_encoding = mb_internal_encoding();
            @mb_internal_encoding(mb_detect_encoding($text));
        }
        $strlen = ($mbstring) ? 'mb_strlen' : 'strlen';
        $substr = ($mbstring) ? 'mb_substr' : 'substr';

        if ($strlen($text) > $length) {
            $truncate_text = $substr($text, 0, $length - $strlen($truncate_string));
            if ($truncate_lastspace) {
                $truncate_text = preg_replace('/\s+?(\S+)?$/', '', $truncate_text);
            }
            $text = $truncate_text . $truncate_string;
        }

        if ($mbstring) {
            @mb_internal_encoding($old_encoding);
        }

        return $text;
    }

    public function getId() {
        return $this->fileId;
    }

}
