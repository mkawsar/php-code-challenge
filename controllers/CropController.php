<?php

class CropController extends BaseController
{
    public function render($params)
    {
        $image = $_GET['image'];
        $this->view->image = $image;
        $this->view->pageTitle = 'Image Crop';

        if (isset($_POST['image']) && !empty($_POST['image'])) {
            $data = $_POST["image"];

            $image_array_1 = explode(";", $data);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = 'crop-' . rand(0, 100) . '-' . time() . '.png';

            file_put_contents('gallery/' . $imageName, $data);

            echo json_encode(['data' => $data]);
        }
    }
}
