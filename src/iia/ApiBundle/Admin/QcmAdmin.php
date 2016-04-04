<?php 

namespace iia\ApiBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class QcmAdmin extends Admin
{
  // setup the default sort column and order
  protected $datagridValues = array(
      '_sort_order' => 'ASC',
      '_sort_by' => 'libelle'
  );
  
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
    ->add('libelle')
    ->add('datePubli')
    ->add('dateFin')
    ->add('nbPoints')
    ->add('qcmCat')
    
    ;
  }
  
  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
    ->add('libelle')
    ->add('datePubli')
    ->add('dateFin')
    ->add('nbPoints')
    ->add('qcmCat')
    ;
  }
  
  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
    ->addIdentifier('libelle')
    ->add('datePubli')
    ->add('dateFin')
    ->add('nbPoints')
    ->add('qcmCat')
    ;
  }
}