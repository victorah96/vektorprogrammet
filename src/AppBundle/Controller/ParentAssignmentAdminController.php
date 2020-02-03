<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ParentAssignment;
use AppBundle\Entity\ParentCourse;
use AppBundle\Form\Type\ParentAssignmentType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ParentAssignmentAdminController extends BaseController
{
    public function showAction(ParentCourse $course)
    {
        return $this->render('parents/parent-assignment-admin.html.twig', array(
            'parentsAssigned' => $course->getAssignedParents(),
            'courseID' => $course->getId(),
        ));
    }

    public function createAction(Request $request, ParentCourse $course)
    {
        $parentAssigned = new ParentAssignment();
        $form = $this->createForm(ParentAssignmentType::class, $parentAssigned);
        $form->handleRequest($request);


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $parentAssigned->setCourse($course);
            $em->persist($parentAssigned);
            $em->flush();

            $this->addFlash("success", "Foreldren er påmeldt.");

            return $this->redirectToRoute('parent_assignment_admin_show', ['id' => $course->getId()]);
        }

        return $this->render('parents/parent-assignment.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function deleteAction(ParentAssignment $parentAssignment)
    {
        $parentCourseID = $parentAssignment->getCourse()->getId();
        $em = $this->getDoctrine()->getManager();
        $em->remove($parentAssignment);
        $em->flush();

        $this->addFlash("success", "\"".$parentAssignment->getNavn()."\" ble slettet");


        return $this->redirectToRoute('parent_assignment_admin_show', ['id' => $parentCourseID]);
    }

};
