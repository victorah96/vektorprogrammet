<?php

namespace AppBundle\Tests\Entity;

use AppBundle\Entity\ImageGallery;
use AppBundle\Entity\Image;
use Doctrine\Common\Collections\ArrayCollection;

class ImageGalleryEntityUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testSetImages()
    {
        $images = new ArrayCollection([new Image(), new Image()]);
        $imageGallery = new ImageGallery();
        $imageGallery->setImages($images);

        $this->assertEquals($images, $imageGallery->getImages());
    }

    public function testAddImage()
    {
        $image = new Image();
        $imageGallery = new ImageGallery();
        $imageGallery->addImage($image);

        $this->assertEquals($image->getGallery(), $imageGallery);
    }

    public function testSetTitle()
    {
        $imageGallery = new ImageGallery();
        $title = 'Test title';
        $imageGallery->setTitle($title);

        $this->assertEquals($title, $imageGallery->getTitle());
    }

    public function testSetReferenceName()
    {
        $imageGallery = new ImageGallery();
        $referenceName = 'team';
        $imageGallery->setReferenceName($referenceName);

        $this->assertEquals($referenceName, $imageGallery->getReferenceName());
    }

    public function testSetDescription()
    {
        $imageGallery = new ImageGallery();
        $description = 'Bilder til bruk i karusell på teamside';
        $imageGallery->setDescription($description);

        $this->assertEquals($description, $imageGallery->getDescription());
    }
}