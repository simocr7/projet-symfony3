<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace laabi\appartooBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use laabi\appartooBundle\Entity\Insecte;
use laabi\appartooBundle\Form\InsecteType;







/**
 * Description of MVCController
 *
 * @author Laabi
 */
class MVCController extends Controller{
        public function adminAction(){
                                       if (FALSE === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                                                      return $this->redirectToRoute('addInsecte');
                                                                                                                            }
                                        else {
                                              return $this->render('laabiappartooBundle:MVCViews:affichez.html.twig');
                                             }
                                   }
                                   
       public function helloAction(){
                                              return $this->render('laabiappartooBundle:MVCViews:hello.html.twig');

                                    }
                                      
        public function affichezAction(){
                                            $em=$this->getDoctrine()->getManager();
                                            $insecte=$em->getRepository("laabiappartooBundle:Insecte")->findAll();
                                            return $this->render('laabiappartooBundle:MVCViews:affichez.html.twig',array('insecte'=>$insecte));
                                         

                                    }
        
                public function deleteInsecteAction(Request $req,$id){
                                            $em=$this->getDoctrine()->getManager();
                                            $insecte=$em->getRepository("laabiappartooBundle:Insecte")->find($id);
                                            $form=$this->createForm(InsecteType::class,$insecte);
                                            if($req->getMethod()== 'POST'){
                                            $form->handleRequest($req);
                                            if($form->isValid()){
                                                                  $em->remove($insecte);
                                                                  $em->flush();
                                                                   return $this->redirect($this->generateUrl('hello'));
                                                                 }
                                               }
                                          return $this->render('laabiappartooBundle:MVCViews:deleteInsecte.html.twig',array('form'=>$form->createView(),'insecte'=>$insecte));
                                         }       
                                         
                public function addInsecteAction(Request $req){
                      if (FALSE === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                              return $this->redirectToRoute('fos_user_security_login');
                        }
                       
                                            $insecte=new Insecte;  
                                            $form=$this->createForm(InsecteType::class,$insecte);
                                            if($req->getMethod()== 'POST'){
                                            $form->handleRequest($req);
                                            if($form->isValid()){
                                                                  $em=$this->getDoctrine()->getManager();
                                                                  $em->persist($insecte);
                                                                  $em->flush();
                                                                  return $this->redirect($this->generateUrl('hello'));
                                                                 }
                                            
                                                                 }
                                          return $this->render('laabiappartooBundle:MVCViews:addInsecte.html.twig',array('form'=>$form->createView()));
                                        }
                                        
                public function updateInsecteAction(Request $req,$id){
                                            $em=$this->getDoctrine()->getManager();
                                            $insecte=$em->getRepository("laabiappartooBundle:Insecte")->find($id);
                                            $form=$this->createForm(InsecteType::class,$insecte);
                                            if($req->getMethod()== 'POST'){
                                            $form->handleRequest($req);
                                            if($form->isValid()){
                                                                  $em->merge($insecte);
                                                                  $em->flush();
                                                                   return $this->redirect($this->generateUrl('hello'));
                                                                 }
                                               }
                                          return $this->render('laabiappartooBundle:MVCViews:updateInsecte.html.twig',array('form'=>$form->createView(),'insecte'=>$insecte));
                                      }      
                                      
                public function listezAction(){
                                            $user = $this->get('security.token_storage')->getToken()->getUser();
                                            $em=$this->getDoctrine()->getManager();
                                            $insecte=$em->getRepository("laabiappartooBundle:Insecte")->findBy(array('user'=> $user));
                                            return $this->render('simoprojetBundle:MVCViews:listez.html.twig',array('insecte'=>$insecte));
        }
}
