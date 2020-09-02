<?php

namespace AppBundle\Controller;

class TestController extends BaseController

{
    public function showAction()
    {
        return $this->render("test/test.html.twig");
    }
}