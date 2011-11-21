<?php

class PostController {

    public static $postsMeta = null;

    /**
     * @static
     * @return Array[]
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

    public function getPage(Request $request,Dispatcher $dispatcher) {
        $this->page = $dispatcher->cfg['pages'][$request->get('page')];
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
        $pages = array();

        $page = $request->has('page') && $request->get('page') ? $request->get('page') : 1;

        $postFiles = self::scanPosts();

        $postsPerPage = 5;

        $from = ($page - 1) * $postsPerPage;
        $to = $from + $postsPerPage;
        $to = $to > sizeof($postFiles) ? sizeof($postFiles) : $to;
        for ($i = $from; $i < $to; $i++) {
            $posts[] = Post::load($postFiles[$i]['fname']);
        }
        $this->posts = $posts;


        for ($i = 0; $i < sizeof($postFiles) / $postsPerPage; $i++) {
            $pages[] = $i + 1;
        }
        $this->pages = $pages;
    }

    public function getPost(Request $request) {
        $postId = $request->get('id');
        if (!file_exists(getDomenPath('pages/') . $postId)) {
            throw new Exception('post not found');
        }
        $this->post = Post::load($postId);
    }

    /**
     * @static
     * @return Post[]
     */
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

    /**
     * @static
     * @return String[]
     */
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

    public function asArray(){
        return (array)$this;
    }
}
