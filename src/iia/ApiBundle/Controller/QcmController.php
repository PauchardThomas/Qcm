<?php

namespace iia\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use iia\ApiBundle\Entity\Qcm;
use iia\ApiBundle\Form\QcmType;

/**
 * Qcm controller.
 *
 */
class QcmController extends Controller
{

    /**
     * Lists all Qcm entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('iiaApiBundle:Qcm')->findAll();

        return $this->render('iiaApiBundle:Qcm:index.html.twig', array(
            'entities' => $entities,
        ));
        return $entities;
    }
    /**
     * Creates a new Qcm entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Qcm();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('qcm_show', array('id' => $entity->getId())));
        }

        return $this->render('iiaApiBundle:Qcm:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Qcm entity.
     *
     * @param Qcm $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Qcm $entity)
    {
        $form = $this->createForm(new QcmType(), $entity, array(
            'action' => $this->generateUrl('qcm_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Qcm entity.
     *
     */
    public function newAction()
    {
        $entity = new Qcm();
        $form   = $this->createCreateForm($entity);

        return $this->render('iiaApiBundle:Qcm:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Qcm entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('iiaApiBundle:Qcm')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Qcm entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('iiaApiBundle:Qcm:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Qcm entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('iiaApiBundle:Qcm')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Qcm entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('iiaApiBundle:Qcm:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Qcm entity.
    *
    * @param Qcm $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Qcm $entity)
    {
        $form = $this->createForm(new QcmType(), $entity, array(
            'action' => $this->generateUrl('qcm_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Qcm entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('iiaApiBundle:Qcm')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Qcm entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('qcm_edit', array('id' => $id)));
        }

        return $this->render('iiaApiBundle:Qcm:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Qcm entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('iiaApiBundle:Qcm')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Qcm entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('qcm'));
    }

    /**
     * Creates a form to delete a Qcm entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('qcm_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
