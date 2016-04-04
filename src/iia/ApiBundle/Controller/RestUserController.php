<?php

namespace iia\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use iia\ApiBundle\Entity\User;
use Symfony\Component\BrowserKit\Request;
use FOS\RestBundle\Controller\FOSRestController;

class RestUserController extends FOSRestController {
  
  const NAME = "username";
  const PASSWORD = "password";
  
  public function postUserAction(\Symfony\Component\HttpFoundation\Request $request) {
    
    $em = $this->getDoctrine ()->getEntityManager ();
    $return = "false";
    $user = new User ();
    $json = json_decode ( $this->getRequest ( $request )->getContent (), true );
    
    $user->setUsername ( $json ['username'] );
    $user->setPassword ( $json ['password'] );
    
    $query = $em->createQuery ( 'SELECT u FROM iiaApiBundle:User u WHERE u.username = :username AND u.password = :password' );
    $query->setParameter ( ":username", $json ['username'] );
    $query->setParameter ( ":password", $json ['password'] );
    $return = $query->getResult();

    // return $this->handleView($view);
    return $return;
  }
    /*
   * public function getUserAction($id){
   *
   * $user = $this->getDoctrine()->getRepository('iiaApiBundle:User')->find($id);
   * if(!is_object($user)){
   * throw $this->createNotFoundException ();
   * }
   *
   * return $user;
   * }
   */
}
