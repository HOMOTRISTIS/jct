<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductImageList
 */
class ProductImageList
{

     
   

     /**
     * Set imagesProduct
     *
     * @param \AppBundle\Entity\Product $imagesProduct
     * @return TestsItem
     */
    public function setImagesProduct(\AppBundle\Entity\Product $imagesProduct= null)
    {
        $this->imagesProduct = $imagesProduct;

        return $this;
    }

    
    /**
     * Get imagesProduct
     *
     * @return \AppBundle\Entity\Product
     */
    public function getImagesProduct()
    {
        return $this->imagesProduct;
    }



    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $src;

    /**
     * @var \AppBundle\Entity\Product
     */
    private $product;


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
     * Set src
     *
     * @param string $src
     * @return ProductImageList
     */
    public function setSrc($src)
    {
        $this->src = $src;

        return $this;
    }

    /**
     * Get src
     *
     * @return string 
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     * @return ProductImageList
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
}
