<?php

class UploadController extends BaseController
{
    public function render($param)
    {
        $this->view->pageTitle = "Image Upload";
        $folder_name = 'gallery/';

        if (!empty($_FILES)) {
            $temp_file = $_FILES['file']['tmp_name'];
            $location = $folder_name . $_FILES['file']['name'];
            move_uploaded_file($temp_file, $location);
        }

        if (isset($_POST["name"])) {
            $filename = $folder_name . $_POST["name"];
            unlink($filename);
        }

        $result = array();

        $files = scandir('gallery');

        $output = '<div class="row">';

        if (false !== $files) {
            foreach ($files as $file) {
                if ('.' != $file && '..' != $file && $file != '.gitignore') {
                    $output .= '
                               <div class="col-md-2">
                                <img src="' . $folder_name . $file . '" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                                <button type="button" class="btn btn-link remove_image" id="' . $file . '">Remove</button>
                               </div>
                           ';
                }
            }
        }
        $output .= '</div>';
        echo $output;

    }
}
