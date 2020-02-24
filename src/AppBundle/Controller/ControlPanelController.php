<?php

namespace AppBundle\Controller;

use AppBundle\Service\SbsData;
use Symfony\Component\Security\Core\User\UserInterface;

class ControlPanelController extends BaseController
{
    public function showAction()
    {
        $department = $this->getDepartmentOrThrow404();
        $semester = $this->getSemesterOrThrow404();

        $admissionPeriod = $this->getDoctrine()->getRepository('AppBundle:AdmissionPeriod')
            ->findOneByDepartmentAndSemester($department, $semester);

        // Return the view to be rendered
        return $this->render('control_panel/index.html.twig', array(
            'admissionPeriod' => $admissionPeriod,
        ));
    }

    public function showSBSAction(UserInterface $user)
    {
        $sbsData = $this->get(SbsData::class);
        $currentAdmissionPeriod = $user->getDepartment()->getCurrentAdmissionPeriod();

        if ($currentAdmissionPeriod) {
            $sbsData->setAdmissionPeriod($currentAdmissionPeriod);
        }

        // Return the view to be rendered
        return $this->render('control_panel/sbs.html.twig', array(
            'data' => $sbsData,
        ));
    }
}
