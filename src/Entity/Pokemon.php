<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

class Pokemon {
    
    private int $id;

    #[Assert\NotBlank(message:"Le numéro est obligatoire !")]
    private int $number;

    /**
     * @Assert\NotBlank(message="Le nom est obligatoire !")
     * @Assert\Length(
     *      min = 3,
     *      max = 30,
     *      minMessage = "Le nom est trop court",
     *      maxMessage = "Le nom est trop long"
     * )
     */
    private string $name;

    private string $area;
    private string $image;
    private string $shout;
    private string $type1;
    private string $type2;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */ 
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of area
     */ 
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set the value of area
     *
     * @return  self
     */ 
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of shout
     */ 
    public function getShout()
    {
        return $this->shout;
    }

    /**
     * Set the value of shout
     *
     * @return  self
     */ 
    public function setShout($shout)
    {
        $this->shout = $shout;

        return $this;
    }

    /**
     * Get the value of type1
     */ 
    public function getType1()
    {
        return $this->type1;
    }

    /**
     * Set the value of type1
     *
     * @return  self
     */ 
    public function setType1($type1)
    {
        $this->type1 = $type1;

        return $this;
    }

    /**
     * Get the value of type2
     */ 
    public function getType2()
    {
        return $this->type2;
    }

    /**
     * Set the value of type2
     *
     * @return  self
     */ 
    public function setType2($type2)
    {
        $this->type2 = $type2;

        return $this;
    }
}