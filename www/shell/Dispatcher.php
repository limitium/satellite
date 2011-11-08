<?php

class Dispatcher {

    public static function execute(Request $request) {
        $pc = new PostController();
        $pc->getList($request);
        self::printPage(View::create('list', (array) $pc)->render());
    }

    public function getModule($request) {
        
    }

    public static function printPage($content) {
        self::sendHeaders();
        self::sendLayout($content);
        
    }

    public static function sendLayout($content) {
        echo View::create('layout', array('content' => $content))->render();
    }
    public static function sendHeaders() {
        header("Content-Type: text/html; charset=UTF-8");
    }

}