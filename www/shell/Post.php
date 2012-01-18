<?php

class Post extends Page {

    public $published;
    public $comments = array();
    public $prev = null;
    public $next = null;

    public function __construct($filePath, $pageData, $published = 0) {
        parent::__construct($filePath, $pageData);
        $this->published = $published;
        $this->comments = array();
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

    /**
     *
     * @return Post
     */
    public function getNext() {
        $cur = false;
//        foreach ($this->scanPosts() as $post) {
//            if ($cur) {
//                return Post::load($post['fname']);
//            }
//            if ($post['fname'] == $this->getId()) {
//                $cur = true;
//            }
//        }
    }

    /**
     *
     * @return Post
     */
    public function getPrev() {
        $prev = null;
//        foreach ($this->scanPosts() as $post) {
//            if ($post['fname'] == $this->getId()) {
//                if ($prev) {
//                    return Post::load($prev['fname']);
//                }
//                break;
//            }
//            $prev = $post;
//        }
    }

}
