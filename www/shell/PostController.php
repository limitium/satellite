<?php

class PostController extends PageController {


    public function getList(Request $request, Satellite $satellite) {
        $posts = array();

        $this->curPage = $request->has('page') && $request->get('page') ? $request->get('page') : 1;

        $postFiles = $satellite->get('posts');

        $postsPerPage = 7;

        $from = ($this->curPage - 1) * $postsPerPage;
        $to = $from + $postsPerPage;
        $to = $to > sizeof($postFiles) ? sizeof($postFiles) : $to;
        for ($i = $from; $i < $to; $i++) {
            $posts[] =  self::loadPost($postFiles[$i]['fname'], $satellite);
        }
        $this->posts = $posts;


        for ($i = 0; $i < sizeof($postFiles) / $postsPerPage; $i++) {
            $pages[] = $i + 1;
        }
        $this->pages = $pages;

    }


    public function getArchive(Request $request, Satellite $satellite) {
        $from = mktime(0, 0, 0, $request->get('month'), 1, $request->get('year'));
        $to = mktime(0, 0, 0, $request->get('month') + 1, 0, $request->get('year'));
        $posts = array();
        foreach ($satellite->get('posts') as $post) {
            if ($post['time'] >= $from && $post['time'] <= $to) {
                $posts[] = self::loadPost($post['fname'], $satellite);
            }
        }
        $this->archiveDate = self::getMonthName($from);
        $this->posts = $posts;
    }


    public function getPost(Request $request, Satellite $satellite) {
        $this->post = self::loadPost($request->get('id'), $satellite);
    }

    /**
     * @static
     * @return Post[]
     */
    public static function getRecentPosts(Satellite $satellite) {
        $posts = array();
        $max = 5;

        foreach ($satellite->get('posts') as $post) {
            if (!$max--) {
                break;
            }
            $posts[] = self::loadPost($post['fname'], $satellite);
        }
        return $posts;
    }

    /**
     * @static
     * @return String[]
     */
    public static function getArchiveMonth(Satellite $satellite) {
        $months = array();
        foreach ($satellite->get('posts') as $post) {
            $k = date("Y/m", $post['time']);
            if (!isset($months[$k])) {
                $months[$k] = self::getMonthName($post['time']);
            }
        }
        return $months;
    }

    protected static function loadPost($id, $satellite) {
        return $satellite->loadData($satellite->getPath("posts/" . $id), 'Post');
    }

    private static function getMonthName($time) {
        return str_replace(array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'), date("F Y", $time));
    }
}
