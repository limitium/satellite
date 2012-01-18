<?php

class Dispatcher {

    /**
     * @var Request
     */
    public $request;

    /**
     * @var Satellite
     */
    public $satellite;


    private function __construct() {

    }

    /**
     * @param Satellite $satellite
     * @return Dispatcher
     */
    public static function create(Satellite $satellite) {
        $dispatcher = new self;
        $dispatcher->satellite = $satellite;
        return $dispatcher;
    }

    public function execute(Request $request) {
        $this->request = $request;

        $this->controller = $this->executeController();
        return $this;
    }

    public function makeView($pc) {
        return View::create($this->satellite->getTpl($this->request->isGet() ? $this->request->action : 'post' . ucfirst($this->request->action)),
            $pc->asArray()
        )->render();
    }

    /**
     * @param $request
     * @return PostController
     */
    public function executeController() {
        $controller = ucfirst($this->request->controller . 'Controller');
        $action = strtolower($this->request->method) . ucfirst($this->request->action);

        $pc = new $controller();
        try {
            if(method_exists($pc,$action)){
            $pc->$action($this->request, $this->satellite);
            }else{
                throw new Exception('Error bro (:');
            }
        } catch (Exception $e) {
            $pc->e = $e;
        }
        return $pc;
    }

    public function printPage() {
        $this->sendHeaders();

        try {
            $response = $this->makeView($this->controller);
        } catch (Exception $e) {
            $this->controller->e = $e;
        }

        if (isset($this->controller->e) || $this->request->isGet()) {
            if (isset($this->controller->e)) {
                $response = $this->controller->e->getMessage();
            }
            $this->wrapLayout($response);
        }
        $this->sendResponse($response);
    }

    public function wrapLayout(&$content) {
        $content = View::create($this->satellite->getTpl('layout'),
            array('content' => $content,
                'recentPosts' => PostController::getRecentPosts($this->satellite),
                'archive' => PostController::getArchiveMonth($this->satellite),
                'pages' => PageController::getPages($this->satellite),
                'title' => $this->satellite->getCfg('title'),
                'keys' => $this->satellite->getCfg('keys'),
                'description' => $this->satellite->getCfg('description'),
                'about' => $this->satellite->getCfg('about')
            )
        )->render();
    }

    public function sendHeaders() {
        header("Content-Type: text/html; charset=UTF-8");
    }

    public function sendResponse($response) {
        echo $response;
    }

}