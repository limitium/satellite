<?php

class Dispatcher {

    /**
     * @var Request
     */
    public $request;
    public $cfg;

    private function __construct() {

    }

    /**
     * @param Array $cfg
     * @return Dispatcher
     */
    public static function create($cfg) {
        $dispatcher = new self;
        $dispatcher->cfg = $cfg;
        return $dispatcher;
    }

    public function execute(Request $request) {
        $this->request = $request;

        try {
            $view = $this->makeView($this->executeController($request));
        } catch (Exception $e) {
            $view = $e->getMessage();
        }

        $this->printPage($view);
    }

    public function makeView($pc) {
        return View::create($this->request->action, $pc->asArray())->render();
    }

    /**
     * @param $request
     * @return PostController
     */
    public function executeController($request) {
        $controller = ucfirst($request->controller . 'Controller');
        $action = 'get' . ucfirst($request->action);

        $pc = new $controller();
        $pc->$action($request, $this);
        return $pc;
    }

    public function printPage($content) {
        $this->sendHeaders();
        $this->sendLayout($content);
    }

    public function sendLayout($content) {
        echo View::create('layout', array('content' => $content, 'recentPosts' => PostController::getRecentPosts(),
                                         'archive' => PostController::getArchiveMonth(), 'pages' => $this->cfg['pages'],
                                         'title' => $this->cfg['title'], 'about' => $this->cfg['about']))->render();
    }

    public function sendHeaders() {
        header("Content-Type: text/html; charset=UTF-8");
    }

}