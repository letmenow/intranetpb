<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Noticia;
/**
 * @Route("/")
 */
class PublicController extends Controller
{    
    private $noticias;
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $noticias = $this->getDoctrine()
                ->getRepository('AppBundle:Noticia')
                ->findAll();
       
        return $this->render('noticia/mostrar_noticia.html.twig', array('noticias'=>$noticias)
        );
    }
     /**
     * @Route("/mostrar/{id}", name="ver_noticia")
     */
    public function verNoticiaAction($id)
    {
        $noticia = $this->getDoctrine()
                ->getRepository('AppBundle:Noticia')
                ->find($id);
        return $this->render('noticia/ver_noticia.html.twig', array('noticia'=>$noticia)
        );
    }
     /**
     * @Route("/subir", name="crear_noticia")
     */
    public function formularioAction(Request $request)
    {
        $noti = new Noticia();
        $noti->setFecha(new \DateTime('now'));
        $form = $this->createFormBuilder($noti)         
            ->add('titulo', 'text')
            ->add('resumen','text')
            ->add('autor', 'text')
            ->add('contenido', 'textarea' , array(
            'attr' => array('class' => 'editor1' , 'cols' => '30', 'rows' => '5'),
             ))    
         ->add('fecha', 'date')
         ->getForm();
        $form->handleRequest($request);
//        throw new \LogicException('error'.var_dump($form->isValid()));
        if ($form->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($noti);
           $em->flush();
           return $this->redirect($this->generateUrl('home'));
        }
//         throw new \LogicException('ejecutando');   
        return $this->render('noticia/crear_noticia.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}