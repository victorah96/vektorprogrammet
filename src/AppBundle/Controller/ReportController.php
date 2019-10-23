<?php

namespace AppBundle\Controller;

class ReportController extends BaseController
{
    public function listAction()
    {
        return $this->render('report/reports_public.html.twig');
    }

    public function showAction()
    {
        #TODO
        # - load reports etc etc

        return $this->render('report/reports.html.twig');
    }

    public function createAction()
    {
        #TODO
    }

    public function editAction()
    {
        #TODO
    }

    public function deleteAction()
    {
        #TODO
    }
}