<?php

class PostController {

    public function getList(Request $request) {
        $pageDir = getPath('pages/');
        $posts = array();
        foreach (scandir($pageDir) as $fileId) {
            if (is_file($pageDir . $fileId)) {
                $posts[] = Post::load($fileId);
            }
        }
        $this->posts = $posts;
    }

}
