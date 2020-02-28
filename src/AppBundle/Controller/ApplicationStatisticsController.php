<?php

namespace AppBundle\Controller;

use AppBundle\Service\ApplicationData;
use AppBundle\Service\AssistantHistoryData;
use Symfony\Component\HttpFoundation\Response;

class ApplicationStatisticsController extends BaseController
{
    /**
     * @return Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function showAction()
    {
        $department = $this->getDepartmentOrThrow404();
        $semester = $this->getSemesterOrThrow404();
        $admissionPeriod = $this->getDoctrine()
            ->getRepository('AppBundle:AdmissionPeriod')
            ->findOneByDepartmentAndSemester($department, $semester);

        $assistantHistoryData = $this->get(AssistantHistoryData::class);
        $assistantHistoryData->setSemester($semester)->setDepartment($department);

        $applicationData = $this->get(ApplicationData::class);
        if ($admissionPeriod !== null) {
            $applicationData->setAdmissionPeriod($admissionPeriod);
        }

        return $this->render('statistics/statistics.html.twig', array(
            'applicationData' => $applicationData,
            'assistantHistoryData' => $assistantHistoryData,
            'semester' => $semester,
            'department' => $department,
        ));
    }
}
