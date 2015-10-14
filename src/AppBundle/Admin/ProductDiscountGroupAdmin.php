<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProductDiscountGroupAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title',null,array('label' => 'Title'))
            ->add('discount1',null,array('label' => 'Discount 1, %'))
            ->add('limit1',null,array('label' => 'Instock limit 1'))
            ->add('discount2',null,array('label' => 'Discount 2, %'))
            ->add('limit2',null,array('label' => 'Instock limit 2'))
            ->add('discount3',null,array('label' => 'Discount 3, %'))
            ->add('limit3',null,array('label' => 'Instock limit 3'))
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