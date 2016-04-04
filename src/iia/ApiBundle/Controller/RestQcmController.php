<?php

namespace iia\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use iia\ApiBundle\Entity\Qcm;
use FOS\RestBundle\Controller\Annotations\View;

class RestQcmController extends Controller {
  public function getQcmAction($id) {
    $qcm = $this->getDoctrine ()->getRepository ( 'iiaApiBundle:Qcm' )->find ( $id );
    if (! is_object ( $qcm )) {
      throw $this->createNotFoundException ();
    }
    
    return $qcm;
  }
  
  /**
   * @View(serializerGroups={"list"})
   */
  /*
   * public function getListQcmAction() {
   * $qcm = $this->getDoctrine()->getRepository('iiaApiBundle:Qcm')->findAll();
   * if(!is_array($qcm)) {
   * throw $this->createNotFoundException();
   * }
   * return $qcm;
   * }
   */
  public function getListQcmAction($id) {
$qcm = $this->getDoctrine()->getManager()
		->createQueryBuilder('q')
		->select('q.id,q.libelle,q.duration,q.nbPoints,IDENTITY(q.qcmCat)AS category')
		->from('iiaApiBundle:Qcm', 'q')
		->where('q.qcmCat ='.$id)
		->getQuery()
		->getResult();
		
		return $qcm;
        
  }
}