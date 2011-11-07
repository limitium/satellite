<?php

class Dispatcher {

    public static function execute(Request $request) {
        echo View::create('list')->render();
    }

    public function getModule($request) {
        
    }

}