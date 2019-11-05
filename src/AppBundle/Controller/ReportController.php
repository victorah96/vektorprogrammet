<?php

namespace AppBundle\Controller;
use AppBundle\Form\Type\CreateReportType;

use AppBundle\Entity\Report;
use AppBundle\Service\ReportService;
use AppBundle\Entity\Repository\ReportRepository;

use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Department;
use AppBundle\Entity\Semester;
use Symfony\Component\HttpFoundation\JsonResponse;





class ReportController extends BaseController
{
    public function listAction() #PUBLIC
    {
        return $this->render('report/reports_public.html.twig');
    }

    public function showAction() #PRIVATE
    {
        $em = $this->getDoctrine()->getManager();
        $reportRepository = $em->getRepository('AppBundle:Report');

        // Get array of reports
        $reportList = $reportRepository->findReports();



        return $this->render('report/reports.html.twig', array(
            //'reportList' => $reportList,
        ));
    }



    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createReportAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Report');

        $report = new Report();


        $form = $this->createForm(CreateReportType::class, $report, array(
            'validation_groups' => array('create_report'),
        ));


        $form->handleRequest($request);

        if ($form->isValid()) {
            $repository->generateEntities($report, $em);
            return $this->redirectToRoute('reports_list');
        }

        return $this->render('report/create_report.html.twig', array(
            'form' => $form->createView(),
        ));


    }


    public function editAction()        # TODO
    {
    }

    public function deleteAction()      # TODO
    {
    }
}