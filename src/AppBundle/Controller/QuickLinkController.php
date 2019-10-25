<?php
/**
 * Created by IntelliJ IDEA.
 * User: victoria
 * Date: 25.10.19
 * Time: 17:45
 */

namespace AppBundle\Controller;


use AppBundle\Entity\QuickLink;
use AppBundle\Form\Type\CreateQuickLinkType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class QuickLinkController extends Controller
{
    public function createAction(Request $request)
    {
        $user = $this->getUser();
        $quickLink = new QuickLink();

        $form = $this->createForm(CreateQuickLinkType::class, $quickLink);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quickLink);
            $em->flush();

            return $this->redirect($this->generateUrl('control_panel'));
        }

        return $this->render('quicklinks/create_quicklinks.twig', array(
            'form' => $form->createView(),
        ));
    }

}
