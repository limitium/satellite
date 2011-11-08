<?php

class PostController {

    public static $postsMeta = null;

    /**
     *
     * @return array of post files 
     */
    public static function scanPosts() {
        if (!self::$postsMeta) {
            $pageDir = getPath('pages/');
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

    public function getList(Request $request) {
        $posts = array();
        foreach (self::scanPosts() as $post) {
            $posts[] = Post::load($post['fname']);
        }
        $this->posts = $posts;
    }

    public function getPost(Request $request) {
        $postId = $request->get('id');
        if (!file_exists(getPath('pages/') . $postId)) {
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

    public static function getArchive() {
        $months = array();
        foreach (self::scanPosts() as $post) {
            $k = date("Y/m", $post['time']);
            if (!isset($months[$k])) {
                $months[$k] = str_replace(array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'), date("F Y", $post['time']));
            }
        }
        return $months;
    }

}
