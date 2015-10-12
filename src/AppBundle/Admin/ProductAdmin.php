<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;




class ProductAdmin extends Admin
{

  
    
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {


       
            
        $formMapper         
            ->add('title',null,array('label' => 'Title'))
            ->add('price',null,array('label' => 'Cost'))
            ->add('images', 'sonata_type_collection',
                    array(
                    'cascade_validation' => false,
                    'type_options' => array('delete' => true),
                    ),
                    array(
                    'edit' => 'inline',
                    'inline' => 'table')
                )
           /* ->add('categories', 'entity',  array(          
            'class' => 'Froid\OwnerBundle\Entity\ProductCategory',
            'property' => 'titleRu',
            'multiple' => true,
            'label'=>'Категории', 
            'required'=>TRUE,    
           // 'expanded'=>true,     
           'data'=>array($productnew1,$productnew2,$productnew3,$productnew4,$productnew5,'property' => 'titleRu') 
            ))*/
            
            
           ;
    }
   
   
       public function preUpdate($product)
        {  
     
                    foreach ($product->getImages() as $t) {
                        $t->setImagesProduct($product); 
                        $t->setProduct($product);      
                        $t->lifecycleFileUpload();
                       }


        }



        public function prePersist($product)
        {
           $this->preUpdate($product);
        }

        public function preRemove($product){
               foreach ($product->getImages() as $t) {            
                         if ($t && ($webPath = $t->getWebPath())) {
                           if($webPath!==null){
                                   $fullPath = $_SERVER['DOCUMENT_ROOT'].$webPath;
                                @unlink($fullPath);
                            }
                             }
                        
                       }

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