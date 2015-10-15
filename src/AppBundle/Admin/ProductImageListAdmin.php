<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProductImageListAdmin extends Admin
{
     

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        // get the current Image instance
        $image = $this->getSubject();
        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions = array('required' => false,'by_reference' => false, 
        'data_class' => 'Symfony\Component\HttpFoundation\File\UploadedFile');

        if ($image && ($webPath = $image->getWebPath()) ) {
            if($webPath!==null){          
            // get the container so the full path to the image can be set
           if($_SERVER['SERVER_NAME']=='localhost'){
               $fullPath = $_SERVER["HTTP_HOST"].$webPath;
           }else{
               $fullPath = $_SERVER['SERVER_NAME'].$webPath;
           }  
            // add a 'help' option containing the preview's img tag
           $fileFieldOptions['sonata_help'] = '<img width="100px" src="'.$webPath.'" class="admin-preview" />';
          
            }
        }
    
        $formMapper
            ->add('imagesProduct','hidden',array('attr'=>array("hidden" => true)))
            ->add('file','file', $fileFieldOptions)
           
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

     function preRemove($image){
        $image = $this->getSubject();
         if ($image && ($webPath = $image->getWebPath())) {
           if($webPath!==null){
                   $fullPath = $_SERVER['DOCUMENT_ROOT'].$webPath;
                @unlink($fullPath);
            }
         }
     }

    

}