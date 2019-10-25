<?php

namespace AppBundle\Controller;
use AppBundle\Form\Type\CreateReportType;
use AppBundle\Entity\Report;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Department;
use AppBundle\Entity\Semester;
use AppBundle\Form\Type\CreateTodoItemInfoType;
use AppBundle\Model\TodoItemInfo;
use AppBundle\Entity\TodoItem;
use AppBundle\Service\TodoListService;
use Symfony\Component\HttpFoundation\JsonResponse;



class ReportController extends BaseController
{
    public function listAction() #PUBLIC
    {
        return $this->render('report/reports_public.html.twig');
    }

    public function showAction()
    {
        #TODO
        # - load reports etc etc
        return $this->render('report/reports.html.twig');
    }


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createReportAction(Request $request)
    {

        #$em = $this->getManager();
        #TODO: Service
        $Report = new Report();

        $form = $this->createForm(CreateReportType::class, $Report, array(
            'validation_groups' => array('create_report'),
        ));


        $form->handleRequest($request);

        if ($form->isValid()) {
            #$todoListService->generateEntities($itemInfo, $em);
            return $this->redirectToRoute('report_list');
        }

        return $this->render('report/create_report.html.twig', array(
            'form' => $form->createView(),
        ));



        #return $this->render('report/reports.html.twig');

    }


    public function editAction()        # TODO
    {
    }

    public function deleteAction()      # TODO
    {
    }
}