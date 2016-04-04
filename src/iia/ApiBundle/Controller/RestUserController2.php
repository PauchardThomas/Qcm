<?php

namespace iia\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use iia\ApiBundle\Entity\User;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class RestUserController extends FOSRestController {
  const ID = "id";
  const NAME = "name";
  const FIRSTNAME = "firstname";
  
  /**
   * @Rest\Get("/users/{login}")
   * 
   * @param unknown $login          
   */
  public function getUserAction($login) {
    $user = $this->getDoctrine ()->getRepository ( 'iiaApiBundle:User' )->findOneByUsername ( $login );
    if (! is_object ( $user )) {
      echo "Hello";
      throw $this->createNotFoundException ();
    }
    return $user;
  }
  /**
   * @ApiDoc(
   * ressource=true,
   * section="Rest CRUD Service",
   * description="Get user method",
   * requirements={
   * {
   * "name"="username",
   * "dataType"="string",
   * "requirement"="",
   * "description"="The user name",
   * }
   * }
   * )
   * @Rest\Get("/users")
   */
  public function getUsersAction() {
    $users = $this->getDoctrine ()->getRepository ( 'iiaApiBundle:User' )->findAll ();
    return $users;
  }
  /**
   * @Rest\Post("/users")
   * 
   * @param unknown $request          
   */
  public function createUserAction($request) {
  }
  /**
   * @Rest\Put("/users/{id}")
   * 
   * @param unknown $request          
   */
  public function updateUserAction($id) {
    $entityManager = $this->getDoctrine ()->getManager ();
    $user = $entityManager->getRepository ( 'iiaApiBundle:User' )->find ( $id );
    $entityManager->update ( $user );
    $entityManager->flush ();
    
  }
  public function postUserAction() {
    $user = new User ();
    $json = json_decode ( $this->getRequest ()->getContent (), true );
    $this->extract ( $user, $json );
    
    $entityManager = $this->getDoctrine ()->getManager ();
    $entityManager->persist ( $user );
    $entityManager->flush (); // execute la requete.
    
    $view = $this->view ( $user, 200 ); // le serveur renvoie une réponse pour voir si tout s'est bien passé.
    return $this->handleView ( $view );
    
  }
  public function putUserAction($id) {
    $entityManager = $this->getDoctrine ()->getManager ();
    $user = $entityManager->getRepository ( 'iiaApiBundle:User' )->find ( $id );
    
    $json = json_decode ( $this->getRequest ()->getContent (), true );
    $this->extract ( $user, $json );
    
    $entityManager->persist ( $user );
    $entityManager->flush ();
    
    $view = $this->view ( $user, 200 ); // le serveur renvoie une réponse pour voir si tout s'est bien passé.
    return $this->handleView ( $view );
  }
  public function deleteUserAction($id) {
    
    $entityManager = $this->getDoctrine ()->getManager ();
    $user = $entityManager->getRepository ( 'iiaApiBundle:User' )->find ( $id );
    if (! $user) {
      throw $this->createNotFoundException ( 'Unable to find User entity.' );
    }
    $entityManager->remove ( $user );
    $entityManager->flush ();
    
    $view = $this->view ( $user, 200 ); // le serveur renvoie une réponse pour voir si tout s'est bien passé.
    return $this->handleView ( $view );
  }
  public function extract($user, $json, $entityManager = null) {
    if ($entityManager == null) {
      $entityManager = $this->getDoctrine ()->getManager ();
    }
    
    /*
     * if (array_key_exists("id", $json)) {
     * $user->setId($json["id"]);
     * }
     */
    if (array_key_exists ( RestUserController::NAME, $json )) {
      $user->setName ( $json [RestUserController::NAME] );
    }
    if (array_key_exists ( RestUserController::FIRSTNAME, $json )) {
      $user->setFirstName ( $json [RestUserController::FIRSTNAME] );
    }
    /*
     * if(array_key_exists(RestGroupController::ID,$json)) {
     * $group = $entityManager->getRepository('iiaApiBundle:Group')->find($json[RestGroupController::ID]['id']);
     * $user->setGroup($group);
     * }
     */
  }
}