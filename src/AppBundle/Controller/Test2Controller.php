<?php

namespace AppBundle\Controller;

class Test2Controller extends BaseController

{
    public function showAction()
    {
        return $this->render("test/test2.html.twig");
    }
}