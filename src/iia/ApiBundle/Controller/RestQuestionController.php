<?php

namespace iia\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use iia\ApiBundle\Entity\Question;

class RestQuestionController extends Controller {
  public function getQuestionAction($id) {
    $qcm = $this->getDoctrine ()->getRepository ( 'iiaApiBundle:Question' )->find($id);
    if (! is_object ( $qcm )) {
      throw $this->createNotFoundException ();
    }
    return $qcm;
  }
}