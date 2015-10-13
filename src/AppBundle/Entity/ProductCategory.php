<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategory
 */
class ProductCategory
{

    private $categories;

     /**
     * @var integer
     */
    private $pid;


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \AppBundle\Entity\ProductCategory
     */
    private $parent;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return ProductCategory
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set parent
     *
     * @param \AppBundle\Entity\ProductCategory $parent
     * @return ProductCategory
     */
    public function setParent(\AppBundle\Entity\ProductCategory $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \AppBundle\Entity\ProductCategory 
     */
    public function getParent()
    {
        return $this->parent;
    }



     /**
     * {@inheritdoc}
     */
    public function setCategories($categories,$pid)
    {

        $categories = $categories->getCategories();
            
        global $kernel;

        if ( 'AppCache' == get_class($kernel) )
        {
           $kernel = $kernel->getKernel();
        }
         $em = $kernel->getContainer()->get( 'doctrine.orm.entity_manager' );

         $repo =  $em->getRepository('AppBundle:ProductCategoryList');

         $product = $repo->findBy(array('product' => $pid->getId()));

       if(!empty($product)){
       foreach($product as $p){
            $em->remove($p);
            $em->flush();
       } 
        }

                 
        foreach ($categories as $category) {    
            $this->addCategories($category,$pid);
        }

    }


    /**
     * {@inheritdoc}
     */
    public function addCategories($category,$pid)
    {
      
      $new_category_list_record = new \AppBundle\Entity\ProductCategoryList;

      $new_category_list_record->setCategory($category);

      $new_category_list_record->setProduct($pid);

         global $kernel;

        if ( 'AppCache' == get_class($kernel) )
        {
           $kernel = $kernel->getKernel();
        }
         $em = $kernel->getContainer()->get( 'doctrine.orm.entity_manager' );

       if(is_object($new_category_list_record)){

        $em->persist($new_category_list_record);

        $em->flush();
       }
    }

}
