<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Sugerencia;
/**
 * @Route("/crear")
 */

class SugerenciaController extends Controller{
    private $sugerencias;
    
    /**
     * @Route("/", name="crear_sugerencia")
     */
    public function formularioAction(Request $request)
    {
        $suge = new Sugerencia();
        $suge->setFecha(new \DateTime('now'));
        $form = $this->createFormBuilder($suge)         
            ->add('titulo', 'text')
            ->add('autor', 'text')
            ->add('contenido', 'textarea' , array(
            'attr' => array('class' => 'editor1','cols' => '36', 'rows' => '8'),
             ))    
         ->add('fecha', 'date')
            ->getForm();
        
        $form->handleRequest($request);
        if ($form->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($suge);
           $em->flush();
 
           return $this->redirect($this->generateUrl('home'));
        }
//         throw new \LogicException('ejecutando');   
        
        return $this->render('sugerencia/crear_sugerencia.html.twig', array(
            'form' => $form->createView(),
        ));
 
    }
    
     /**
     * @Route("/mostrar/", name="mostrar_sugerencia")
     */
    public function mostrarAction()
    {
        $sugerencias = $this->getDoctrine()
                ->getRepository('AppBundle:Sugerencia')
                ->findAll();
       
        return $this->render('sugerencia/ver_sugerencia.html.twig', array('sugerencias'=>$sugerencias)
        );
    }
   
}
