<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProductCategoryAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title',null,array('label' => 'Title'))
            ->add('parent', 'entity',  array(
            'class' => 'AppBundle\Entity\ProductCategory',
            'property' => 'title',
             'required'=>false
            ))
           ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
           ->add('title',null,array('label' => 'Title'))
    
          ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
           ->addIdentifier('title',null,array('label' => 'Title'))
     
        ;

            
    }
}