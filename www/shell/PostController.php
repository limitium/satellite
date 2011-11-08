<?php

class PostController {

    public function getList(Request $request) {
        $pageDir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR;
        $posts = array();
        foreach (scandir($pageDir) as $fileId) {
            if (is_file($pageDir . $fileId)) {
                $posts[] = Post::load($fileId);
            }
        }
        $this->posts = $posts;
    }

}
