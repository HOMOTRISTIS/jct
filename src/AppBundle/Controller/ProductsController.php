<?php

namespace AppBundle\Controller;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;

class ProductsController
{

     /**
     *
     * it generates so the route GET .../products/{id}
     */

    public function getProductAction($id)
    {

        global $kernel;

        if ( 'AppCache' == get_class($kernel) )
        {
           $kernel = $kernel->getKernel();

        }
         $em = $kernel->getContainer()->get( 'doctrine.orm.entity_manager' );

         $repop =  $em->getRepository('AppBundle:Product');

         $product = $repop->find($id);
 
         if(!empty($product)){
              $repoc =  $em->getRepository('AppBundle:ProductCategoryList');

              $cats = $repoc->findBy(array('product' => $id));
        
              if(!empty($cats)){
                  $catsarray = array();

                  foreach($cats as $c){

                    $repocatssingle =  $em->getRepository('AppBundle:ProductCategory');

                    $cat = $repocatssingle->find($c->getCategory());

                   $catsarray[] =  array('id'=>$cat->getId(),'title'=>$cat->getTitle()); 
                  }
                  $cats = $catsarray;
              
              }

             return array('product' => $product,'categories'=>$cats);

         }else{
             return array('error'=>'Not isset product with id!');
         }

    }

}