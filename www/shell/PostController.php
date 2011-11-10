<?php

class PostController {

    public static $postsMeta = null;

    /**
     *
     * @return array of post files 
     */
    public static function scanPosts() {
        if (!self::$postsMeta) {
            $pageDir = getDomenPath('pages/');
            $sortedByDate = array();
            foreach (scandir($pageDir) as $fileId) {
                if (is_file($pageDir . $fileId)) {
                    $sortedByDate[] = array('fname' => $fileId, 'time' => filemtime($pageDir . $fileId));
                }
            }

            function sorter($a, $b) {
                return $a['time'] < $b['time'] ? 1 : -1;
            }

            usort($sortedByDate, "sorter");
            self::$postsMeta = $sortedByDate;
        }
        return self::$postsMeta;
    }

    public function getPage(Request $request) {
        $this->page = $request->cfg['pages'][$request->get('page')];
        $this->url = $request->get('page');
    }

    public function getArchive(Request $request) {
        $from = mktime(0, 0, 0, $request->get('month'), 1, $request->get('year'));
        $to = mktime(0, 0, 0, $request->get('month') + 1, 0, $request->get('year'));
        $posts = array();
        foreach (self::scanPosts() as $post) {
            if ($post['time'] >= $from && $post['time'] <= $to) {
                $posts[] = Post::load($post['fname']);
            }
        }
        $this->archiveDate = self::getMonthName($from);
        $this->posts = $posts;
    }

    public function getList(Request $request) {
        $posts = array();
        foreach (self::scanPosts() as $post) {
            $posts[] = Post::load($post['fname']);
        }
        $this->posts = $posts;
    }

    public function getPost(Request $request) {
        $postId = $request->get('id');
        if (!file_exists(getDomenPath('pages/') . $postId)) {
            throw new Exception('post not found');
        }
        $this->post = Post::load($postId);
    }

    public static function getRecentPosts() {
        $posts = array();
        $max = 5;
        foreach (self::scanPosts() as $post) {
            if (!$max--) {
                break;
            }
            $posts[] = Post::load($post['fname']);
        }
        return $posts;
    }

    public static function getArchiveMonth() {
        $months = array();
        foreach (self::scanPosts() as $post) {
            $k = date("Y/m", $post['time']);
            if (!isset($months[$k])) {
                $months[$k] = self::getMonthName($post['time']);
            }
        }
        return $months;
    }

    private static function getMonthName($time) {
        return str_replace(array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'), date("F Y", $time));
    }

}
