<?php


namespace AppBundle\Controller;


use AppBundle\Entity\BloggInnlegg;
use AppBundle\Form\Type\BloggInnleggType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BloggController extends Controller
{
    public function showAction(){
        $em = $this->getDoctrine()->getManager();
        $bloggInnlegg = $em->getRepository('AppBundle:BloggInnlegg')->findAll();

        return $this->render('Blogg/blogg.html.twig', array(
            'bloggInnleggene' => $bloggInnlegg

        ));

    }

    public function createAction(Request $request){

        $bloggInnlegg = new BloggInnlegg();

        $form = $form = $this->createForm(BloggInnleggType::class, $bloggInnlegg
        );

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bloggInnlegg);
            $em->flush();
            return $this->redirect('/blogg');

        }

        return $this->render('Blogg/nyttBloggInnlegg.html.twig', array(
            'form' => $form->createView(),
        ));
    }



    public function deleteAction(BloggInnlegg $blogginnlegg) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($blogginnlegg);
        $em->flush();
        return $this->redirect('\blogg');
    }

}