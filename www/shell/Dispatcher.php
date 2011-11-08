<?php

class Dispatcher {

    public static function execute(Request $request) {
        if ($request->isPost()) {
            throw new Exception('post not allowed');
        }

        $controller = ucfirst($request->controller . 'Controller');
        $action = 'get' . ucfirst($request->action);

        $pc = new $controller();
        $pc->$action($request);

        self::printPage(View::create($request->action, (array) $pc)->render());
    }

    public function getModule($request) {
        
    }

    public static function printPage($content) {
        self::sendHeaders();
        self::sendLayout($content);
    }

    public static function sendLayout($content) {
        echo View::create('layout', array('content' => $content,
                    'recentPosts' => PostController::getRecentPosts(),
                    'archive' => PostController::getArchive()))
                ->render();
    }

    public static function sendHeaders() {
        header("Content-Type: text/html; charset=UTF-8");
    }

}