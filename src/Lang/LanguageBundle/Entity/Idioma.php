<?php

namespace Lang\LanguageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Idioma
 */
class Idioma
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $idiomaName;
    /**
     * @var string
     */
    private $idiomaSeo;
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $herramientas;
     /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $idiorecs; 
    
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
     * Set idiomaName
     *
     * @param string $idiomaName
     * @return Idioma
     */
    public function setIdiomaName($idiomaName)
    {
        $this->idiomaName = $idiomaName;

        return $this;
    }

    /**
     * Get idiomaName
     *
     * @return string 
     */
    public function getIdiomaName()
    {
        return $this->idiomaName;
    } 
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->herramientas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idiorecs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set idiomaSeo
     *
     * @param string $idiomaSeo
     * @return Idioma
     */
    public function setIdiomaSeo($idiomaSeo)
    {
        $this->idiomaSeo = $idiomaSeo;

        return $this;
    }

    /**
     * Get idiomaSeo
     *
     * @return string 
     */
    public function getIdiomaSeo()
    {
        return $this->idiomaSeo;
    }

    /**
     * Add herramienta
     *
     * @param \Lang\LanguageBundle\Entity\Herramienta $herramienta
     * @return Idioma
     */
    public function addHerramienta(\Lang\LanguageBundle\Entity\Herramienta $herramienta)
    {
        $this->herramientas[] = $herramienta;
        return $this;
    }

    /**
     * Remove herramientas
     *
     * @param \Lang\LanguageBundle\Entity\Herramienta $herramientas
     */
    public function removeHerramienta(\Lang\LanguageBundle\Entity\Herramienta $herramientas)
    {
        $this->herramientas->removeElement($herramientas);
    }

    /**
     * Get herramientas
     *
     * @return \Doctrine\Common\Collections\ArrayCollection 
     */
    public function getHerramientas()
    {
        return $this->herramientas;
    }
    public function __toString()
    {
	//if return $this->getName() es true devuelve $this->getName(). Si no, devuelve "".
        //Sirve pa mostrar todos los tipos de herramienta en el formulario de herramientas
        return $this->getIdiomaName() ? $this->getIdiomaName() : "";
    }
    /**
     * Set idiorec
     *
     */
    public function setIdiorecs($idiorecs)
    {
        $this->idiorecs = $idiorecs;
    }

    /**
     * Add idiorecs
     *
     * @param \Lang\LanguageBundle\Entity\Idiorec $idiorecs
     * @return Idioma
     */
    public function addIdiorec(\Lang\LanguageBundle\Entity\Idiorec $idiorecs)
    {
        $this->idiorecs[] = $idiorecs;

        return $this;
    }

    /**
     * Remove idiorecs
     *
     * @param \Lang\LanguageBundle\Entity\Idiorec $idiorecs
     */
    public function removeIdiorec(\Lang\LanguageBundle\Entity\Idiorec $idiorecs)
    {
        $this->idiorecs->removeElement($idiorecs);
    }

    /**
     * Get idiorecs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdiorecs()
    {
        return $this->idiorecs;
    }
}
