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
use AppBundle\Service\FileUploader;


class QuickLinkController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $user = $this->getUser();
        $quickLink = new QuickLink();

        $form = $this->createForm(CreateQuickLinkType::class, $quickLink);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $quickLink->setOwner($user);
            if ($form->get('iconUrl')) {
                dump($form->get('iconUrl'));
                $imgPath = $this->get(FileUploader::class)->uploadQuicklink($request);
                $quickLink->setIconUrl($imgPath);
            }
            //For testing purposes:
            $quickLink->setOrderNum(4);
            $quickLink->setVisible(true);


            $em = $this->getDoctrine()->getManager();
            $em->persist($quickLink);
            $em->flush();

            return $this->redirect($this->generateUrl('control_panel'));
        }

        return $this->render('quicklinks/create_quicklinks.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @param QuickLink $quickLink
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(QuickLink $quickLink, Request $request){
        $user = $this->getUser();

        $form = $this->createForm(CreateQuickLinkType::class, $quickLink);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $quickLink->setOwner($user);
            if ($form->get('iconUrl')) {
                $imgPath = $this->get(FileUploader::class)->uploadQuicklink($request);
                $quickLink->setIconUrl($imgPath);
            }
            //For testing purposes:
            $quickLink->setOrderNum(4);
            $quickLink->setVisible(true);


            $em = $this->getDoctrine()->getManager();
            $em->persist($quickLink);
            $em->flush();

            return $this->redirect($this->generateUrl('control_panel'));
        }

        return $this->render('quicklinks/create_quicklinks.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function deleteAction(Request $request) {

    }

}
