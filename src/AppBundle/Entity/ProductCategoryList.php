<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategoryList
 */
class ProductCategoryList
{
   
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Product
     */
    private $product;

    /**
     * @var \AppBundle\Entity\ProductCategory
     */
    private $category;


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
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     * @return ProductCategoryList
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\ProductCategory $category
     * @return ProductCategoryList
     */
    public function setCategory(\AppBundle\Entity\ProductCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\ProductCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
