<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProductImageListAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('src',null,array('label' => 'Source'))

           /* ->add('parent', 'entity',  array(
            'class' => 'AppBundle\Entity\Product',
            'property' => 'id',
             'required'=>false
            ))*/
           ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
           ->add('src',null,array('label' => 'Title'))
    
          ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
           ->addIdentifier('src',null,array('label' => 'Title'))
     
        ;

            
    }
}