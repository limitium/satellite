<?php

class PostController {

    public function getList(Request $request) {
        $pageDir = getPath('pages/');
        $posts = array();
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
        foreach ($sortedByDate as $post) {
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

}
