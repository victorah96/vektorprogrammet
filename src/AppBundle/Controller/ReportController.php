<?php

namespace AppBundle\Controller;

class ReportController extends BaseController
{
    public function showAction()
    {
        return $this->render('report/reports.html.twig');
    }
}