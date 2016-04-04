<?php 

namespace iia\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use iia\ApiBundle\Entity\Category;
use iia\ApiBundle\Entity\User;

class RestCategoryController extends Controller
{

  /*public function getCategoriesAction(){

    
    $category = $this->getDoctrine()->getRepository('iiaApiBundle:Category')->findAll();
    if(!is_array($category)){
      throw $this->createNotFoundException ();
    }
    return $category;
  }*/
  
  public function getCategoriesAction($id){
  
    $em = $this->getDoctrine ()->getEntityManager ();
    $categories = null;
    $query = $em->createQuery ( "SELECT c.id , c.libelle FROM iiaApiBundle:Category c JOIN c.categoryUser u WHERE u.id = :id" )
    ->setParameter(":id", $id);
    $categories = $query->getResult();
    return $categories;
  }

}