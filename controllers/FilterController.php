<?php

class FilterController extends BaseController
{
    public function render($params)
    {
        $image = file_get_contents('gallery/' . $_GET['image']);
        $this->view->image = $_GET['image'];
        $this->view->source = base64_encode($image);
        $this->view->pageTitle = "Image Filter";
        if (isset($_POST['style']) != "" && !empty($_POST['style'])) {
            $imageExt = explode('.', $_POST['image']);
            $img_source = 'gallery/' . $_POST['image'];
            $image_name = 'new-' . rand(1, 100) . '-' . $_POST['image'];
            $target_path = 'gallery/' . $image_name;
            if ($imageExt[1] == 'jpg') {
                $img = imagecreatefromjpeg($img_source);
                if ($img && imagefilter($img, IMG_FILTER_GRAYSCALE)) {
                    imagejpeg($img, $target_path);
                }
            } else {
                $img = imagecreatefrompng($img_source);
                if ($img && imagefilter($img, IMG_FILTER_GRAYSCALE)) {
                    imagepng($img, $target_path);
                }
            }

            imagedestroy($img);
        }
    }
}
