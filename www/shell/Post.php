<?php

class Post {

    private $fileId;
    public $title;
    public $body;
    public $published;
    public $comments = array();
    private static $postLoaded = array();

    /**
     *
     * @param String $fileId
     * @return Post
     * @throws Exception 
     */
    public static function load($fileId) {
        if (!isset(self::$postLoaded[$fileId])) {
            $pageDir = getDomenPath('pages/');
            $commentsDir = getDomenPath('comments/');
            if (!file_exists($pageDir . $fileId)) {
                throw new Exception('Post not found '.$fileId);
            }
            $postData = include $pageDir . $fileId;
            $commentData = array();
            if (file_exists($commentsDir . $fileId)) {
                $commentData = include $commentsDir . $fileId;
            }
            self::$postLoaded[$fileId] = new self($fileId, $postData['title'], $postData['body'], filemtime($pageDir . $fileId), $commentData);
        }
        return self::$postLoaded[$fileId];
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
        return str_replace(array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'), date($format, $this->published));
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

    /**
     *
     * @return Post 
     */
    public function getNext() {
        $cur = false;
        foreach (PostController::scanPosts() as $post) {
            if ($cur) {
                return Post::load($post['fname']);
            }
            if ($post['fname'] == $this->getId()) {
                $cur = true;
            }
        }
    }

    /**
     *
     * @return Post 
     */
    public function getPrev() {
        $prev = null;
        foreach (PostController::scanPosts() as $post) {
            if ($post['fname'] == $this->getId()) {
                if ($prev) {
                    return Post::load($prev['fname']);
                }
                break;
            }
            $prev = $post;
        }
    }

}
