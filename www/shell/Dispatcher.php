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

        self::printPage($request, View::create($request->action, (array) $pc)->render());
    }

    public function getModule($request) {
        
    }

    public static function printPage($request, $content) {
        self::sendHeaders();
        self::sendLayout($request, $content);
    }

    public static function sendLayout($request, $content) {
        echo View::create('layout', array('content' => $content,
                    'recentPosts' => PostController::getRecentPosts(),
                    'archive' => PostController::getArchiveMonth(),
                    'pages' => $request->cfg['pages'],
                    'about' => $request->cfg['about']))
                ->render();
    }

    public static function sendHeaders() {
        header("Content-Type: text/html; charset=UTF-8");
    }

}