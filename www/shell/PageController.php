<?php
class PageController {
    public $pagesMeta = null;


    public function asArray() {
        return (array)$this;
    }

    public function getPage(Request $request, Satellite $satellite) {
        $this->page= self::loadPage($request->get('id'), $satellite);
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
