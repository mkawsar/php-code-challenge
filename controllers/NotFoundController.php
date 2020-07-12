<?php

class NotFoundController extends BaseController
{
    public function render($params)
    {
        $this->view->pageTitle = "404";
        $this->view->whatHappened = "Not Found";
        $this->view->isRegistrationError = isset($_GET["error"]);
    }
}
