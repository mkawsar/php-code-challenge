<?php


class HomepageController extends BaseController
{
    public function render($params)
    {
        $folder_name = 'gallery/';
        $imageArray = [];
        $files = scandir('gallery');
        if (false !== $files) {
            foreach ($files as $file) {
                if ('.' != $file && '..' != $file) {
                    $imageArray[] = $file;
                }
            }
        }

        $this->view->images = $imageArray;
        $this->view->floder = $folder_name;
        $this->view->pageTitle = "Homepage";
    }
}
