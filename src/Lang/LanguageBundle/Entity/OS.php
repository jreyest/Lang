<?php

namespace Lang\LanguageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OS
 */
class OS
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $osName;


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
     * Set osName
     *
     * @param string $osName
     * @return OS
     */
    public function setOsName($osName)
    {
        $this->osName = $osName;

        return $this;
    }

    /**
     * Get osName
     *
     * @return string 
     */
    public function getOsName()
    {
        return $this->osName;
    }
    /**
     * @var string
     */
    private $osSeo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $herramientas;
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $recursos;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->herramientas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->recursos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set osSeo
     *
     * @param string $osSeo
     * @return OS
     */
    public function setOsSeo($osSeo)
    {
        $this->osSeo = $osSeo;

        return $this;
    }

    /**
     * Get osSeo
     *
     * @return string 
     */
    public function getOsSeo()
    {
        return $this->osSeo;
    }

    /**
     * Add herramienta
     *
     * @param \Lang\LanguageBundle\Entity\Herramienta $herramienta
     * @return OS
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
     /**
     * Add recurso
     *
     * @param \Lang\LanguageBundle\Entity\Recurso $recurso
     * @return OS
     */
    public function addRecurso(\Lang\LanguageBundle\Entity\Herramienta $recurso)
    {
        $this->recursos[] = $recurso;
        return $this;
    }

    /**
     * Remove recursos
     *
     * @param \Lang\LanguageBundle\Entity\Recurso $recursos
     */
    public function removeRecurso(\Lang\LanguageBundle\Entity\Recurso $recursos)
    {
        $this->recursos->removeElement($recursos);
    }

    /**
     * Get recursos
     *
     * @return \Doctrine\Common\Collections\ArrayCollection 
     */
    public function getRecursos()
    {
        return $this->recursos;
    }
    public function __toString()
    {
	//if return $this->getName() es true devuelve $this->getName(). Si no, devuelve "".
        //Sirve pa mostrar todos los tipos de herramienta en el formulario de herramientas
        return $this->getOsName() ? $this->getOsName() : "";
    }
}
