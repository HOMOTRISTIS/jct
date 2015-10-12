<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * ProductImageList
 */
class ProductImageList
{

          /**
     * Unmapped property to handle file uploads
     */
    private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {

       
        return $this->file;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload()
    {

    $path = $_SERVER['DOCUMENT_ROOT'].'/web/files/products';

   
    if (file_exists($path )) {
  
    } else {

        mkdir($path, 0700,true);
     
    }

        // the file property can be empty if the field is not required

        if (null === $this->getFile()) {
            return;
        }

        $this->getFile()->move(
            $path,
            $this->getFile()->getClientOriginalName()
        );
    
        // set the path property to the filename where you've saved the file    
      

        $this->src = $this->getFile()->getClientOriginalName();

   
        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }

    /**
     * Lifecycle callback to upload the file to the server
     */
    public function lifecycleFileUpload() { 
             
        $this->upload();
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
    public function refreshUpdated() {

       // $this->setUpdateDate(new \DateTime("now"));
    }


     public function getWebPath(){
        if($this->getSrc()){
        return '/web/files/products/'.$this->getSrc();
        }else{
         return NULL;   
        }
    }

     
     /**
     * @var integer
     */
     protected $imagesProduct;

     /**
     * Set imagesProduct
     *
     * @param \AppBundle\Entity\Product $imagesProduct
     * @return imagesProduct
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
