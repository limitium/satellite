<?php
class PageController {
    public $pagesMeta = null;


    public function asArray() {
        return (array)$this;
    }

    public function postPage(Request $request, Satellite $satellite) {
        $path = $satellite->getPath("pages/" . $request->get('id'));
        $this->page = new Page($path, $request->params);
        if ($satellite->getCfg('key') != $request->get('key')) {
            throw new Exception('Invalid key!');
        }
        $satellite->save($this->page);
    }

    public function getPage(Request $request, Satellite $satellite) {
        $this->page = self::loadPage($request->get('id'), $satellite);
    }

    public static function getPages(Satellite $satellite) {
        $pages = array();

        foreach ($satellite->get('pages') as $fileData) {
            $pages[$fileData['fname']] = self::loadPage($fileData['fname'], $satellite);
        }

        return $pages;
    }

    protected static function loadPage($id, $satellite) {
        return $satellite->loadData($satellite->getPath("pages/" . $id), 'Page');
    }

}
