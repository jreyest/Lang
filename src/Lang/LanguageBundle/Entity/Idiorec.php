<?php

namespace Lang\LanguageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Idiorec
 */
class Idiorec
{
    /**
     * @var integer
     */
    private $id;
 
    protected $recurso; 
 
    protected $idioma; 
    /**
     * @var boolean
     */    
    private $nivEasy;   
    /**
     * @var boolean
     */    
    private $nivInt; 
    /**
     * @var boolean
     */    
    private $nivHard;   
    /**
     * @var boolean
     */    
    private $catGram;    
    /**
     * @var boolean
     */    
    private $catComEscr;    
    /**
     * @var boolean
     */    
    private $catComAud;    
    /**
     * @var boolean
     */    
    private $catPron;
    /**
     * @var boolean
     */    
    private $catExpOra;

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
     * Set nivEasy
     *
     * @param boolean $nivEasy
     * @return Idiorec
     */
    public function setNivEasy($nivEasy)
    {
        $this->nivEasy = $nivEasy;

        return $this;
    }

    /**
     * Get nivEasy
     *
     * @return boolean 
     */
    public function getNivEasy()
    {
        return $this->nivEasy;
    }

    /**
     * Set nivInt
     *
     * @param boolean $nivInt
     * @return Idiorec
     */
    public function setNivInt($nivInt)
    {
        $this->nivInt = $nivInt;

        return $this;
    }

    /**
     * Get nivInt
     *
     * @return boolean 
     */
    public function getNivInt()
    {
        return $this->nivInt;
    }

    /**
     * Set nivHard
     *
     * @param boolean $nivHard
     * @return Idiorec
     */
    public function setNivHard($nivHard)
    {
        $this->nivHard = $nivHard;

        return $this;
    }

    /**
     * Get nivHard
     *
     * @return boolean 
     */
    public function getNivHard()
    {
        return $this->nivHard;
    }

    /**
     * Set catGram
     *
     * @param boolean $catGram
     * @return Idiorec
     */
    public function setCatGram($catGram)
    {
        $this->catGram = $catGram;

        return $this;
    }

    /**
     * Get catGram
     *
     * @return boolean 
     */
    public function getCatGram()
    {
        return $this->catGram;
    }

    /**
     * Set catComEscr
     *
     * @param boolean $catComEscr
     * @return Idiorec
     */
    public function setCatComEscr($catComEscr)
    {
        $this->catComEscr = $catComEscr;

        return $this;
    }

    /**
     * Get catComEscr
     *
     * @return boolean 
     */
    public function getCatComEscr()
    {
        return $this->catComEscr;
    }

    /**
     * Set catComAud
     *
     * @param boolean $catComAud
     * @return Idiorec
     */
    public function setCatComAud($catComAud)
    {
        $this->catComAud = $catComAud;

        return $this;
    }

    /**
     * Get catComAud
     *
     * @return boolean 
     */
    public function getCatComAud()
    {
        return $this->catComAud;
    }

    /**
     * Set catPron
     *
     * @param boolean $catPron
     * @return Idiorec
     */
    public function setCatPron($catPron)
    {
        $this->catPron = $catPron;

        return $this;
    }

    /**
     * Get catPron
     *
     * @return boolean 
     */
    public function getCatPron()
    {
        return $this->catPron;
    }

    /**
     * Set catExpOra
     *
     * @param boolean $catExpOra
     * @return Idiorec
     */
    public function setCatExpOra($catExpOra)
    {
        $this->catExpOra = $catExpOra;

        return $this;
    }

    /**
     * Get catExpOra
     *
     * @return boolean 
     */
    public function getCatExpOra()
    {
        return $this->catExpOra;
    }

    /**
     * Set recurso
     *
     * @param \Lang\LanguageBundle\Entity\Recurso $recurso
     * @return Idiorec
     */
    public function setRecurso(\Lang\LanguageBundle\Entity\Recurso $recurso)
    {
        $this->recurso = $recurso;

        return $this;
    }

    /**
     * Get recurso
     *
     * @return \Lang\LanguageBundle\Entity\Recurso 
     */
    public function getRecurso()
    {
        return $this->recurso;
    }

    /**
     * Set idioma
     *
     * @param \Lang\LanguageBundle\Entity\Idioma $idioma
     * @return Idiorec
     */
    public function setIdioma(\Lang\LanguageBundle\Entity\Idioma $idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get idioma
     *
     * @return \Lang\LanguageBundle\Entity\Idioma 
     */
    public function getIdioma()
    {
        return $this->idioma;
    }
    public function __toString()
    {
        return (string)$this->idioma;
    }
}