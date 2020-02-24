<?php


namespace AppBundle\Controller;


use AppBundle\AppBundle;
use AppBundle\Form\Type\CubeType;
use AppBundle\Entity\Cube;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloWorldController extends Controller
{
    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cubes = $em->getRepository('AppBundle:Cube')->findAll();

        $myVariable = "myString";
        return $this->render('Cube/helloWorld.html.twig', array(
            'imported' => $myVariable,
            'kubene' => $cubes

        ));
    }


    public function createAction(Request $request)
    {

        $cube = new Cube();

        $form = $form = $this->createForm(CubeType::class, $cube
        );

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cube);
            $em->flush();
            return $this->redirect('/hello_world');

        }

        return $this->render('Cube/create_cube.html.twig', array(
            'form' => $form->createView(),
            'create_or_update_title' => 'Endre eksisterende gjøremål',
        ));

    }

}