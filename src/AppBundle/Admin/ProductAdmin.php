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
       
        $p = $this->getSubject();

        global $kernel;

        if ( 'AppCache' == get_class($kernel) )
        {
           $kernel = $kernel->getKernel();
        }
         $em = $kernel->getContainer()->get( 'doctrine.orm.entity_manager' );

         $repo_product = $em->getRepository('AppBundle:ProductCategoryList');

         $product_cats = $repo_product->findBy(array('product' => $p->getId()));      

         $cats_array = array();

         foreach($product_cats as $p){
           $cats_array[]=$p->getCategory()->getId();  
         }    

         $repo =  $em->getRepository('AppBundle:ProductCategory');

         $product = $repo->findById($cats_array);

         $sumarr = array();

         if(!empty($product)){
          foreach($product as $p){
                $sumarr[] =  $p;   
           } 
          }

           $sumarr['property']='title';

           $formMapper         
            ->add('title',null,array('label' => 'Title'))
            ->add('price',null,array('label' => 'Cost','required'=>true))
            ->add('inStock',null,array('label' => 'In stock','required'=>true))
            ->add('discount', 'entity',  array(
            'class' => 'AppBundle\Entity\ProductDiscountGroup',
            'property' => 'title',
             'required'=>false,
             'label'=>'Discount group'
            ))
            ->add('images', 'sonata_type_collection',
                    array(
                    'cascade_validation' => false,
                    'type_options' => array('delete' => true),
                    ),
                    array(
                    'edit' => 'inline',
                    'inline' => 'table')
                )
          
            ->add('categories', 'entity',  array(          
            'class' => 'AppBundle\Entity\ProductCategory',
            'property' => 'title',
            'multiple' => true,
            'label'=>'Categories', 
            'required'=>TRUE,    
            'expanded'=>true,     
            'data'=>$sumarr
            ))
            
            
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
           ->add('price',null, array('label' => 'Cost'))
          
          ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title',null,array('label' => 'Title'))
            ->add('price',null, array('label' => 'Cost'))
        ;

            
    }

      public function postPersist($p)
    {

           if(!empty($p->getId())){
           $category_inctance = new \AppBundle\Entity\ProductCategory;
           $category_inctance->setCategories($p,$p);
           }
         

    }
    
     public function postUpdate($p)
    {

           if(!empty($p->getId())){
           $category_inctance = new \AppBundle\Entity\ProductCategory;
           $category_inctance->setCategories($p,$p);
          }
         

    }

}