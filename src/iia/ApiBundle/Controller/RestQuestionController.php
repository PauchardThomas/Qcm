<?php

namespace iia\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use iia\ApiBundle\Entity\Question;
use iia\ApiBundle\Entity\User_qcm;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Assetic\Exception\Exception;

class RestQuestionController extends Controller {
  
  public function getQuestionAction($id) {
    $qcm = $this->getDoctrine ()->getRepository ( 'iiaApiBundle:Question' )->find($id);
    if (! is_object ( $qcm )) {
      throw $this->createNotFoundException ();
    }
    return $qcm;
  }
  
  public function postQuestionsAction(\Symfony\Component\HttpFoundation\Request $request) {
  
    $em = $this->getDoctrine ()->getEntityManager ();
    $return = "false";
    $json = json_decode ( $this->getRequest ( $request )->getContent () );
  
    // Qcm id :
    $qcm_id = $json[0]->id_qcm;
    
    //User id :
    //$user_id = $json[0]->id_user;
    $user_id = 5;
    $qcm_points = null;
    //Qcm nb points
    $query = $em->createQuery ( 'SELECT q.nbPoints FROM iiaApiBundle:Qcm q WHERE q.id = :id' );
    $query->setParameter ( ":id", $qcm_id );
    $qcm_points = $query->getResult();
    
    $score = 0;
    $proposal_id = null;
    // Proposal id :
    foreach($json as $value) {
      $proposal_id = $value->id_proposal;
      $query = $em->createQuery ( 'SELECT p.isAnswer FROM iiaApiBundle:Proposal p WHERE p.id = :id' );
      $query->setParameter ( ":id", $proposal_id );
      $isAnswer = $query->getResult();
      
      if(intval($isAnswer[0]["isAnswer"]) == 1) {
        $score++;
      }
    }
    
    $file = "C:/xampp/htdocs/Qcm2/lefichier.txt";
    file_put_contents($file,"hello");
    file_put_contents($file,"score : ".$score);
    
    $entityManager = $this->getDoctrine ()->getManager ();
    //get user by id
    $myuser = $entityManager->getRepository ( 'iiaApiBundle:User' )->findByid( $user_id );
    // get qcm by id
    $myqcm = $entityManager->getRepository ( 'iiaApiBundle:Qcm' )->findByid( $qcm_id );
    // insert score
    try {
    $userQcm = new User_qcm();
    $userQcm->setUserId($myuser[0]);
    $userQcm->setQcmId($myqcm[0]);
    $userQcm->setResult($score);
    $em->persist($userQcm);
    $em->flush();
    } catch(Exception $e) {
      return "Les réponses ont déjà été envoyées";
    }
    
    
     
    //return $myqcm[0]->getId();
    return "Réponses enregistrées";
   //return $qcm_points[0]["nbPoints"];
  }
}