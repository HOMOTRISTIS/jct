<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Product
 */
class Product
{
   
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var float
     */
    private $price;

    /**
     * @var integer
     */
    private $inStock;

    /**
     * @var integer
     */
    private $discount;


     protected $categories;

     private $images;


     public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->categories = new ArrayCollection();
       
    }


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
     * @return Product
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
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set inStock
     *
     * @param integer $inStock
     * @return Product
     */
    public function setInStock($inStock)
    {
        $this->inStock = $inStock;

        return $this;
    }

    /**
     * Get inStock
     *
     * @return integer 
     */
    public function getInStock()
    {
        return $this->inStock;
    }

    
    public function __toString() {
    return (string)$this->id;
    }



      public function getCategories()
    {

        return $this->categories;
    }

     /**
     * Set company
     *
     * @param \AppBundle\Entity\ProductCategoryList $categories
     * 
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this->categories;
    }
   


     /**
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * {@inheritdoc}
     */
    public function setImages($images)
    {
        $this->images = new ArrayCollection();

        foreach ($images as $image) {
            $this->addImages($image);
        }
    }



    /**
     * {@inheritdoc}
     */
    public function addImages(\AppBundle\Entity\ProductImageList $image)
    {
        $this->images[] = $image;

        $image->setProduct($this);     
    }
   

    /**
     * Set discount
     *
     * @param \AppBundle\Entity\ProductDiscountGroup $company
     * @return discount
     */
    public function setDiscount(\AppBundle\Entity\ProductDiscountGroup $discount = null)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return \AppBundle\Entity\ProductDiscountGroup
     */
    public function getDiscount()
    {
        return $this->discount;
    }

}
