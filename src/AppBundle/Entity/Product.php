<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Product
 */
class Product
{
   
    private $images;

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
   



    public function __construct()
    {
        $this->images = new ArrayCollection();
       
    }




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


   

}
