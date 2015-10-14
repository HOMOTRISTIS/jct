<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductDiscountGroup
 */
class ProductDiscountGroup
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
     * @var integer
     */
    private $limit1;

    /**
     * @var integer
     */
    private $discount1;

    /**
     * @var integer
     */
    private $limit2;

    /**
     * @var integer
     */
    private $discount2;

    /**
     * @var integer
     */
    private $limit3;

    /**
     * @var integer
     */
    private $discount3;


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
     * @return ProductDiscountGroup
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
     * Set limit1
     *
     * @param integer $limit1
     * @return ProductDiscountGroup
     */
    public function setLimit1($limit1)
    {
        $this->limit1 = $limit1;

        return $this;
    }

    /**
     * Get limit1
     *
     * @return integer 
     */
    public function getLimit1()
    {
        return $this->limit1;
    }

    /**
     * Set discount1
     *
     * @param integer $discount1
     * @return ProductDiscountGroup
     */
    public function setDiscount1($discount1)
    {
        $this->discount1 = $discount1;

        return $this;
    }

    /**
     * Get discount1
     *
     * @return integer 
     */
    public function getDiscount1()
    {
        return $this->discount1;
    }

    /**
     * Set limit2
     *
     * @param integer $limit2
     * @return ProductDiscountGroup
     */
    public function setLimit2($limit2)
    {
        $this->limit2 = $limit2;

        return $this;
    }

    /**
     * Get limit2
     *
     * @return integer 
     */
    public function getLimit2()
    {
        return $this->limit2;
    }

    /**
     * Set discount2
     *
     * @param integer $discount2
     * @return ProductDiscountGroup
     */
    public function setDiscount2($discount2)
    {
        $this->discount2 = $discount2;

        return $this;
    }

    /**
     * Get discount2
     *
     * @return integer 
     */
    public function getDiscount2()
    {
        return $this->discount2;
    }

    /**
     * Set limit3
     *
     * @param integer $limit3
     * @return ProductDiscountGroup
     */
    public function setLimit3($limit3)
    {
        $this->limit3 = $limit3;

        return $this;
    }

    /**
     * Get limit3
     *
     * @return integer 
     */
    public function getLimit3()
    {
        return $this->limit3;
    }

    /**
     * Set discount3
     *
     * @param integer $discount3
     * @return ProductDiscountGroup
     */
    public function setDiscount3($discount3)
    {
        $this->discount3 = $discount3;

        return $this;
    }

    /**
     * Get discount3
     *
     * @return integer 
     */
    public function getDiscount3()
    {
        return $this->discount3;
    }
}
